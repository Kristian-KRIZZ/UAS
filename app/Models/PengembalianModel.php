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

    //relasi ke petugas
    public function petugas()
    {
        return $this->belongsTo('App\Models\PetugasModel', 'id_petugas');
    }

    //relasi ke siswa
    public function anggota()
    {
        return $this->belongsTo('App\Models\AnggotaModel', 'id_anggota');
    }

    //relasi ke buku
    public function buku()
    {
        return $this->belongsTo('App\Models\BukuModel', 'id_buku');
    }

    //relasi ke pinjam
    public function pinjam()
    {
        return $this->belongsTo('App\Models\PinjamModel', 'id_pinjam');
    }
}
