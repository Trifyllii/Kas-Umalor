<?php

namespace App\Http\Controllers;
use App\Models\pendapatansewa;
use App\Models\penerimaanKas;
use Illuminate\Http\Request;

class pSewaController extends Controller
{
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
        return view('pendapatansewa', [ 
            'pendapatansewa' => pendapatanSewa::latest()->get() 

        ]);
    }
    public function tambahPendapatansewa(Request $request)
    {
        pendapatansewa::create([ 
            'kd_pendapatan_sewa' => $request->KodePendapatanSewa, 
            'tgl_pendapatan_sewa' => $request->TanggalPendapatanSewa, 
            'nm_ikan' => $request->NamaIkan, 
            'jml_pendapatan_sewa' => $request->JumlahPendapatanSewa,
        ]);
        PenerimaanKas::create([ 
            'kd_pendapatan_sewa' => $request->KodePendapatanSewa, 
            'tgl_transaksi' => $request->TanggalPendapatanSewa, 
            'ket_transaksi' => $request->NamaIkan, 
            'jml_transaksi' => $request->JumlahPendapatanSewa, 
        ]);
        return redirect('pendapatansewa');
    }
    public function editPendapatansewa(Request $request){
        pendapatansewa::whereIn('kd_pendapatan_sewa', [$request->KodePendapatanSewa])->update([
            'tgl_pendapatan_sewa' => $request->TanggalPendapatanSewa, 
            'nm_ikan' => $request->NamaIkan, 
            'jml_pendapatan_sewa' => $request->JumlahPendapatanSewa,
        ]); 
        PenerimaanKas::whereIn('kd_biaya', [$request->KodeBiaya])->update([
            'tgl_transaksi' => $request->TanggalPendapatanSewa, 
            'ket_transaksi' => $request->NamaIkan, 
            'jml_transaksi' => $request->JumlahPendapatanSewa, 
        ]);
        return redirect('pendapatansewa');
    }
    public function hapusPendapatansewa(Request $request){
        pendapatansewa::where('kd_pendapatan_sewa', [$request->KodePendapatanSewa])->delete();
        PenerimaanKas::where('kd_pendapatan_sewa', [$request->KodePendapatanSewa])->delete();
        return redirect('pendapatansewa') ->with('alert', 'Data Berhasil Dihapus!');
    }
}