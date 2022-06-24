<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class laporanController extends Controller
{
       /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function viewPendapatansewa()
    {
        return view('lapPendapatansewa');
    }
    public function viewPendapatanlain()
    {
        return view('lapPendapatanlain');
    }
     public function viewPembelian()
    {
        return view('pembelian');
    }
    public function viewPenerimaankas()
    {
        return view('lapPenerimaankas');
    }
    public function viewPengeluarankas()
    {
        return view('lapPengeluarankas');
    }
     public function viewBukubesarkas()
    {
        return view('bukuBesarkas');
    }

}