<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\TestingNew;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Http\Request;
use Phpml\Classification\NaiveBayes;
use Phpml\Dataset\CsvDataset;

class NewTestingDataController extends Controller
{
    public function predictNewData()
    {
        $dataset = new CsvDataset('./dataset/undersampling_.csv', 4, true);
        $samples = $dataset->getSamples();
        $labels = $dataset->getTargets();

        //learning process
        $dttesting[] = $_POST['jenis_pengadaan'];
        $dttesting[] = $_POST['metode_pengadaan'];
        if ($_POST['pagu'] <= 409546200) {
            $pagu = "Sangat Rendah";
        } elseif ($_POST['pagu'] >= 409546201 && $_POST['pagu'] <= 670500000) {
            $pagu = "Rendah";
        } elseif ($_POST['pagu'] >= 670500001 && $_POST['pagu'] <= 3769000000) {
            $pagu = "Tinggi";
        } elseif ($_POST['pagu'] >= 3769000001) {
            $pagu = "Sangat Tinggi";
        } else {
            $pagu = "nilai pagu tidak valid";
        }
        $dttesting[] = $pagu;
        if ($_POST['bulan'] <= 3) {
            $bulan = "Jauh";
        } elseif ($_POST['bulan'] >= 4 && $_POST['bulan'] <= 7) {
            $bulan = "Sedang";
        } elseif ($_POST['bulan'] >= 8) {
            $bulan = "Dekat";
        }
        $dttesting[] = $bulan;

        // $class_hasil = "";

        $classifier = new NaiveBayes();
        //train every labels
        $classifier->train($samples, $labels);
        $class_hasil = $classifier->predict($dttesting);
        $nm = $_POST['nama'];
        $jp = $_POST['jenis_pengadaan'];
        $mp = $_POST['metode_pengadaan'];
        $pg = $_POST['pagu'];
        $bl_angka = $_POST['bulan'];
        if ($_POST['bulan'] == 1) {
            $bl = "Januari";
        } elseif ($_POST['bulan'] == 2) {
            $bl = "Februari";
        } elseif ($_POST['bulan'] == 3) {
            $bl = "Maret";
        } elseif ($_POST['bulan'] == 4) {
            $bl = "April";
        } else if ($_POST['bulan'] == 5) {
            $bl = "Mei";
        } elseif ($_POST['bulan'] == 6) {
            $bl = "Juni";
        } elseif ($_POST['bulan'] == 7) {
            $bl = "Juli";
        } elseif ($_POST['bulan'] == 8) {
            $bl = "Agustus";
        } elseif ($_POST['bulan'] == 9) {
            $bl = "September";
        } elseif ($_POST['bulan'] == 10) {
            $bl = "Oktober";
        } elseif ($_POST['bulan'] == 11) {
            $bl = "November";
        } elseif ($_POST['bulan'] == 12) {
            $bl = "Desember";
        }

        return view('forms/single_prediction_result', compact('class_hasil', 'nm', 'jp', 'mp', 'pg', 'bl', 'bl_angka', 'pagu', 'bulan'));
    }

    public function saveTesting()
    {
        // $nama = $_POST['nama'];
        // // $jenis_pengadaan = $_POST['jenis_pengadaan'];
        // // $metode_pengadaan = $_POST['metode_pengadaan'];
        // // dump($metode_pengadaan);
        // // dump($jenis_pengadaan);
        // dump($_POST);
        // die;
        $testing_new = new TestingNew();
        $testing_new->nama = $_POST['nama'];
        $testing_new->metode_pengadaan = $_POST['metode_pengadaan'];
        $testing_new->jenis_pengadaan = $_POST['jenis_pengadaan'];
        $testing_new->pagu_angka = $_POST['pagu_angka'];
        $testing_new->pagu = $_POST['pagu'];
        $testing_new->bulan_angka = $_POST['bulan_angka'];
        $testing_new->bulan = $_POST['bulan'];
        $testing_new->kelas_predict = $_POST['kelas_predict'];
        $testing_new->save();
        return redirect('/predictionForm');
    }
}
