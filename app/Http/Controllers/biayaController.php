<?php

namespace App\Http\Controllers;
use App\Models\Biaya;
use App\Models\pengeluaranKas;

use Illuminate\Http\Request;

class biayaController extends Controller
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
        return view('biaya', [ 
            
            'biaya' => Biaya::latest()->get() 
        ]);
    }
    
    public function tambahBiaya(Request $request){ 
       // dd($request->all()); 
        Biaya::create([ 
            'kd_biaya' => $request->KodeBiaya, 
            'tgl_biaya' => $request->TanggalBiaya, 
            'nm_biaya' => $request->NamaBiaya, 
            'jml_biaya' => $request->JumlahBiaya, 
        ]); 
        pengeluaranKas::create([ 
            'kd_biaya' => $request->KodeBiaya, 
            'tgl_transaksi' => $request->TanggalBiaya, 
            'ket_transaksi' => $request->NamaBiaya, 
            'jml_transaksi' => $request->JumlahBiaya, 
        ]); 
        return redirect('biaya');
    }
    public function editBiaya(Request $request){
        Biaya::whereIn('kd_biaya', [$request->KodeBiaya])->update([
            'tgl_biaya' => $request->TanggalBiaya, 
            'nm_biaya' => $request->NamaBiaya, 
            'jml_biaya' => $request->JumlahBiaya, 
        ]);
        PengeluaranKas::whereIn('kd_biaya', [$request->KodeBiaya])->update([
            'tgl_transaksi' => $request->TanggalBiaya, 
            'ket_transaksi' => $request->NamaBiaya, 
            'jml_transaksi' => $request->JumlahBiaya, 
        ]);
        return redirect('biaya');
    }
    public function hapusBiaya(Request $request){
        Biaya::where('kd_biaya', [$request->KodeBiaya])->delete();
        pengeluaranKas::where('kd_biaya', [$request->KodeBiaya])->delete();
        return redirect('biaya') ->with('alert', 'Data Berhasil Dihapus!');
    }
}