@section('js')
<script type="text/javascript">
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#image').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#cover").change(function(){
    readURL(this);
});
</script>
@stop
@extends('layouts.template')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <br>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="float-left">
                        <span class="align-middle" style="font-size: 30px"><i class="fas fa-book mr-1"></i>&nbsp;Edit
                            Data Buku</span>
                    </div>
                    <div class="float-right" style="max-height: 50px">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ route('books.index') }}">Books</a></li>
                            <li class="breadcrumb-item active">Edit Data</li>
                        </ol>
                    </div>
                </div>
                <div class="card-body ">
                    <form method="POST" action="{{ route('books.update', $book->id) }}" enctype="multipart/form-data">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="small mb-1" for="judul">Judul Buku</label>
                                        <input class="form-control py-4" id="judul"
                                            value="{{ $book ? $book->judul : '' }}" type="text"
                                            placeholder="Masukkan Judul Buku" name="judul" required autofocus />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="small mb-1" for="isbn">ISBN</label>
                                        <input class="form-control py-4" id="isbn"
                                            value="{{ $book ? $book->isbn : '' }}" type="text"
                                            placeholder="Masukkan ISBN" name="isbn" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5">
                                    <div class="form-group">
                                        <label class="small mb-1" for="penerbit">Penerbit</label>
                                        <input class="form-control py-4" id="penerbit"
                                            value="{{ $book ? $book->penerbit : '' }}" type="text"
                                            placeholder="Masukkan Penerbit" name="penerbit" required />
                                    </div>
                                </div>
                                <div class="col-sm-4">

                                    <label class="small mb-1" for="tahun_terbit">Tahun Terbit</label>
                                    <input class="form-control py-4" id="tahun_terbit"
                                        value="{{ $book ? $book->tahun_terbit : '' }}" type="number"
                                        placeholder="Masukkan Tahun Terbit" name="tahun_terbit" required />
                                </div>
                                <div class="col-sm-3">
                                    <label class="small mb-1" for="jumlah">Jumlah</label>
                                    <input class="form-control py-4" id="jumlah"
                                        value="{{ $book ? $book->jumlah : '' }}" type="number"
                                        placeholder="Masukkan Jumlah" name="jumlah" required />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-9">
                                    <div class="form-group">
                                        <label class="small mb-1" for="penerbit">Deskripsi Buku</label>
                                        <input class="form-control py-4" id="deskripsi"
                                            value="{{ $book ? $book->deskripsi : '' }}" type="text"
                                            placeholder="Masukkan Penerbit" name="deskripsi" required />
                                    </div>

                                    <label class="small mb-1" for="tempat_lahir">Lokasi Buku</label>
                                    <select class="form-control form-control-solid" style="min-height: 50px"
                                        id="exampleFormControlSelect1" name="lokasi">
                                        <option value="" selected disabled>--Pilih Rak--</option>
                                        <option value="rak1" {{ $book->lokasi == 'rak1' ? 'selected' : ''   }}>RAK 1
                                        </option>
                                        <option value="rak2" {{ $book->lokasi == 'rak2' ? 'selected' : ''   }}>RAK 2
                                        </option>
                                        <option value="rak3" {{ $book->lokasi == 'rak3' ? 'selected' : ''   }}>RAK 3
                                        </option>
                                    </select>
                                    <div style="margin-top:11px">
                                        <label class="small mb-1" for="penerbit">Pilih File Cover</label>
                                        <input class="uploads form-control" style="min-height: 50px;padding-top:10px"
                                            id="cover" value="{{ $book ? $book->cover : '' }}" type="file"
                                            name="cover" />
                                        <input style="visibility: hidden;" class="" width="0px" height="0px"
                                            id="cv" value="{{ $book ? $book->cover : '' }}" type="text"
                                            name="cv" />
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <label class="small mb-1" for="penerbit">Cover Buku</label>
                                    <img width="230" id="image"
                                        style="border: 1px solid rgb(206, 212, 218);border-radius: 7px;" height="230"
                                        @if($book->cover)
                                    src="{{ asset('images/bookscover/'.$book->cover) }}" @endif />
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-center mt-4 mb-0"">
                                <button type=" submit" style="width:300px" class="btn btn-primary">Simpan</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('books.index') }}" style="width:300px"
                                    class="btn btn-danger">Batal</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    @endsection