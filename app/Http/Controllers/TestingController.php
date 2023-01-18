<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Testing;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;
use Phpml\Classification\NaiveBayes;
use Phpml\Dataset\CsvDataset;

class TestingController extends Controller
{
    public function index()
    {
        $data = Testing::all();
        return view('tables/testing', compact('data'));
    }

    public function excelUpload(Request $request)
    {
        $this->validate($request, [
            'uploaded_file' => 'required|file|mimes:xls,xlsx'
        ]);
        $the_file = $request->file('uploaded_file');
        try {
            $spreadsheet = IOFactory::load($the_file->getRealPath());
            $sheet        = $spreadsheet->getActiveSheet();
            $row_limit    = $sheet->getHighestDataRow();
            $column_limit = $sheet->getHighestDataColumn();
            $row_range    = range(2, $row_limit);
            $column_range = range('F', $column_limit);
            $startcount = 2;
            $data = array();
            foreach ($row_range as $row) {
                $data[] = [
                    'metode_pengadaan' => $sheet->getCell('A' . $row)->getValue(),
                    'jenis_pengadaan' => $sheet->getCell('B' . $row)->getValue(),
                    'pagu' => $sheet->getCell('C' . $row)->getValue(),
                    'bulan' => $sheet->getCell('D' . $row)->getValue(),
                    'kelas_asli' => $sheet->getCell('E' . $row)->getValue(),
                ];
                $startcount++;
            }
            DB::table('testing')->insert($data);
        } catch (Exception $e) {
            $error_code = $e->errorInfo[1];
            return back()->withErrors('There was a problem uploading the data!');
        }
        return back()->withSuccess('Great! Data has been successfully uploaded.');
    }

    public function predictAll()
    {
        //train model
        $dataset = new CsvDataset('./dataset/undersampling_.csv', 4, true);
        // dump($dataset);
        // die;
        $samples = $dataset->getSamples();
        $labels = $dataset->getTargets();
        $classifier = new NaiveBayes();
        $classifier->train($samples, $labels);

        //predict
        $testings = DB::select('select * from testing');
        // var_dump($testings);
        // die;
        $data_predict = [];
        foreach ($testings as $row) {
            $row     = get_object_vars($row);
            array_push($data_predict, array($row['metode_pengadaan'], $row['jenis_pengadaan'], $row['pagu'], $row['bulan']));
        }
        // var_dump($data_predict);
        // die;
        $count = count($testings);
        for ($i = 0; $i < $count; $i++) {
            $sql1 = "UPDATE testing SET kelas_predict='" . $classifier->predict($data_predict)[$i] . "' WHERE id= $i + 1";
            DB::statement($sql1);
        }
        $data = Testing::all();
        return view('tables/testing_predict', compact('data'));
    }
}
