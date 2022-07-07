@extends('adminlte::page')

@section('title', 'Laporan Pendapatan Lain ')

@section('content_header')
    <h1 class="m-0 text-dark">Laporan Pendapatan Lain</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body d-print-none" id="cardTgl">
                    <form class="form-inline needs-validation" method="post"
                        action="{{ url('/lapPendapatanlain/sorted') }}">
                        @csrf
                        <div class="form-group mr-3">
                            <h5>Periode</h5>
                        </div>
                        <div class="form-group mb-2">
                            <label class="sr-only">Dari</label>
                            <input type="date" class="form-control"
                                @isset($tgldari) value="{{ $tgldari }}" @endisset name="tgldari"
                                required>
                            <div class="valid-feedback">
                                Harus Diisi!>
                            </div>
                        </div>
                        <div class="form-group ml-3">s.d</div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label class="sr-only">Sampai</label>
                            <input type="date" class="form-control"
                                @isset($tglsampai) value="{{ $tglsampai }}" @endisset name="tglsampai"
                                required>
                        </div>
                        <button type="submit" class="btn btn-dark mb-2">Confirm</button>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @isset($tglsampai)
                        <b>
                            <h5 class="text-center mt-1 mb-2">Laporan Pendapatan Lain</h5>
                            <h6 class="text-center"> Periode {{ date('d-m-Y', strtotime($tgldari)) }} s.d
                                {{ date('d-m-Y', strtotime($tglsampai)) }}</h6>
                        </b>
                    @endisset
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Jumlah Barang</th>
                                <th scope="col">Harga Barang</th>

                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $sum = 0;
                            @endphp
                            @foreach ($pendapatan as $by)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <th scope="row">{{ date('d-m-Y', strtotime($by['tgl_pendapatan_lain'])) }}</th>
                                    <td>{{ $by['nm_barang'] }}</td>
                                    <td>{{ $by['jml_barang'] }}</td>
                                    <td>Rp {{ number_format($by['jml_pendapatan_lain'], 0, ',', '.') }}</td>
                                    @php
                                        $sum += $by['jml_pendapatan_lain'];
                                    @endphp
                                </tr>
                            @endforeach
                            <tr>
                                <th class="text-center" colspan="4">Total</th>
                                <th>Rp {{ number_format($sum, 0, ',', '.') }}</th>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
@stop
