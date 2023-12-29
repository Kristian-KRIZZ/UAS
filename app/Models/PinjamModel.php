<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PinjamModel extends Model
{
    use HasFactory;
    protected $table        = "pinjam";
    protected $primaryKey   = "id_pinjam";
    protected $fillable     = ['id_petugas','id_anggota','id_buku','tgl_pinjam'];
}