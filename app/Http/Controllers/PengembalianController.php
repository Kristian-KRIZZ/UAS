<?php

namespace App\Http\Controllers;

// use App\Models\BukuModel;
// use App\Models\PetugasModel;
use Illuminate\Http\Request;

//memanggil model PengembalianModel
use App\Models\PengembalianModel;

//memanggil model PetugasModel
use App\Models\PetugasModel;

//memanggil model AnggotaModel
use App\Models\AnggotaModel;

//memanggil model BukuModel
use App\Models\BukuModel;

class PengembalianController extends Controller
{
    //method untuk tampil data peminjaman
    public function pengembaliantampil()
    {
        $datapengembalian = PengembalianModel::orderby('id_pengembalian', 'ASC')
        ->paginate(5);

        $datapetugas    = PetugasModel::all();
        $dataanggota    = AnggotaModel::all();
        $databuku       = BukuModel::all();

        return view('halaman/view_pengembalian',['pengembalian'=>$datapengembalian,'petugas'=>$datapetugas,'anggota'=>$dataanggota,'buku'=>$databuku]);
    }

    //method untuk tambah data pengembalian
    public function pengembaliantambah(Request $request)
    {
        $this->validate($request, [
            'id_petugas' => 'required',
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'tgl_pengembalian' => 'required'
        ]);

        PengembalianModel::create([
            'id_petugas' => $request->id_petugas,
            'id_anggota' => $request->id_anggota,
            'id_buku' => $request->id_buku,
            'tgl_pengembalian' => $request->tgl_pengembalian
        ]);
        return redirect('/pengembalian');
    }

    //method untuk hapus data pengembalian
    public function pengembalianhapus($id_pengembalian)
    {
        $datapengembalian=PengembalianModel::find($id_pengembalian);
        $datapengembalian->delete();

        return redirect()->back();
    }

    //method untuk edit data pengembalian
    public function pengembalianedit($id_pengembalian, Request $request)
    {
        $this->validate($request, [
            'id_petugas' => 'required',
            'id_anggota' => 'required',
            'id_buku' => 'required',
            'tgl_pengembalian' => 'required'
        ]);

        $id_pengembalian = PengembalianModel::find($id_pengembalian);
        $id_pengembalian->id_petugas        = $request->id_petugas;
        $id_pengembalian->id_anggota        = $request->id_anggota;
        $id_pengembalian->id_buku           = $request->id_buku;
        $id_pengembalian->tgl_pengembalian  = $request->tgl_pengembalian;

        $id_pengembalian->save();

        return redirect()->back();
    }
}