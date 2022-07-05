<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kas extends Model
{
    use HasFactory;
    protected $table = 'kas';
    protected $fillable = ['kd_kas','tgl_transaksi','ket_transaksi','debet','kredit','kd_terima_kas','kd_keluar_kas'];

}