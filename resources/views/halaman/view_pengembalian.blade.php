
@extends('index')
@section('title', 'Pengembalian')

@section('isihalaman')
    <h3><center>Data Pengembalian Buku</center><h3>
    <h3><center>Perpustakaan Universitas Semarang</center></h3>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPengembalianTambah"> 
        Tambah Data Pengembalian 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Pengembalian</td>
                <td align="center">Nama Petugas</td>
                <td align="center">Nama Anggota</td>
                <td align="center">Judul Buku</td>
                <td align="center">Tanggal Pengembalian</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($pengembalian as $index=>$pe)
                <tr>
                    <td align="center" scope="row">{{ $index + $pengembalian->firstItem() }}</td>
                    <td align="center">{{$pe->id_pengembalian}}</td>
                    <td>{{$pe->petugas->nama_petugas}}</td>
                    <td>{{$pe->anggota->nama_anggota}}</td>
                    <td>{{$pe->buku->judul}}</td>
                    <td align="center">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalPengembalianEdit{{$pe->id_pengembalian}}"> 
                            Edit
                        </button>

                        <!-- Awal Modal EDIT data Peminjaman -->
                        <div class="modal fade" id="modalPengembalianEdit{{$pe->id_pengembalian}}" tabindex="-1" role="dialog" aria-labelledby="modalPengembalianEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalPengembalianEditLabel">Form Edit Data Pengembalian</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formpengembalianedit" id="formpengembalianedit" action="/pengembalian/edit/{{ $pe->id_pengembalian}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_pengembalian" class="col-sm-4 col-form-label">ID Pengembalian</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="id_pengembalian" name="id_pengembalian" value="{{ $pe->id_pengembalian}}" readonly>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="petugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_petugas" name="id_petugas">
                                                        @foreach ($petugas as $pt)
                                                            @if ($pt->id_petugas == $p->id_petugas)
                                                                <option value="{{ $pt->id_petugas }}" selected>{{ $pt->nama_petugas }}</option>
                                                            @else
                                                                <option value="{{ $pt->id_petugas }}">{{ $pt->nama_petugas }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_anggota" name="id_anggota">
                                                        @foreach ($anggota as $a)
                                                            @if ($a->id_anggota == $p->id_anggota)
                                                                <option value="{{ $a->id_anggota }}" selected>{{ $a->nama_anggota }}</option>
                                                            @else
                                                                <option value="{{ $a->id_anggota }}">{{ $a->nama_anggota }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="judul" class="col-sm-4 col-form-label">Judul Buku</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_buku" name="id_buku">
                                                        @foreach ($buku as $bk)
                                                            @if ($bk->id_buku == $p->id_buku)
                                                                <option value="{{ $bk->id_buku }}" selected>{{ $bk->judul }}</option>
                                                            @else
                                                                <option value="{{ $bk->id_buku }}">{{ $bk->judul }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        
                                            <p>
                                            <div class="form-group row">
                                                <label for="pengembalian" class="col-sm-4 col-form-label">Tanggal Pengembalian</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian">
                                                        @foreach ($pengembalian as $pe)
                                                            @if ($pe->tgl_pengembalian == $pe->tgl_pengembalian)
                                                                    <option value="{{ $pe->id_pengembalian }}" selected>{{ $pe->pengembalian }}</option>
                                                            @else
                                                                <option value="{{ $pe->id_pengembalian }}">{{ $pe->pengembalian }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>    

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="pinjamtambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data Pengembalian -->
                        |
                        <a href="pengembalian/hapus/{{$pe->id_pengembalian}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $pengembalian->currentPage() }} <br />
    Jumlah Data : {{ $pengembalian->total() }} <br />
    Data Per Halaman : {{ $pengembalian->perPage() }} <br />

    {{ $pengembalian->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Pengembalian -->
    <div class="modal fade" id="modalPengembalianTambah" tabindex="-1" role="dialog" aria-labelledby="modalPengembalianTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPengembalianTambahLabel">Form Input Data Pengembalian</h5>
                </div>
                <div class="modal-body">

                    <form name="formpengembaliantambah" id="formpengembaliantambah" action="/pengembalian/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_petugas" class="col-sm-4 col-form-label">Nama Petugas</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_petugas" name="id_petugas" placeholder="Pilih Nama Petugas">
                                    <option></option>
                                    @foreach($petugas as $pt)
                                        <option value="{{ $pt->id_petugas }}">{{ $pt->nama_petugas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="id_anggota" class="col-sm-4 col-form-label">Nama Anggota</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_anggota" name="id_anggota" placeholder="Pilih Nama Anggota">
                                    <option></option>
                                    @foreach($anggota as $a)
                                        <option value="{{ $a->id_anggota }}">{{ $a->nama_anggota }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- <p>
                        <div class="form-group row">
                            <label for="tgl_pengembalian" class="col-sm-4 col-form-label">Tanggal Pengembalian</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian" placeholder="Masukan Tanggal">
                                    <option></option>
                                     @foreach($pengembalian as $pe)
                                        <option value="{{ $pe->id_pengembalian }}">{{ $pe->pengembalian }}</option>
                                    @endforeach
                                </select>
                             </div>
                         </div> --}}

                         <p>
                         <div class="form-group row">
                            <label for="pengembalian" class="col-sm-4 col-form-label">Tanggal Pengembalian</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pengembalian" name="pengembalian" placeholder="Masukan Tanggal Pengembalian">
                            </div>
                         </div>

                        <p>
                        <div class="form-group row">
                            <label for="id_buku" class="col-sm-4 col-form-label">Judul Buku</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_buku" name="id_buku" placeholder="Pilih Judul Buku">
                                    <option></option>
                                    @foreach($buku as $bk)
                                        <option value="{{ $bk->id_buku }}">{{ $bk->judul }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="pengembalian" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data Pengembalian -->
    
@endsection