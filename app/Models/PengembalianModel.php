<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengembalianModel extends Model
{
    use HasFactory;
    protected $table        = "pengembalian";
    protected $primaryKey   = "id_pengembalian";
    protected $fillable     = ['id_petugas','id_anggota','id_buku','tgl_pengembalian'];
}