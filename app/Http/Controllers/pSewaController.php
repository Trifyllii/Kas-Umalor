<?php

namespace App\Http\Controllers;
use App\Models\pendapatansewa;
use App\Models\penerimaanKas;
use App\Models\kas;
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
            'pendapatansewa' => pendapatanSewa::latest()->get(),
            'tglnow' => date("Y-m-d")
        ]);
    }
    public function tambahPendapatansewa(Request $request)
    {
        pendapatansewa::create([ 
            'kd_pendapatan_sewa' => $request->KodePendapatanSewa, 
            'tgl_pendapatan_sewa' => $request->TanggalPendapatanSewa, 
            'nm_ikan' => $request->NamaIkan, 
            'jml_penyewa' => $request->JumlahPenyewa, 
            'jml_pendapatan_sewa' => $request->JumlahPendapatanSewa,
        ]);
        penerimaanKas::create([ 
            'kd_pendapatan_sewa' => $request->KodePendapatanSewa, 
            'tgl_transaksi' => $request->TanggalPendapatanSewa, 
            'ket_transaksi' => $request->NamaIkan, 
            'jml_transaksi' => $request->JumlahPendapatanSewa, 
        ]);
        $penerimaanKasMdl = penerimaanKas::where('kd_pendapatan_sewa', '=', $request->KodePendapatanSewa)->first();
        Kas::create([ 
            'kd_terima_kas' => $penerimaanKasMdl->kd_terima_kas, 
            'tgl_transaksi' => $request->TanggalPendapatanSewa, 
            'ket_transaksi' => $request->NamaIkan, 
            'debet' => $request->JumlahPendapatanSewa,
        ]);
        return redirect('pendapatansewa');
    }
    public function editPendapatansewa(Request $request){
        pendapatansewa::whereIn('kd_pendapatan_sewa', [$request->KodePendapatanSewa])->update([
            'tgl_pendapatan_sewa' => $request->TanggalPendapatanSewa, 
            'nm_ikan' => $request->NamaIkan, 
            'jml_penyewa' => $request->JumlahPenyewa, 
            'jml_pendapatan_sewa' => $request->JumlahPendapatanSewa,
        ]); 
        penerimaanKas::whereIn('kd_pendapatan_sewa', [$request->KodePendapatanSewa])->update([
            'tgl_transaksi' => $request->TanggalPendapatanSewa, 
            'ket_transaksi' => $request->NamaIkan, 
            'jml_transaksi' => $request->JumlahPendapatanSewa, 
        ]);
        $penerimaanKasMdl = penerimaanKas::where('kd_pendapatan_sewa', '=', $request->KodePendapatanSewa)->first();
        Kas::whereIn('kd_terima_kas', [$penerimaanKasMdl->kd_terima_kas])->update([
            'tgl_transaksi' => $request->TanggalPendapatanSewa, 
            'ket_transaksi' => $request->NamaIkan, 
            'debet' => $request->JumlahPendapatanSewa,
        ]);
        return redirect('pendapatansewa');
    }
    public function hapusPendapatansewa(Request $request){
        pendapatansewa::where('kd_pendapatan_sewa', [$request->KodePendapatanSewa])->delete();
        PenerimaanKas::where('kd_pendapatan_sewa', [$request->KodePendapatanSewa])->delete();
        $penerimaanKasMdl = penerimaanKas::where('kd_pendapatan_sewa', '=', $request->KodePendapatanSewa)->first();
        if (isset($penerimaanKasMdl['kd_terima_kas'])) {
            Kas::where('kd_terima_kas', '=', $penerimaanKasMdl['kd_terima_kas'])->first()->delete();
        }
        return redirect('pendapatansewa') ->with('alert', 'Data Berhasil Dihapus!');
    }
}