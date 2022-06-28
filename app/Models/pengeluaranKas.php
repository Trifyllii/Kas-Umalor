<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengeluaranKas extends Model
{
    use HasFactory;
    
    protected $table = "pengeluaran_kas";
    protected $fillable = ['kd_keluar_kas','kd_pembelian','kd_biaya','tgl_transaksi','ket_transaksi','jml_transaksi'];

}