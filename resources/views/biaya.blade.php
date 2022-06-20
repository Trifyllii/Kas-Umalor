@extends('adminlte::page')

@section('title', 'biaya')

@section('content_header')
<h1 class="m-0 text-dark">Biaya</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12 mb-4">
        <div class="card">
            <div class="card-body">
                <p class="mb-0">BIAYA</p>
                <!-- Trigger the modal with a button -->
                <button type="button" class="mt-3 btn btn-dark btn" data-toggle="modal" data-target="#myModal">
                    Tambah Data
                    <i class="fas fa-plus ml-2"></i>

                </button>

                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="bg-dark modal-content">
                            <div class="modal-header">
                                <h4 class="text-warning modal-title">Tambah Data</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('/tambahBiaya') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label class="text-warning mt-1 control-label">Kode Biaya</label>
                                        <input name="KodeBiaya" type="text" class="col-md-12 form-control"
                                            id="formGroupExampleInput" >
                                        <label class="text-warning mt-2 control-label">Tanggal Biaya</label>
                                        <input name="TanggalBiaya" type="date" class="form-control" name="tglbiaya"
                                            id="">
                                        <label class="text-warning mt-2 control-label">Nama Biaya</label>
                                        <input name="NamaBiaya" type="text" class="form-control"
                                            id="formGroupExampleInput">
                                        <label class="text-warning mt-2 control-label">Jumlah Biaya</label>
                                        <input name="JumlahBiaya" placeholder="Rp." type="text" class="form-control"
                                            id="formGroupExampleInput2">
                                    </div>
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn text-warning btn-outline-success">Simpan</button>
                                <button type="button" class="btn text-warning btn-outline-danger" data-dismiss="modal">Batal</button>
                            </div>
                            </form>
                        </div>

                    </div>
                </div>

    
            </div>
        </div>
    
    @foreach ($biaya as $by)
    <div class="col-12">
        <div class="card">
            <div class="card-body"> 
                    <h2>{{ $by["kd_biaya"] }}</h2> 
                    <h2>{{ $by["jml_biaya"] }}</h2> 
                <p class="card-text">{{ $by["nm_biaya"] }}</p> 
                <p class="card-text"><small class="text-muted">         
                    {{ $by["tgl_biaya"] }}</small> </p>
            </div>
        </div>
    </div>
    @endforeach

    </div>
</div>
@stop