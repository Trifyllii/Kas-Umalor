@extends('adminlte::page')

@section('title', 'laporan pendapatan sewa ')

@section('content_header')
    <h1 class="m-0 text-dark">Laporan Pendapatan Sewa</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form-inline" method="post" action="{{ url('/lapPendapatansewa/sorted') }}">
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
                            <h5 class="text-center mt-1 mb-2">Laporan Pendapatan Sewa</h5>
                            <h6 class="text-center"> Periode {{ $tgldari }} s.d
                                {{ $tglsampai }}</h6>
                        </b>
                    @endisset
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Nama Ikan</th>
                                <th scope="col">Jumlah Pendapatan Sewa</th>

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
                                    <th scope="row">{{ $by['tgl_pendapatan_sewa'] }}</th>
                                    <td>{{ $by['nm_ikan'] }}</td>
                                    <td>{{ $by['jml_pendapatan_sewa'] }}</td>
                                    @php
                                        $sum += $by['jml_pendapatan_sewa'];
                                    @endphp
                                </tr>
                            @endforeach
                            <tr>
                                <th class="text-center" colspan="3">Total</th>
                                <th>{{ $sum }}</th>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>

    </div>
@stop
