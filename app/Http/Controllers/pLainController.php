<?php

namespace App\Http\Controllers;
use App\Models\pendapatanlain;
use App\Models\penerimaanKas;
use App\Models\Kas;


use Illuminate\Http\Request;

class pLainController extends Controller
{
    //
    //
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
    public function index()
    {
        return view('pendapatanlain', [ 
            'pendapatanlain' => pendapatanLain::latest()->get() 
        ]); 

    }
    public function tambahPendapatanlain(Request $request)
    {
        pendapatanlain::create([ 
            'kd_pendapatan_lain' => $request->KodePendapatanLain, 
            'tgl_pendapatan_lain' => $request->TanggalPendapatanLain, 
            'nm_barang' => $request->NamaBarang, 
            'jml_barang' => $request->JumlahBarang,
            'jml_pendapatan_lain' => $request->JumlahPendapatanLain,
        ]); 
        penerimaanKas::create([ 
            'kd_pendapatan_lain' => $request->KodePendapatanLain, 
            'tgl_transaksi' => $request->TanggalPendapatanLain, 
            'ket_transaksi' => $request->NamaBarang, 
            'jml_transaksi' => $request->JumlahPendapatanLain,
        ]);
        $penerimaanKasMdl = penerimaanKas::where('kd_pendapatan_lain', '=', $request->KodePendapatanLain)->first();
        Kas::create([ 
            'kd_terima_kas' => $penerimaanKasMdl->kd_terima_kas, 
            'tgl_transaksi' => $request->TanggalPendapatanLain, 
            'ket_transaksi' => $request->NamaBarang, 
            'debet' => $request->JumlahPendapatanLain,
        ]);
        return redirect('pendapatanlain');
    }
    public function editPendapatanlain(Request $request){
        pendapatanlain::whereIn('kd_pendapatan_lain', [$request->KodePendapatanLain])->update([
            'tgl_pendapatan_lain' => $request->TanggalPendapatanLain, 
            'nm_barang' => $request->NamaBarang, 
            'jml_barang' => $request->JumlahBarang,
            'jml_pendapatan_lain' => $request->JumlahPendapatanLain,
        ]);
        penerimaanKas::whereIn('kd_pendapatan_lain', [$request->KodePendapatanLain])->update([
            'tgl_transaksi' => $request->TanggalPendapatanLain, 
            'ket_transaksi' => $request->NamaBarang, 
            'jml_transaksi' => $request->JumlahPendapatanLain,
        ]);
        $penerimaanKasMdl = penerimaanKas::where('kd_pendapatan_lain', '=', $request->KodePendapatanLain)->first();
        Kas::whereIn('kd_terima_kas', [$penerimaanKasMdl->kd_terima_kas])->update([
            'tgl_transaksi' => $request->TanggalPendapatanLain, 
            'ket_transaksi' => $request->NamaBarang, 
            'debet' => $request->JumlahPendapatanLain,
        ]);
        return redirect('pendapatanlain');
    }
    public function hapusPendapatanlain(Request $request){
        pendapatanlain::where('kd_pendapatan_lain', [$request->KodePendapatanLain])->delete();
        penerimaanKas::where('kd_pendapatan_lain', [$request->KodePendapatanLain])->delete();
        $penerimaanKasMdl = penerimaanKas::where('kd_pendapatan_lain', '=', $request->KodePendapatanLain)->first();
        if ($penerimaanKasMdl['kd_terima_kas']) {
            Kas::where('kd_terima_kas', $penerimaanKasMdl['kd_terima_kas'])->delete();
        }
        return redirect('pendapatanlain') ->with('alert', 'Data Berhasil Dihapus!');
    }
}