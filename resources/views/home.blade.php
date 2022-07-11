@extends('adminlte::page')

@section('title', 'SIA-KAS')

@section('content_header')
    <h1 class="m-0 text-dark"></h1>
@stop

@section('content')
    @php
    $sum1 = 0;
    $sum2 = 0;
    @endphp
    <div class="row" data-aos="fade-up">
        <div class="col-12">
            <div class="card">
                <div class="card-body pb-2">
                    <img src="{{ url('home-umalor.png') }}" style="max-width: 2200px; width:100% ;"
                        class="img-fluid rounded mx-auto d-block" alt="Responsive image">
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($penerimaan as $p1)
                            @php
                                $sum1 += $p1['jml_transaksi'];
                            @endphp
                        @endforeach
                        @foreach ($pengeluaran as $p2)
                            @php
                                $sum2 += $p2['jml_transaksi'];
                            @endphp
                        @endforeach

                        <div class="col-md-4 col-lg-4 col-xl-4 col-xs-12 col-sm-12  ">
                            <a href="{{ url('/lapPenerimaankas') }}" style="text-decoration:none;">
                                <div class="card border shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Pendapatan</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Rp {{ number_format($sum1, 0, ',', '.') }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-download fa-2x text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4 col-xs-12 col-sm-12 ">
                            <a href="{{ url('/lapPengeluarankas') }}" style="text-decoration:none;">
                                <div class="card border shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                    Pengeluaran</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Rp {{ number_format($sum2, 0, ',', '.') }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-upload fa-2x text-danger"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4 col-lg-4 col-xl-4 col-xs-12 col-sm-12 ">
                            <a href="{{ url('/bukuBesarkas') }}" style="text-decoration:none;">
                                <div class="card border shadow">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Saldo
                                                </div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                                    Rp {{ number_format($sum1 - $sum2, 0, ',', '.') }}
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-money-bill-wave fa-2x text-success"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card">

            </div>
        </div>
    </div>
@stop
