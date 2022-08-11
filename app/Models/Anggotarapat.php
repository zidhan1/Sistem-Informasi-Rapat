<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggotarapat extends Model
{
    use HasFactory;

    protected $table = 'anggotarapat';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'id_rapat', 'id_divisi', 'nip'];
}