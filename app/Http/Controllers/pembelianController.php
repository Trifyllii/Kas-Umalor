<?php

namespace App\Http\Controllers;
use App\Models\Pembelian;
use App\Models\pengeluaranKas;
use App\Models\kas;
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
        pengeluaranKas::create([ 
            'kd_pembelian' => $request->KodePembelian, 
            'tgl_transaksi' => $request->TanggalPembelian, 
            'ket_transaksi' => $request->NamaPembelian, 
            'jml_transaksi' => $request->HargaBeli,
        ]); 
        $pengeluaranKasMdl = pengeluaranKas::where('kd_pembelian', '=', $request->KodePembelian)->first();
        Kas::create([ 
            'kd_keluar_kas' => $pengeluaranKasMdl->kd_keluar_kas, 
            'tgl_transaksi' => $request->TanggalPembelian, 
            'ket_transaksi' => $request->NamaPembelian, 
            'kredit' => $request->HargaBeli,
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
        PengeluaranKas::whereIn('kd_pembelian', [$request->KodePembelian])->update([
            'tgl_transaksi' => $request->TanggalPembelian, 
            'ket_transaksi' => $request->NamaPembelian, 
            'jml_transaksi' => $request->HargaBeli, 
        ]);
        $pengeluaranKasMdl = pengeluaranKas::where('kd_pembelian', '=', $request->KodePembelian)->first();
            Kas::whereIn('kd_keluar_kas', [$pengeluaranKasMdl->kd_keluar_kas])->update([
            'tgl_transaksi' => $request->TanggalPembelian, 
            'ket_transaksi' => $request->NamaPembelian, 
            'kredit' => $request->HargaBeli, 
        ]);
        return redirect('pembelian');

    }
    public function hapusPembelian(Request $request){
        Pembelian::where('kd_pembelian', [$request->KodePembelian])->delete();
        pengeluaranKas::where('kd_pembelian', [$request->KodePembelian])->delete();
        $pengeluaranKasMdl = pengeluaranKas::where('kd_pembelian', '=', $request->KodePembelian)->first();
        if (isset($pengeluaranKasMdl['kd_keluar_kas'])) {
        
        Kas::where('kd_keluar_kas', $pengeluaranKasMdl['kd_keluar_kas'])->delete();
        }
        return redirect('pembelian') ->with('alert', 'Data Berhasil Dihapus!');
    }
}