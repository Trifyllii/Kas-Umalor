@extends('adminlte::page')

@section('title', 'Pembelian')

@section('content_header')
    @php
    $user = auth()->user();
    @endphp
    @if ($user['position'] == 'admin')
        <h1 class="m-0 text-dark">Pembelian</h1>
    @endif
@stop

@section('content')
    <div class="row" data-aos="fade-up">
        <div class="col-12 mb-4">
            <div class="card">
                @if ($user['position'] == 'admin')
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

                                    <!-- TABEL Start -->

                                    <div class="modal-header">
                                        <h5 class="text-warning modal-title">TAMBAH DATA PEMBELIAN</h5>
                                    </div>
                                    <div class="modal-body">
                                        <form class=needs-validation action="{{ url('/tambahPembelian') }}"
                                            method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label class="text-warning mt-1 control-label">Kode Pembelian</label>
                                                <input name="KodePembelian" type="text" class="col-md-12 form-control"
                                                    id="formGroupExampleInput" required>
                                                <label class="text-warning mt-2 control-label">Tanggal Pembelian</label>
                                                <input name="TanggalPembelian" type="date" max="{{ $tglnow }}" class="form-control"
                                                    name="tglpembelian" id="" required>
                                                <label class="text-warning mt-2 control-label">Nama Pembelian</label>
                                                <input name="NamaPembelian" type="text" class="form-control"
                                                    id="formGroupExampleInput" required>
                                                <label class="text-warning mt-2 control-label">Jumlah Beli</label>
                                                <input name="JumlahBeli" type="number" class="form-control"
                                                    id="formGroupExampleInput2" required>
                                                <label class="text-warning mt-2 control-label">Subtotal</label>
                                                <input name="HargaBeli" placeholder="Rp." type="text"
                                                    class="form-control" id="formGroupExampleInput2" required>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn text-warning btn-outline-success">Simpan</button>
                                        <button type="button" class="btn text-warning btn-outline-danger"
                                            data-dismiss="modal">Batal</button>
                                    </div>
                                    </form>
                                    <!-- TABEL end -->

                                </div>

                            </div>
                @endif

            </div>
        </div>
    </div>

    <!-- TABEL Start -->

    <div class="">
        <div class="card">
            <div class="card-header">
                <h4 class="text-center">DAFTAR PEMBELIAN </h4>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Pembelian</th>
                            <th scope="col">Tanggal Pembelian</th>
                            <th scope="col">Nama Pembelian</th>
                            <th scope="col">Jumlah Beli</th>
                            <th scope="col">Subtotal</th>
                            @if ($user['position'] == 'admin')
                                <th scope="col">Opsi Pilihan</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($pembelian as $by)
                            <tr>
                                <th scope="row">{{ $no++ }}</th>
                                <th scope="row">{{ $by['kd_pembelian'] }}</th>
                                <th scope="row">{{ date('d-m-Y', strtotime($by['tgl_pembelian'])) }}</th>
                                <td>{{ $by['nm_pembelian'] }}</td>
                                <td>{{ $by['jml_beli'] }}</td>
                                <td>Rp {{ number_format($by['hrg_beli'], 0, ',', '.') }}</td>
                                <!-- TABEL Start -->

                                @if ($user['position'] == 'admin')
                                    <td>
                                        <div class="col-12">
                                            <!-- BUTTON MODAL EDIT -->
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                                data-target="#{{ $by['kd_pembelian'] }}_editModal">
                                                EDIT
                                                <i class="fas fa-edit"></i>
                                            </button>

                                            <!-- Modal EDIT -->
                                            <div id="{{ $by['kd_pembelian'] }}_editModal" class="modal fade"
                                                role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="bg-dark modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="text-warning modal-title">Edit Data</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class=needs-validation
                                                                action="{{ url('/editPembelian') }}" method="POST">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label class="text-warning mt-1 control-label">Kode
                                                                        Pembelian <small><i>Read
                                                                                Only</i></small></label>
                                                                    <input readonly value="{{ $by['kd_pembelian'] }}"
                                                                        name="KodePembelian" type="text"
                                                                        class="col-md-12 form-control"
                                                                        id="formGroupExampleInput" required>
                                                                    <label class="text-warning mt-2 control-label">Tanggal
                                                                        Pembelian</label>
                                                                    <input value="{{ $by['tgl_pembelian'] }}" 
                                                                        name="TanggalPembelian" max="{{ $tglnow }}" type="date"
                                                                        class="form-control" name="tglpembelian"
                                                                        id="" required>
                                                                    <label class="text-warning mt-2 control-label">Nama
                                                                        Pembelian</label>
                                                                    <input value="{{ $by['nm_pembelian'] }}"
                                                                        name="NamaPembelian" type="text"
                                                                        class="form-control" id="formGroupExampleInput"
                                                                        required>
                                                                    <label class="text-warning mt-2 control-label">Jumlah
                                                                        Beli</label>
                                                                    <input value="{{ $by['jml_beli'] }}"
                                                                        name="JumlahBeli" type="number"
                                                                        class="form-control" id="formGroupExampleInput2"
                                                                        required>
                                                                    <label class="text-warning mt-2 control-label">Harga
                                                                        Beli</label>
                                                                    <input value="{{ $by['hrg_beli'] }}"
                                                                        name="HargaBeli" placeholder="Rp." type="text"
                                                                        class="form-control" id="formGroupExampleInput2"
                                                                        required>
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
                                                data-target="#{{ $by['kd_pembelian'] }}_deleteModal"> DELETE
                                                <i class="fas fa-ban"></i>
                                            </button>
                                            <!-- Modal DELETE -->
                                            <div id="{{ $by['kd_pembelian'] }}_deleteModal" class="modal fade"
                                                role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="bg-dark modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="text-warning modal-title">Hapus Data</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ url('/hapusPembelian') }}" method="POST">
                                                                @csrf
                                                                <div class="form-group">
                                                                    <label class="text-warning mt-1 control-label">APAKAH
                                                                        ANDA YAKIN INGIN
                                                                        MENGHAPUS PEMBELIAN INI? : <small><br>
                                                                            <i> Aksi ini tidak dapat
                                                                                dikembalikan!</i></small></label>
                                                                    <table class="table">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row"><input readonly
                                                                                        value="{{ $by['kd_pembelian'] }}"
                                                                                        name="KodePembelian"
                                                                                        type="text"
                                                                                        class="col-md-12 form-control"
                                                                                        id="formGroupExampleInput">
                                                                                </th>
                                                                                <td>{{ $by['tgl_pembelian'] }}</td>
                                                                                <td>{{ $by['nm_pembelian'] }}</td>
                                                                                <td>{{ $by['jml_beli'] }}</td>
                                                                                <td>{{ $by['hrg_beli'] }}</td>
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
                                @endif
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
