@extends('adminlte::page')

@section('title', 'Laporan Pengeluaran Kas ')

@section('content_header')
    <h1 class="m-0 text-dark">Laporan Pengeluaran Kas</h1>
@stop

@section('content')
    <div class="row" data-aos="fade-up">
        <div class="col-12">
            <div class="card">
                <div class="card-body d-print-none" id="cardTgl">
                    <form class="form-inline needs-validation" method="post"
                        action="{{ url('/lapPengeluarankas/sorted') }}">
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
                        <div class="pl-2 text-right">
                            <button onclick="window.print()" class="btn btn-dark mb-2">
                                <i class="fas fa-print"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    @isset($tglsampai)
                        <b>
                            <h5 class="text-center mt-1 mb-2">Laporan Pengeluaran Kas</h5>
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
                                <th scope="col">Keterangan</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $sum = 0;
                            @endphp
                            @foreach ($pengeluaran as $by)
                                <tr>
                                    <th scope="row">{{ $no++ }}</th>
                                    <th scope="row">{{ date('d-m-Y', strtotime($by['tgl_transaksi'])) }}</th>
                                    <td>{{ $by['ket_transaksi'] }}</td>
                                    <td>Rp {{ number_format($by['jml_transaksi'], 0, ',', '.') }}</td>
                                </tr>
                                @php
                                    $sum += $by['jml_transaksi'];
                                @endphp
                            @endforeach
                            </tr>
                            <tr>
                                <th class="text-center" colspan="3">Total</th>
                                <th>Rp {{ number_format($sum, 0, ',', '.') }}</th>

                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
@stop
