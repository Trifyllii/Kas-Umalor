<?php

namespace App\Http\Controllers;
use App\Models\Dagang;
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
            'dagang' => Dagang::latest()->get() 
        ]);
    }

        public function tambahDagang(Request $request)
    {
        Dagang::create([ 
            'kd_dagang' => $request->KodeDagang, 
            'nm_dagang' => $request->NamaDagang, 
            'tgl_pembelian' => $request->TanggalPembelian, 
            'jenis_dagang' => $request->JenisDagang, 
            'jml_pembelian' => $request->JumlahPembelian,
            'hrg_beli' => $request->HargaBeli,
            'hrg_jual' => $request->HargaJual,
            'quantity' => $request->Quantity,
        ]); 
        return redirect('dagang');
    }
}