@extends('adminlte::page')

@section('title', 'laporan2')

@section('content_header')
    <h1 class="m-0 text-dark">Laporan Pengeluaran Kas</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-inline" method="post" action="{{ url('/lapPengeluarankas/sorted') }}">
                        @csrf
                        <div class="form-group mr-3">
                            <h5>Periode</h5>
                        </div>
                        <div class="form-group mb-2">
                            <label class="sr-only">Dari</label>
                            <input type="date" class="form-control" name="tgldari">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                            <label class="sr-only">Sampai</label>
                            <input type="date" class="form-control" name="tglsampai">
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
                            <h5 class="text-center mt-1 mb-2">Laporan Pengeluaran Kas</h5>
                            <h6 class="text-center"> Periode {{ $tgldari }} s.d
                                {{ $tglsampai }}</h6>
                        </b>
                    @endisset
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Tanggal Transaksi</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pengeluaran as $by)
                                <tr>
                                    <th scope="row">{{ $by['tgl_transaksi'] }}</th>
                                    <td>{{ $by['ket_transaksi'] }}</td>
                                    <td>{{ $by['jml_transaksi'] }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <th class="text-center" colspan="2">Total</th>
                                <th></th>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
@stop
