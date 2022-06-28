<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penerimaanKas extends Model
{
    use HasFactory;
    protected $table = "penerimaan_kas";
    protected $fillable = ['kd_terima_kas','kd_pendapatan_sewa','kd_pendapatan_lain','tgl_transaksi','ket_transaksi','jml_transaksi'];
}