<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pendapatanSewa extends Model
{
    use HasFactory;
    protected $table = "pendapatan_sewa";
    public $incrementing = false;
    protected $fillable = ['kd_pendapatan_sewa','tgl_pendapatan_sewa','nm_ikan','jml_pendapatan_sewa'];
}