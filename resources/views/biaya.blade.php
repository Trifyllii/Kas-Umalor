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
                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-dark btn" data-toggle="modal" data-target="#myModal">
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
                                                id="formGroupExampleInput">
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
                                    <button type="button" class="btn text-warning btn-outline-danger"
                                        data-dismiss="modal">Batal</button>
                                </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Data Biaya </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Kode Bayar</th>
                                    <th scope="col">Tanggal Bayar</th>
                                    <th scope="col">Nama Bayar</th>
                                    <th scope="col">Jumlah Bayar</th>
                                    <th scope="col">Opsi Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($biaya as $by)
                                    <tr>
                                        <th scope="row">{{ $by['kd_biaya'] }}</th>
                                        <td>{{ $by['tgl_biaya'] }}</td>
                                        <td>{{ $by['nm_biaya'] }}</td>
                                        <td>{{ $by['jml_biaya'] }}</td>
                                        <td>
                                            <div class="col-12">
                                                <!-- BUTTON MODAL EDIT -->
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#{{ $by['kd_biaya'] }}_editModal">
                                                    EDIT
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <!-- Modal EDIT -->
                                                <div id="{{ $by['kd_biaya'] }}_editModal" class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="bg-dark modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="text-warning modal-title">Edit Data</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ url('/editBiaya') }}" method="POST">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label class="text-warning mt-1 control-label">Kode
                                                                            Biaya <small><i>Read
                                                                                    Only</i></small></label>
                                                                        <input readonly value="{{ $by['kd_biaya'] }}"
                                                                            name="KodeBiaya" type="text"
                                                                            class="col-md-12 form-control"
                                                                            id="formGroupExampleInput">
                                                                        <label
                                                                            class="text-warning mt-2 control-label">Tanggal
                                                                            Biaya</label>
                                                                        <input value="{{ $by['tgl_biaya'] }}"
                                                                            name="TanggalBiaya" type="date"
                                                                            class="form-control" name="tglbiaya"
                                                                            id="">
                                                                        <label class="text-warning mt-2 control-label">Nama
                                                                            Biaya</label>
                                                                        <input value="{{ $by['nm_biaya'] }}"
                                                                            name="NamaBiaya" type="text"
                                                                            class="form-control" id="formGroupExampleInput">
                                                                        <label
                                                                            class="text-warning mt-2 control-label">Jumlah
                                                                            Biaya</label>
                                                                        <input value="{{ $by['jml_biaya'] }}"
                                                                            name="JumlahBiaya" placeholder="Rp."
                                                                            type="text" class="form-control"
                                                                            id="formGroupExampleInput2">
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn text-warning btn-outline-success">Update
                                                                    Data</button>
                                                                <button type="button"
                                                                    class="btn text-warning btn-outline-danger"
                                                                    data-dismiss="modal">Batal</button>
                                                            </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- END MODAL EDIT-->

                                                <!-- BUTTON MODAL DELETE -->
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                                    data-target="#{{ $by['kd_biaya'] }}_deleteModal"> DELETE
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                                <!-- Modal DELETE -->
                                                <div id="{{ $by['kd_biaya'] }}_deleteModal" class="modal fade"
                                                    role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="bg-dark modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="text-warning modal-title">Hapus Data</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ url('/hapusBiaya') }}" method="POST">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="text-warning mt-1 control-label">APAKAH
                                                                            ANDA YAKIN INGIN
                                                                            MENGHAPUS BIAYA INI? : <small><br>
                                                                                <i> Aksi ini tidak dapat
                                                                                    dikembalikan!</i></small></label>
                                                                        <table class="table">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row"><input readonly
                                                                                            value="{{ $by['kd_biaya'] }}"
                                                                                            name="KodeBiaya"
                                                                                            type="text"
                                                                                            class="col-md-12 form-control"
                                                                                            id="formGroupExampleInput">
                                                                                    </th>
                                                                                    <td>{{ $by['tgl_biaya'] }}</td>
                                                                                    <td>{{ $by['nm_biaya'] }}</td>
                                                                                    <td>{{ $by['jml_biaya'] }}</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="submit"
                                                                    class="btn text-warning btn-outline-danger">Hapus
                                                                    Data!</button>
                                                                <button type="button"
                                                                    class="btn text-warning btn-outline-light"data-dismiss="modal">Batal</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END MODAL DELETE-->
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>
@stop
<script>
    var msg = '{{ Session::get('alert') }}';
    var exist = '{{ Session::has('alert') }}';
    if (exist) {
        alert(msg);
    }
</script>
