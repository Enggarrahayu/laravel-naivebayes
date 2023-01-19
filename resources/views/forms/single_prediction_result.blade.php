@extends('layout/master')
@section('content')
<div class="module">
    <div class="module-head">
        <h3>Single Data Prediction Result</h3>
    </div>
    <div class="module-body">

        <br>
        <form class="form-horizontal row-fluid" method="post" action="{{route('predict_new')}}">
            @csrf
            <div class="control-group">
                <label class="control-label" for="basicinput">Nama Paket Pengadaan</label>
                <div class="controls">
                    <input type="text" id="basicinput" placeholder="{{$nm}}" class="span8" disabled>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="basicinput">Metode Pengadaan</label>
                <div class="controls">
                    <input type="text" id="basicinput" placeholder="{{$mp}}" class="span8" disabled>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="basicinput">Jenis Pengadaan</label>
                <div class="controls">
                    <input type="text" id="basicinput" placeholder="{{$jp}}" class="span8" disabled>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="basicinput">Pagu</label>
                <div class="controls">
                    <input type="text" id="basicinput" placeholder="{{$pg}}" class="span8" disabled>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="basicinput">Bulan</label>
                <div class="controls">
                    <input type="text" id="basicinput" placeholder="{{$bl}}" class="span8" disabled>
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