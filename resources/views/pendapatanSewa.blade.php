@extends('adminlte::page')

@section('title', 'pendapatanSewa')

@section('content_header')
<h1 class="m-0 text-dark">Pendapatan Sewa</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p class="mb-0">PENDAPATAN SEWA</p>
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
                                <form>
                                    <div class="form-group">
                                        <label>FORM PENDAPATAN SEWA :</label>
                                        <input type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Nama Pendapatan">
                                        
                                            <input type="text" class="mt-3 form-control" id="formGroupExampleInput2"
                                            placeholder="Keterangan">
                                        
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop