<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notulensi extends Model
{
    use HasFactory;

    protected $table = 'notulen';
    protected $primaryKey = 'id';
    protected $fillable = ['id_rapat', 'file'];
}