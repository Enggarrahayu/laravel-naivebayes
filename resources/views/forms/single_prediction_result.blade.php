@extends('layout/master')
@section('content')
<div class="module">
    <div class="module-head">
        <h3>Single Data Prediction Result</h3>
    </div>
    <div class="module-body">

        <br>
        <form class="form-horizontal row-fluid" method="post" action="{{route('save_testing')}}">
            @csrf
            <div class="control-group">
                <label class="control-label" for="basicinput">Nama Paket Pengadaan</label>
                <div class="controls">
                    <input type="text" id="basicinput" value="{{$nm}}" name="nama" placeholder="{{$nm}}" class="span8" readonly>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="basicinput">Metode Pengadaan</label>
                <div class="controls">
                    <input type="text" id="basicinput" value="{{$mp}}" name="metode_pengadaan" placeholder="{{$mp}}" class="span8" readonly>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="basicinput">Jenis Pengadaan</label>
                <div class="controls">
                    <input type="text" id="basicinput" value="{{$jp}}" name="jenis_pengadaan" placeholder="{{$jp}}" class="span8" readonly>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="basicinput">Pagu</label>
                <div class="controls">
                    <input type="text" id="basicinput" value="{{$pg}}" name="pagu_angka" placeholder="{{$pg}}" class="span8" readonly>
                    <input type="hidden" id="basicinput" value="{{$pagu}}" name="pagu" class="span8" readonly>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="basicinput">Bulan</label>
                <div class="controls">
                    <input type="text" id="basicinput" value="{{$bl}}" class="span8" readonly>
                    <input type="hidden" id="basicinput" name="bulan_angka" value="{{$bl_angka}}" placeholder="{{$bl}}" class="span8" readonly>
                    <input type="hidden" id="basicinput" name="bulan" value="{{$bulan}}" class="span8">
                    <input type="hidden" id="basicinput" name="kelas_predict" value="{{$class_hasil}}" class="span8">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-primary">Save Result</button>
                </div>
            </div>
            <br>
        </form>
    </div>

</div>
<div class="module">
    <div class="module-body">
        <div class="docs-example">
            @if($class_hasil == 1)
            <h3>Hasil Prediksi: Sukses Tender</h3>
            @elseif($class_hasil == 2)
            <h3>Hasil Prediksi: Gagal Tender</h3>
            @endif
        </div>
    </div>
</div>
@endsection