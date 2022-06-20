<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dagang extends Model
{
    use HasFactory;
    protected $table = "dagang";
    protected $fillable = ['kd_dagang','nm_dagang','tgl_pembelian','jenis_dagang','jml_pembelian','hrg_beli','hrg_jual','quantity'];
}