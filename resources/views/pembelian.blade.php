@extends('adminlte::page')

@section('title', 'pembelian')

@section('content_header')
<h1 class="m-0 text-dark">Pembelian</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="mb-0">PEMBELIAN</p>
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
                            <form action="{{ url('/tambahDagang') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label class="text-warning mt-1 control-label">Kode Dagang</label>
                                    <input name="KodeDagang" type="text" class="col-md-12 form-control"
                                        id="formGroupExampleInput" >
                                        <label class="text-warning mt-1 control-label">Nama Dagang</label>
                                    <input name="NamaDagang" type="text" class="col-md-12 form-control"
                                        id="formGroupExampleInput" >
                                    <label class="text-warning mt-2 control-label">Tanggal Pembelian</label>
                                    <input name="TanggalPembelian" type="date" class="form-control" name="tglbiaya"
                                        id="">
                                    <label class="text-warning mt-2 control-label">Jenis Dagang</label>
                                    <select class="form-control" name="JenisDagang" id="">
                                        <option value="Barang">Barang</option>
                                        <option value="Ikan">Ikan</option>
                                    </select>
                                    <div class="row">
                                        <div class="col">
                                            <label class="text-warning mt-2 control-label">Harga Beli</label>
                                            <input name="HargaBeli" placeholder="Rp." type="text" class="form-control"
                                                id="formGroupExampleInput">
                                        </div>
                                        <div class="col">
                                            <label class="text-warning mt-2 control-label">Harga Jual</label>
                                            <input name="HargaJual" placeholder="Rp." type="text" class="form-control"
                                                id="formGroupExampleInput">
                                        </div>
                                    </div>
                                    

                                    <label class="text-warning mt-2 control-label">Jumlah Pembelian</label>
                                    <input name="JumlahPembelian" type="text" class="form-control"
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
    </div>
</div>
@stop