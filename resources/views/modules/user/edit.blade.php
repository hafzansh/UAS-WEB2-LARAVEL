@extends('layouts.template')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <br>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Users</a></li>
                <li class="breadcrumb-item active">Edit Data</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header"><i class="fas fa-table mr-1"></i>Edit Data Pengguna</div>
                <div class="card-body">
                <form method="POST" action="{{ route('users.update', $user->id) }}">
                    {{ method_field('PUT') }}
                    @csrf
                    <div class="form-group">
                        <label class="small mb-1" for="email">Nama Lengkap</label>
                        <input class="form-control py-4" id="name" value="{{ $user ? $user->name : '' }}" type="text" placeholder="Masukkan Nama Lengkap" name="name" required autofocus/>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="email">Email</label>                    
                        <input class="form-control py-4" id="inputEmailAddress" value="{{ $user ? $user->email : '' }}" type="email" placeholder="Enter email address" name="email" required autofocus/>
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="password">Password</label>
                        <input class="form-control py-4" id="password" value="{{ old('password') }}" type="password" placeholder="Enter Password" name="password" required />
                    </div>

                    <div class="form-group d-flex align-items-center mt-4 mb-0 float-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>  &nbsp;
                        <a href="{{ route('users.index') }}" class="btn btn-danger">Batal</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </main>
@endsection