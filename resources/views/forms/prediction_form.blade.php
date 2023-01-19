@extends('layout/master')
@section('content')
<div class="module">
    <div class="module-head">
        <h3>Tender Prediction Form</h3>
    </div>
    <div class="module-body">

        <br>
        <form class="form-horizontal row-fluid" method="post" action="/predictNew">
            @csrf
            <div class="control-group">
                <label class="control-label" for="basicinput">Nama Paket</label>
                <div class="controls">
                    <input type="text" id="basicinput" name="nama" placeholder="Masukkan Nama Paket Pengadaan..." class="span8">
                    <span class="help-inline"></span>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="basicinput">Metode Pengadaan</label>
                <div class="controls">
                    <select tabindex="1" data-placeholder="Pilih Metode Pengadaan" class="span8" name="metode_pengadaan">
                        <option value="">Select here..</option>
                        <option value="Seleksi">Seleksi</option>
                        <option value="E-Purchasing">E-Purchasing</option>
                        <option value="Tender">Tender</option>
                        <option value="Tender Cepat">Tender Cepat</option>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="basicinput">Jenis Pengadaan</label>
                <div class="controls">
                    <select tabindex="1" data-placeholder="Select here.." class="span8" name="jenis_pengadaan">
                        <option value="">Pilih Jenis Pengadaan</option>
                        <option value="Jasa Konsultansi">Jasa Konsultansi</option>
                        <option value="Barang">Barang</option>
                        <option value="Jasa Lainnya">Jasa Lainnya</option>
                        <option value="Pekerjaan Konstruksi">Pekerjaan Konstruksi</option>
                    </select>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="basicinput">Pagu</label>
                <div class="controls">
                    <div class="input-append">
                        <input type="text" placeholder="1200000000" class="span8" name="pagu"><span class="add-on">Rp</span>
                    </div>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label" for="basicinput">Bulan</label>
                <div class="controls">
                    <select tabindex="1" data-placeholder="Pilih Bulan Tender Masuk Dalam Paket Pengadaan " class="span8" name="bulan">
                        <option value="">Select here..</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-primary">Predict</button>
                </div>
            </div>
            <br>
        </form>
    </div>
</div>
@endsection