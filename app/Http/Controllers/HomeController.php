<?php

namespace App\Http\Controllers;
use App\Models\penerimaanKas;
use App\Models\pengeluaranKas;
use App\Models\user;

use Illuminate\Http\Request;

class HomeController extends Controller
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
    public function index()
    {
       return view('home', [ 
            'penerimaan' => penerimaanKas::latest()->get() ,
            'pengeluaran' => pengeluaranKas::latest()->get() ,
            
        ]); 
    }
}