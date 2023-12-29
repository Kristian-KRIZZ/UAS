<?php

namespace App\Http\Controllers;

// use App\Models\BukuModel;
// use App\Models\PetugasModel;
use Illuminate\Http\Request;

//memanggil model PinjamModel
use App\Models\PinjamModel;

//memanggil model PetugasModel
use App\Models\PetugasModel;

//memanggil model AnggotaModel
use App\Models\AnggotaModel;

//memanggil model BukuModel
use App\Models\BukuModel;

class PinjamController extends Controller
{
    //method untuk tampil data peminjaman
    public function pinjamtampil()
    {
        $datapinjam = PinjamModel::orderby('id_pinjam', 'ASC')
        ->paginate(5);

        $datapetugas    = PetugasModel::all();
        $dataanggota    = AnggotaModel::all();
        $databuku       = BukuModel::all();

        return view('halaman/view_pinjam',['pinjam'=>$datapinjam,'petugas'=>$datapetugas,'anggota'=>$dataanggota,'buku'=>$databuku]);
    }

    //method untuk tambah data peminjaman
    public function pinjamtambah(Request $request)
    {
        $this->validate($request, [
            'id_petugas' => 'required',
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'tgl_pinjam' => 'required'
        ]);

        PinjamModel::create([
            'id_petugas' => $request->id_petugas,
            'id_anggota' => $request->id_anggota,
            'id_buku' => $request->id_buku,
            'tgl_pinjam' => $request->tgl_pinjam,
        ]);
        return redirect('/pinjam');
    }

    //method untuk hapus data peminjaman
    public function pinjamhapus($id_pinjam)
    {
        $datapinjam=PinjamModel::find($id_pinjam);
        $datapinjam->delete();

        return redirect()->back();
    }

    //method untuk edit data peminjaman
    public function pinjamedit($id_pinjam, Request $request)
    {
        $this->validate($request, [
            'id_petugas' => 'required',
            'id_anggota' => 'required',
            'id_buku'    => 'required',
            'tgl_pinjam' => 'required'
        ]);

        $id_pinjam = PinjamModel::find($id_pinjam);
        $id_pinjam->id_petugas    = $request->id_petugas;
        $id_pinjam->id_anggota    = $request->id_anggota;
        $id_pinjam->id_buku       = $request->id_buku;
        $id_pinjam->tgl_pinjam    = $request->tgl_pinjam;

        $id_pinjam->save();

        return redirect()->back();
    }
}