<?php

namespace App\Http\Controllers;
use App\Models\biaya;
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
            // 'jajanan' => Jajanan::all() 
            'biaya' => biaya::latest()->get() 
        ]);
    }
    
    public function tambahBiaya(Request $request){ 
       // dd($request->all()); 
        biaya::create([ 
            'kd_biaya' => $request->KodeBiaya, 
            'tgl_biaya' => $request->TanggalBiaya, 
            'nm_biaya' => $request->NamaBiaya, 
            'jml_biaya' => $request->JumlahBiaya, 
        ]); 
        return redirect('biaya'); 
    }
}