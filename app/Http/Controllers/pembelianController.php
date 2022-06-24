<?php

namespace App\Http\Controllers;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class pembelianController extends Controller
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
        return view('pembelian', [ 
            'pembelian' => Pembelian::latest()->get() 

        ]);
    }

        public function tambahPembelian(Request $request)
    {
        Pembelian::create([ 
            'kd_pembelian' => $request->KodePembelian, 
            'tgl_pembelian' => $request->TanggalPembelian, 
            'nm_pembelian' => $request->NamaPembelian, 
            'jml_beli' => $request->JumlahBeli,
            'hrg_beli' => $request->HargaBeli,
        ]); 
        return redirect('pembelian');
    }
    public function editPembelian(Request $request){
        Pembelian::whereIn('kd_pembelian', [$request->KodePembelian])->update([
            'tgl_pembelian' => $request->TanggalPembelian, 
            'nm_pembelian' => $request->NamaPembelian, 
            'jml_beli' => $request->JumlahBeli, 
            'hrg_beli' => $request->HargaBeli, 
        ]);
        return redirect('pembelian');
    }
    public function hapusPembelian(Request $request){
        Pembelian::where('kd_pembelian', [$request->KodePembelian])->delete();
        return redirect('pembelian') ->with('alert', 'Data Berhasil Dihapus!');
    }
}