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
                </button>

                <!-- Modal -->
                <div id="myModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah Data</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{ url('/tambahBiaya') }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>FORM PENGELUARAN BIAYA :</label>
                                        <input name="KodeBiaya" type="text" class="form-control"
                                            id="formGroupExampleInput" placeholder="Kode Biaya">
                                        <input name="TanggalBiaya" type="date" class="mt-3 form-control" name="tglbiaya"
                                            id="" placeholder="Tanggal Biaya">
                                        <input name="NamaBiaya" type="text" class="mt-3 form-control"
                                            id="formGroupExampleInput" placeholder="Nama Biaya">
                                        <input name="JumlahBiaya" type="text" class="mt-3 form-control"
                                            id="formGroupExampleInput2" placeholder="Jumlah Biaya">
                                    </div>
                                
                                
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
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