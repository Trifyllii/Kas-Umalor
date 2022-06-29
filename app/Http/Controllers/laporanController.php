<?php

namespace App\Http\Controllers;
use App\Models\pengeluaranKas;
use App\Models\penerimaanKas;
use App\Models\pembelian;
use App\Models\pendapatanLain;
use App\Models\pendapatanSewa;
use App\Models\biaya;
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
        return view('lapPendapatansewa', [
            'pendapatan' => pendapatanSewa::latest()->get() 
        ]);

    }
    public function sortedPendapatansewa(Request $request)
    {
        $pk = pendapatanSewa::whereBetween('tgl_pendapatan_sewa', [$request->tgldari, $request->tglsampai])->get();
        return view('lapPendapatansewa', [ 
            'pendapatan' => $pk,
            'tgldari' => $request->tgldari, 
            'tglsampai' => $request->tglsampai
        ]);
    }
    public function viewPendapatanlain()
    {
        return view('lapPendapatanlain', [
            'pendapatan' => pendapatanLain::latest()->get() 
        ]);

    }
    public function sortedPendapatanlain(Request $request)
    {
        $pk = pendapatanLain::whereBetween('tgl_pendapatan_lain', [$request->tgldari, $request->tglsampai])->get();
        return view('lapPendapatanlain', [ 
            'pendapatan' => $pk,
            'tgldari' => $request->tgldari, 
            'tglsampai' => $request->tglsampai
        ]);
    }
     public function viewPembelian()
    {
        return view('lapPembelian', [
            'pembelian' => pembelian::latest()->get() 
        ]);
    }
    public function sortedPembelian(Request $request)
    {
        $pk = pembelian::whereBetween('tgl_pembelian', [$request->tgldari, $request->tglsampai])->get();
        return view('lapPembelian', [ 
            'pembelian' => $pk,
            'tgldari' => $request->tgldari, 
            'tglsampai' => $request->tglsampai
        ]);
    }
    public function viewPenerimaankas()
    {

        return view('lapPenerimaankas', [ 
            'penerimaan' => penerimaanKas::latest()->get() 
        ]);

    }
    public function sortedPenerimaanKas(Request $request)
    {
        $pk = penerimaanKas::whereBetween('tgl_transaksi', [$request->tgldari, $request->tglsampai])->get();
        return view('lapPenerimaankas', [ 
            'penerimaan' => $pk,
            'tgldari' => $request->tgldari, 
            'tglsampai' => $request->tglsampai
        ]);
    }
    public function viewPengeluarankas()
    {
        return view('lapPengeluarankas', [ 
            'pengeluaran' => pengeluaranKas::latest()->get() 
        ]);
    }
     public function sortedPengeluaranKas(Request $request)
    {
        $pk = pengeluaranKas::whereBetween('tgl_transaksi', [$request->tgldari, $request->tglsampai])->get();
        return view('lapPengeluarankas', [ 
            'pengeluaran' => $pk,
            'tgldari' => $request->tgldari, 
            'tglsampai' => $request->tglsampai
        ]);
    }
     public function viewBukubesarkas()
    {
        return view('bukuBesarkas');
    }

}