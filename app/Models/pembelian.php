<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembelian extends Model
{
    use HasFactory;
    protected $table = "pembelian";
    public $incrementing = false;
    protected $fillable = ['kd_pembelian','tgl_pembelian','nm_pembelian','jml_beli','hrg_beli'];
}