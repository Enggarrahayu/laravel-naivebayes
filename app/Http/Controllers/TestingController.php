<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Testing;
use Facade\Ignition\DumpRecorder\Dump;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;
use Phpml\Classification\NaiveBayes;
use Phpml\Dataset\CsvDataset;
use Phpml\Math\Matrix;
use Phpml\Metric\Accuracy;
use Phpml\Metric\ConfusionMatrix;
use Phpml\Metric\ClassificationReport;

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

    public function getTesting()
    {
        $data = Testing::all();
        $testings = DB::select('select * from testing');
        $count_testing = Testing::all()->count();
        $actual_labels = [];
        $predicted_labels = [];
        $actual_targets = [];
        $predicted_targets = [];
        foreach ($testings as $row) {
            $row     = get_object_vars($row);
            array_push($actual_labels, array($row['kelas_asli']));
            array_push($predicted_labels, array($row['kelas_predict']));
            array_push($actual_targets, $row['kelas_asli']);
            array_push($predicted_targets, $row['kelas_predict']);
        }
        $accuracy =  Accuracy::score($actual_labels, $predicted_labels);
        $accuracy = $accuracy * 100;
        $accuracy = round($accuracy, 2);
        $laju_error = 100 - $accuracy;
        $jumlah_tepat = Accuracy::score($actual_labels, $predicted_labels, false);
        $jumlah_salah = $count_testing - $jumlah_tepat;
        $confusion_matrix = ConfusionMatrix::compute($actual_targets, $predicted_targets);
        $confusion_matrix_a = json_encode($confusion_matrix[0]);
        $confusion_matrix_b = json_encode($confusion_matrix[1]);
        $report = new ClassificationReport($actual_targets, $predicted_targets);
        $precision = $report->getPrecision();
        $pos_precision = round($precision[1], 3);
        $neg_precision = round($precision[2], 3);
        $recall = $report->getRecall();
        $pos_recall = round($recall[1], 3);
        $neg_recall = round($recall[2], 3);
        $f1score = $report->getF1score();
        $pos_f1score = round($f1score[1], 3);
        $neg_f1score = round($f1score[2], 3);
        $support = $report->getSupport();
        $pos_support = round($support[1], 3);
        $neg_support = round($support[2], 3);
        // echo json_encode($confusion_matrix);
        // die;
        return view('tables/testing_report', compact('data', 'accuracy', 'confusion_matrix_a', 'confusion_matrix_b', 'count_testing', 'jumlah_tepat', 'jumlah_salah', 'laju_error', 'pos_precision', 'neg_precision', 'pos_recall', 'neg_recall', 'pos_f1score', 'neg_f1score', 'pos_support', 'neg_support'));
    }
}
