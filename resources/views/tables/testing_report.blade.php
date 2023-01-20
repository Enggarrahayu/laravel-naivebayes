@extends('layout/master')
@section('content')

<div class="module">
    <div class="module-head">
        <h3>Testing Data</h3>
    </div>
    <div class="module-body table">
        <table cellpadding="0" cellspacing="0" border="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
            <thead>
                <tr>
                    <th>Metode Pengadaan</th>
                    <th>Jenis Pengadaan</th>
                    <th>Pagu</th>
                    <th>Bulan</th>
                    <th>Kelas Asli</th>
                    <th>Kelas Predict </th>
                </tr>
            </thead>
            <tbody>
                <!-- @if(!empty($data) && $data->count()) -->
                @foreach($data as $row)
                <tr class="odd gradeX">
                    <td>{{ $row->metode_pengadaan }}</td>
                    <td>{{ $row->jenis_pengadaan }}</td>
                    <td>{{ $row->pagu }}</td>
                    <td> {{ $row->bulan }}</td>
                    @if($row->kelas_asli == 2)
                    <td class="center">Gagal Tender</td>
                    @else
                    <td class="center">Sukses Tender</td>
                    @endif
                    @if($row->kelas_predict == 2)
                    <td class="center" style="color: red;"> Gagal Tender</td>
                    @else
                    <td class="center" style="color: green;">Sukses Tender</td>
                    @endif
                </tr>
                @endforeach
                <!-- @else -->
                <!-- <tr>
                    <td colspan=" 10">There are no data.</td>
                </tr> -->
                <!-- @endif -->
            </tbody>
        </table>
    </div>
</div>
<div class="module">
    <div class="module-head">
        <h3>Classification Report</h3>
    </div>
    <div class="module-body table">
        <div class="btn-controls">
            <div class="btn-box-row row-fluid" style="border: 1px solid #cccccc;">
                <a href="#" class="btn-box big span3"><b>{{$count_testing}}</b>
                    <p class="text-muted">
                        Jumlah Prediksi</p>
                </a><a href="#" class="btn-box big span3"><b>{{$jumlah_tepat}}</b>
                    <p class="text-muted">
                        Jumlah Tepat</p>
                </a><a href="#" class="btn-box big span3"><b>{{$jumlah_salah}}</b>
                    <p class="text-muted">
                        Jumlah Tidak Tepat</p>
                </a>
                <a href="#" class="btn-box big span3"><b>{{$accuracy}}%</b>
                    <p class="text-muted">
                        Akurasi</p>
                </a>
            </div>
            <div class="btn-box-row row-fluid" style="border: 1px solid #cccccc;">
                <a href="#" class="btn-box big span3"><b>{{$laju_error}}%</b>
                    <p class="text-muted">
                        Laju Error</p>
                </a><a href="#" class="btn-box big span3"><b>{{$confusion_matrix_a}}</b>
                    <b>{{$confusion_matrix_b}}</b>
                    <p class="text-muted">
                        Confusion Matrix</p>
                </a>
                <a href="#" class="btn-box big span3">
                    <b>{{$pos_precision}}</b>
                    <p class="text-muted">
                        Positive Precision</p>
                    <b>{{$neg_precision}}</b>
                    <p class="text-muted">
                        Negative Precision</p>
                </a>
                <a href="#" class="btn-box big span3">
                    <b>{{$pos_recall}}</b>
                    <p class="text-muted">
                        Positive Recall</p>
                    <b>{{$neg_recall}}</b>
                    <p class="text-muted">
                        Negative Recall</p>
                </a>
            </div>
            <div class="btn-box-row row-fluid" style="border: 1px solid #cccccc;">
                <a href="#" class="btn-box big span6">
                    <b>{{$pos_f1score}}</b>
                    <p class="text-muted">
                        Positive F1 Score</p>
                    <b>{{$neg_f1score}}</b>
                    <p class="text-muted">
                        Negative F1 Score</p>
                </a>
                <a href="#" class="btn-box big span6">
                    <b>{{$pos_support}}</b>
                    <p class="text-muted">
                        Positive Support</p>
                    <b>{{$neg_support}}</b>
                    <p class="text-muted">
                        Negative Support</p>
                </a>
            </div>
            <!--/.content-->
        </div>

    </div>
</div>
<br />
@endsection