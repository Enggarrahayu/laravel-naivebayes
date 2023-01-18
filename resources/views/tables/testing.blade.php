@extends('layout/master')
@section('content')


<div class="module">
    <div class="module-head">
        <h3>Testing Data</h3>
    </div>
    <div class="module-option clearfix" style=" background-color: #f2f2f2; padding: 15px; margin-top: 15px;">
        <div class="pull-left">
            <form method="post" enctype="multipart/form-data" action="{{url('import')}}">
                @csrf
                <div class="form-group">
                    <div class="input-group">
                        <label> <b>Import data from excel</b> <small class="warning text-muted">{{__('Please upload only Excel (.xlsx or .xls) files')}}</small></label>
                        <input name="uploaded_file" type="file" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <input name="upload" type="submit" value="Upload Data" class="btn btn-success">
                    <input name="delete_all" type="submit" value="Hapus Semua" class="btn btn-danger">
                    <a href="/predictAll" class="btn btn-default">
                        <i class="fa fa-refresh"></i>Predict Data</a>
                </div>
            </form>
        </div>
        <div class="pull-right">

        </div>
    </div>
    <div class="module-body table">
        <table cellpadding="0" cellspacing="0" class="datatable-1 table table-bordered table-striped	 display" width="100%">
            <thead>
                <tr>
                    <th>Metode Pengadaan</th>
                    <th>Jenis Pengadaan</th>
                    <th>Pagu</th>
                    <th>Bulan</th>
                    <th>Kelas Asli</th>
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