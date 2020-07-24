@extends('layouts.template')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <br>
            <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Dashboard</a></li>
                <li class="breadcrumb-item active">Pengembalian</li>
            </ol>
            <div class="card mb-4">
                <div class="card-header">
                    <div class="float-left">
                        <span class="align-middle" style="font-size: 25px;"><i class="fas fa-book mr-1"></i>&nbsp;Buku Yang Sedang dipinjam</span>
                    </div>
                    <div class="float-right">
                        <a href="{{ route('transaction.create') }}" class="btn btn-xs btn-primary">Pinjam Buku</a>
                        <a href="{{ route('history') }}" class="btn btn-xs btn-info">Data Transaksi</a>
                        <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Print Data
                        </button>
                        <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{ route('transaction.print') }}">Semua</a>
                        <a class="dropdown-item" href="{{ url('admin/print-transaction?status=pinjam') }}">Hanya Pinjam</a>
                        <a class="dropdown-item" href="{{ url('admin/print-transaction?status=kembali') }}">Hanya Pengembalian</a>
                        </div>
                    </div>
                    </div>
                <div class="card-body">
                    @include('layouts.partials._flash')
                    <div class="table-responsive">
                        {!! $html->table(['class' => 'table table-bordered table-striped table-hover dataTable','style'
                      =>'text-align:center; vertical-align: middle;'])!!}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')

{!! $html->scripts() !!}

@endpush
