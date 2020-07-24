@section('js')
<script type="text/javascript">
    $(document).on('click', '.pilih', function (e) {
                document.getElementById("judul").value = $(this).attr('data-judul');
                document.getElementById("book_id").value = $(this).attr('data-book_id');
                $('#modalBooks').modal('hide');
            });

            $(document).on('click', '.pilih_member', function (e) {
                document.getElementById("member_id").value = $(this).attr('data-member_id');
                document.getElementById("nama").value = $(this).attr('data-nama');
                $('#modalMembers').modal('hide');
            });
          
             $(function () {
                $("#lookup, #lookup2").dataTable();
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
                        <span class="align-middle" style="font-size: 30px"><i
                                class="fas fa-book mr-1"></i>&nbsp;Peminjaman Buku</span>
                    </div>
                    <div class="float-right" style="max-height: 50px">
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="{{ route('transaction.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Peminjaman</li>
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
                    <form method="POST" action="{{ route('transaction.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('kode_transaksi') ? ' has-error' : '' }}">
                                        <label for="kode_transaksi" class="col-md-4 control-label">Kode
                                            Transaksi</label>
                                        <div class="col-md-12">
                                            <input id="kode_transaksi" type="text" class="form-control"
                                                name="kode_transaksi" value="{{ $autocode }}" required readonly="">
                                            @if ($errors->has('kode_transaksi'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('kode_transaksi') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group{{ $errors->has('tgl_pinjam') ? ' has-error' : '' }}">
                                        <label for="tgl_pinjam" class="col-md-12 control-label">Tanggal Pinjam</label>
                                        <div class="col-md-12">
                                            <input id="tgl_pinjam" type="date" class="form-control" name="tgl_pinjam"
                                                value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}">
                                            @if ($errors->has('tgl_pinjam'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tgl_pinjam') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group{{ $errors->has('tgl_kembali') ? ' has-error' : '' }}">
                                        <label for="tgl_kembali" class="col-md-12 control-label">Tanggal Kembali</label>
                                        <div class="col-md-12">
                                            <input id="tgl_kembali" type="date" class="form-control" name="tgl_kembali"
                                                value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->addDays(7)->toDateString())) }}"
                                                required="">
                                            @if ($errors->has('tgl_kembali'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('tgl_kembali') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('book_id') ? ' has-error' : '' }}">
                                        <label for="book_id" class="col-md-4 control-label">Pilih Buku</label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <input id="judul" type="text" class="form-control" readonly="" required>
                                                <input id="book_id" type="hidden" name="book_id"
                                                    value="{{ old('book_id') }}" required readonly="">
                                                <span class="input-group-btn" style="margin-left:10px">
                                                    <button type="button" class="btn btn-info btn-secondary"
                                                        data-toggle="modal" data-target="#modalBooks"><b>Books</b> <span
                                                            class="fa fa-search"></span></button>
                                                </span>
                                            </div>
                                            @if ($errors->has('book_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('book_id') }}</strong>
                                            </span>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group{{ $errors->has('member_id') ? ' has-error' : '' }}">
                                        <label for="member_id" class="col-md-4 control-label">Plih Member</label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <input id="nama" type="text" class="form-control" readonly="" required>
                                                <input id="member_id" type="hidden" name="member_id"
                                                    value="{{ old('member_id') }}" required readonly="">
                                                <span class="input-group-btn" style="margin-left:10px">
                                                    <button type="button" class="btn btn-warning btn-secondary"
                                                        data-toggle="modal" data-target="#modalMembers"><b>Members</b>
                                                        <span class="fa fa-search"></span></button>
                                                </span>
                                            </div>
                                            @if ($errors->has('member_id'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('member_id') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('ket') ? ' has-error' : '' }}">
                                        <label for="keterangan" class="col-md-12 control-label">Keterangan</label>
                                        <div class="col-md-12">
                                            <textarea rows="5" cols="60 id=" keterangan" type="text"
                                                class="form-control" name="keterangan"
                                                value="{{ old('keterangan') }}"></textarea>
                                            @if ($errors->has('keterangan'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('keterangan') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group d-flex justify-content-end mt-4 mb-0"">
                                <button type=" submit" style="width:200px" class="btn btn-primary">Simpan</button>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <a href="{{ route('transaction.index') }}" style="width:200px"
                                    class="btn btn-danger">Kembali</a>
                            </div>
                        </div>
                    </form>
                    @include('layouts.partials._mbmodal')
                </div>
            </div>
        </div>
    </main>
    @endsection