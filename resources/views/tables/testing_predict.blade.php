@extends('layout/master')
@section('content')
<div class="module">
    <div class="module-head">
        <h3>Tender Prediction Result</h3>
    </div>
    <div class="module-option clearfix">
        <div class="pull-left">
            <a href="/testing" class="btn btn-default">
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
                    <td class="center">{{$row->kelas_asli}}</td>
                    <td class="center"> <b> {{$row->kelas_predict}} </b></td>
                </tr>
                @endforeach
                <!-- @else -->
                <!-- <tr>
                    <td colspan="10">There are no data.</td>
                </tr> -->
                <!-- @endif -->
            </tbody>
        </table>
    </div>
</div><!--/.module-->

<br />
@endsection