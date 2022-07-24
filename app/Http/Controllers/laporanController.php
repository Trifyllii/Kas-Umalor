<?php

namespace App\Http\Controllers;
use App\Models\pengeluaranKas;
use App\Models\penerimaanKas;
use App\Models\pembelian;
use App\Models\pendapatanLain;
use App\Models\pendapatanSewa;
use App\Models\biaya;
use App\Models\kas;
use View;

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
        // variabel tgl sekarang untuk max form tanggal
        View::share ( 'tglnow', date("Y-m-d") );
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function viewPendapatansewa()
    {
        return view('lapPendapatansewa', [
            'pendapatan' => pendapatanSewa::orderBy('tgl_pendapatan_sewa')->get(),
        ]);

    }
    public function sortedPendapatansewa(Request $request)
    {
        $pk = pendapatanSewa::whereBetween('tgl_pendapatan_sewa', [$request->tgldari, $request->tglsampai])->orderBy('tgl_pendapatan_sewa')->get();
        return view('lapPendapatansewa', [ 
            'pendapatan' => $pk,
            'tgldari' => $request->tgldari, 
            'tglsampai' => $request->tglsampai
        ]);
    }
    public function viewPendapatanlain()
    {
        return view('lapPendapatanlain', [
            'pendapatan' => pendapatanLain::orderBy('tgl_pendapatan_lain')->get() 
        ]);

    }
    public function sortedPendapatanlain(Request $request)
    {
        $pk = pendapatanLain::whereBetween('tgl_pendapatan_lain', [$request->tgldari, $request->tglsampai])->orderBy('tgl_pendapatan_lain')->get();
        return view('lapPendapatanlain', [ 
            'pendapatan' => $pk,
            'tgldari' => $request->tgldari, 
            'tglsampai' => $request->tglsampai
        ]);
    }
     public function viewPembelian()
    {
        return view('lapPembelian', [
            'pembelian' => pembelian::orderBy('tgl_pembelian')->get() 
        ]);
    }
    public function sortedPembelian(Request $request)
    {
        $pk = pembelian::whereBetween('tgl_pembelian', [$request->tgldari, $request->tglsampai])->orderBy('tgl_pembelian')->get();
        return view('lapPembelian', [ 
            'pembelian' => $pk,
            'tgldari' => $request->tgldari, 
            'tglsampai' => $request->tglsampai
        ]);
    }
    public function viewPenerimaankas()
    {

        return view('lapPenerimaankas', [ 
            'penerimaan' => penerimaanKas::orderBy('tgl_transaksi')->get() 
        ]);

    }
    public function sortedPenerimaanKas(Request $request)
    {
        $pk = penerimaanKas::whereBetween('tgl_transaksi', [$request->tgldari, $request->tglsampai])->orderBy('tgl_transaksi')->get();
        return view('lapPenerimaankas', [ 
            'penerimaan' => $pk,
            'tgldari' => $request->tgldari, 
            'tglsampai' => $request->tglsampai
        ]);
    }
    public function viewPengeluarankas()
    {
        return view('lapPengeluarankas', [ 
            'pengeluaran' => pengeluaranKas::orderBy('tgl_transaksi')->get() 
        ]);
    }
     public function sortedPengeluaranKas(Request $request)
    {
        $pk = pengeluaranKas::whereBetween('tgl_transaksi', [$request->tgldari, $request->tglsampai])->orderBy('tgl_transaksi')->get();
        return view('lapPengeluarankas', [ 
            'pengeluaran' => $pk,
            'tgldari' => $request->tgldari, 
            'tglsampai' => $request->tglsampai
        ]);
    }
     public function viewBukubesarkas()
    {
        return view('bukuBesarkas',[
            'kas' => Kas::orderBy('tgl_transaksi')->get()
        ]);
    }
    public function sortedBukubesarkas(Request $request)
    {
        $pk = Kas::whereBetween('tgl_transaksi', [$request->tgldari, $request->tglsampai])->orderBy('tgl_transaksi')->get();
        return view('bukuBesarkas', [ 
            'kas' => $pk,
            'tgldari' => $request->tgldari, 
            'tglsampai' => $request->tglsampai
        ]);
    }

}