<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biaya extends Model
{
    use HasFactory;
    protected $table = "biaya";
    public $incrementing = false;
    protected $fillable = ['kd_biaya','tgl_biaya','nm_biaya','jml_biaya'];

}