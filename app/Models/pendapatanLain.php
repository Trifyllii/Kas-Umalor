<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendapatanLain extends Model
{
    use HasFactory;
    protected $table = "pendapatan_lain";
    public $incrementing = false;
    protected $fillable = ['kd_pendapatan_lain','tgl_pendapatan_lain','nm_barang','jml_barang','jml_pendapatan_lain'];
}