@extends('layouts.template')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <br>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="float-left">
                        <span class="align-middle" style="font-size: 30px"><i class="fas fa-book mr-1"></i>&nbsp;Tambah
                            Data Buku</span>
                    </div>
                    <div class="float-right" style="max-height: 50px">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ route('books.index') }}">Books</a></li>
                            <li class="breadcrumb-item active">Tambah Data</li>
                        </ol>
                    </div>
                </div>
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                        <ul>
                            @foreach($errors->all() as $error)
                            <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="small mb-1" for="judul">Judul Buku</label>
                                        <input class="form-control py-4" id="judul"
                                            value="{{ old('judul') }}" type="text"
                                            placeholder="Masukkan Judul Buku" name="judul" required autofocus />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="small mb-1" for="isbn">ISBN</label>
                                        <input class="form-control py-4" id="isbn"
                                            value="{{ old('isbn') }}" type="text"
                                            placeholder="Masukkan ISBN" name="isbn" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label class="small mb-1" for="penerbit">Penerbit</label>
                                        <input class="form-control py-4" id="penerbit"
                                            value="{{ old('penerbit') }}" type="text"
                                            placeholder="Masukkan Penerbit" name="penerbit" required />
                                    </div>
                                </div>
                                <div class="col-sm-4">

                                    <label class="small mb-1" for="tahun_terbit">Tahun Terbit</label>
                                    <input class="form-control py-4" id="tahun_terbit"
                                        value="{{ old('tahun_terbit') }}" type="number"
                                        placeholder="Masukkan Tahun Terbit" name="tahun_terbit" required />
                                </div>
                                <div class="col-sm-3">
                                    <label class="small mb-1" for="jumlah">Jumlah</label>
                                    <input class="form-control py-4" id="jumlah"
                                        value="{{ old('jumlah') }}" type="number"
                                        placeholder="Masukkan Jumlah" name="jumlah" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="small mb-1" for="penerbit">Deskripsi Buku</label>
                                        <input class="form-control py-4" id="deskripsi"
                                            value="{{ old('deskripsi') }}" type="text"
                                            placeholder="Masukkan Penerbit" name="deskripsi" required />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <label class="small mb-1" for="tempat_lahir">Lokasi Buku</label>
                                    <select class="form-control form-control-solid" style="min-height: 50px"
                                        id="exampleFormControlSelect1" name="lokasi">
                                        <option value="" selected disabled>--Pilih Rak--</option>
                                        <option value="rak1">RAK 1</option>
                                        <option value="rak2">RAK 2</option>
                                        <option value="rak3">RAK 3</option>
                                        </option>
                                    </select>
                                </div>
                                <div class="col-sm-7">
                                    <label class="small mb-1" for="penerbit">Cover Buku</label>
                                    <input class="form-control" id="cover" value="{{ old('cover') }}"
                                        type="file" name="cover" style="min-height: 50px;padding-top:10px" />
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center mt-4 mb-0"">
                                <button type="submit" style="width:300px" class="btn btn-primary">Simpan</button> &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('books.index') }}" style="width:300px" class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @endsection