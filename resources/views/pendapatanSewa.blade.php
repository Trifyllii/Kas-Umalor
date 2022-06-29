@extends('adminlte::page')

@section('title', 'pendapatan sewa ')

@section('content_header')
    <h1 class="m-0 text-dark">Pendapatan Sewa</h1>
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
                                    <form action="{{ url('/tambahPendapatansewa') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="text-warning mt-1 control-label">Kode Pendapatan Sewa</label>
                                            <input name="KodePendapatanSewa" type="text" class="col-md-12 form-control"
                                                id="formGroupExampleInput">
                                            <label class="text-warning mt-2 control-label">Tanggal Pendapatan Sewa</label>
                                            <input name="TanggalPendapatanSewa" type="date" class="form-control"
                                                name="tglpendapatansewa" id="">
                                            <label class="text-warning mt-2 control-label">Nama Ikan</label>
                                            <input name="NamaIkan" type="text" class="form-control"
                                                id="formGroupExampleInput">
                                            <label class="text-warning mt-2 control-label">Nominal</label>
                                            <input name="JumlahPendapatanSewa" placeholder="Rp." type="text"
                                                class="form-control" id="formGroupExampleInput2">
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
                        <h3>Data Pendapatan Sewa </h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Kode Pendapatan Sewa</th>
                                    <th scope="col">Tanggal Pendapatan Sewa</th>
                                    <th scope="col">Nama Ikan</th>
                                    <th scope="col">Nominal</th>
                                    <th scope="col">Opsi Pilihan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendapatansewa as $by)
                                    <tr>
                                        <th scope="row">{{ $by['kd_pendapatan_sewa'] }}</th>
                                        <td>{{ $by['tgl_pendapatan_sewa'] }}</td>
                                        <td>{{ $by['nm_ikan'] }}</td>
                                        <td>{{ $by['jml_pendapatan_sewa'] }}</td>
                                        <td>
                                            <div class="col-12">
                                                <!-- BUTTON MODAL EDIT -->
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                    data-target="#{{ $by['kd_pendapatan_sewa'] }}_editModal">
                                                    EDIT
                                                    <i class="fas fa-edit"></i>
                                                </button>

                                                <!-- Modal EDIT -->
                                                <div id="{{ $by['kd_pendapatan_sewa'] }}_editModal" class="modal fade"
                                                    role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="bg-dark modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="text-warning modal-title">Edit Data</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ url('/editPendapatansewa') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label class="text-warning mt-1 control-label">Kode
                                                                            Pendapatan Sewa<small><i>Read
                                                                                    Only</i></small></label>
                                                                        <input readonly
                                                                            value="{{ $by['kd_pendapatan_sewa'] }}"
                                                                            name="KodePendapatanSewa" type="text"
                                                                            class="col-md-12 form-control"
                                                                            id="formGroupExampleInput">
                                                                        <label
                                                                            class="text-warning mt-2 control-label">Tanggal
                                                                            Pendapatan Sewa</label>
                                                                        <input value="{{ $by['tgl_pendapatan_sewa'] }}"
                                                                            name="TanggalPendapatanSewa" type="date"
                                                                            class="form-control" name="tglpendapatansewa"
                                                                            id="">
                                                                        <label class="text-warning mt-2 control-label">Nama
                                                                            Ikan</label>
                                                                        <input value="{{ $by['nm_ikan'] }}"
                                                                            name="NamaIkan" type="text"
                                                                            class="form-control" id="formGroupExampleInput">
                                                                        <label
                                                                            class="text-warning mt-2 control-label">Nominal</label>
                                                                        <input value="{{ $by['jml_pendapatan_sewa'] }}"
                                                                            name="JumlahPendapatanSewa" placeholder="Rp."
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
                                                    data-target="#{{ $by['kd_pendapatan_sewa'] }}_deleteModal"> DELETE
                                                    <i class="fas fa-ban"></i>
                                                </button>
                                                <!-- Modal DELETE -->
                                                <div id="{{ $by['kd_pendapatan_sewa'] }}_deleteModal"
                                                    class="modal fade" role="dialog">
                                                    <div class="modal-dialog">

                                                        <!-- Modal content-->
                                                        <div class="bg-dark modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="text-warning modal-title">Hapus Data</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="{{ url('/hapusPendapatansewa') }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label
                                                                            class="text-warning mt-1 control-label">APAKAH
                                                                            ANDA YAKIN INGIN
                                                                            MENGHAPUS PEMBELIAN INI? : <small><br>
                                                                                <i> Aksi ini tidak dapat
                                                                                    dikembalikan!</i></small></label>
                                                                        <table class="table">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th scope="row"><input readonly
                                                                                            value="{{ $by['kd_pendapatan_sewa'] }}"
                                                                                            name="KodePendapatanSewa"
                                                                                            type="text"
                                                                                            class="col-md-12 form-control"
                                                                                            id="formGroupExampleInput">
                                                                                    </th>
                                                                                    <td>{{ $by['tgl_pendapatan_sewa'] }}
                                                                                    </td>
                                                                                    <td>{{ $by['nm_ikan'] }}</td>
                                                                                    <td>{{ $by['jml_pendapatan_sewa'] }}
                                                                                    </td>
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
