<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    use HasFactory;

    protected $table = 'rapat';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'id_divisi', 'nama_rapat', 'tanggal'];
}
