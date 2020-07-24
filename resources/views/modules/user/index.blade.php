@extends('layouts.template')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <br>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="float-left">
                        <span class="align-middle" style="font-size: 25px;"><i class="fas fa-user mr-1"></i>&nbsp;Data User</span>
                    </div>
                    <div class="float-right">
                        <a href="{{route('users.create')}}" class="btn btn-xs btn-primary right">Tambah Data</a>
                    </div>
                </div>
            
                <div class="card-body">
                    @include('layouts.partials._flash')
                    <div class="table-responsive">
                        {!! $html->table(['class' => 'table table-bordered table-striped table-hover dataTable'])!!}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
{!! $html->scripts() !!}
@endpush