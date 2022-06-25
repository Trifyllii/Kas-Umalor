<?php

namespace App\Http\Controllers;
use App\Models\pendapatanlain;
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
        return redirect('pendapatanlain');
    }
    public function editPendapatanlain(Request $request){
        pendapatanlain::whereIn('kd_pendapatan_lain', [$request->KodePendapatanLain])->update([
            'tgl_pendapatan_lain' => $request->TanggalPendapatanLain, 
            'nm_barang' => $request->NamaBarang, 
            'jml_barang' => $request->JumlahBarang,
            'jml_pendapatan_lain' => $request->JumlahPendapatanLain,
        ]);
        return redirect('pendapatanlain');
    }
    public function hapusPendapatanlain(Request $request){
        pendapatanlain::where('kd_pendapatan_lain', [$request->KodePendapatanLain])->delete();
        return redirect('pendapatanlain') ->with('alert', 'Data Berhasil Dihapus!');
    }
}