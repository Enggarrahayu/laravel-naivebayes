@extends('layout/master')
@section('content')
<div class="module">
    <div class="module-head">
        <h3>Tender Prediction Result</h3>
    </div>
    <div class="module-option clearfix" style=" background-color: #f2f2f2; padding: 15px; margin-top: 15px;">
        <div class="pull-left">
            <a href="/testing" class="btn btn-default" style=" background-color: #f2f2f2; ">
                <button class="btn btn-info" href="/testing">Back To Testing</button>
            </a>
        </div>
        <div class="pull-right">

        </div>
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
</div><!--/.module-->

<br />
@endsection