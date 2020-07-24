@section('js')

@stop
@extends('layouts.template')

@section('content')
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid">
      <br>
      <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
      <div class="row">
        <div class="col-md-12">
          @include('layouts.partials._flash')
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-md-6">
          <div class="card bg-light text-dark mb-4">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="fa fa-address-book fa-lg" style="font-size:70px;"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right" style="font-size:20px;margin-top:-5px">Anggota</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0" style="font-size:40px">
                      {{$member->count()}}&nbsp;Orang</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-dark stretched-link" href="{{route('members.index')}}">View Details</a>
              <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card bg-light text-dark mb-4">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="fa fa-desktop fa-lg" style="font-size:70px"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right" style="font-size:20px;margin-top:-5px">Teknik Informatika</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0" style="font-size:40px">
                      {{$member->where('prodi','TI')->count()}}&nbsp;Orang</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-dark stretched-link" href="{{route('members.index')}}">View Details</a>
              <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card bg-light text-dark mb-4">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="fa fa-list-alt fa-lg" style="font-size:70px"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right" style="font-size:20px;margin-top:-5px">Sistem Informasi</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0" style="font-size:40px">
                      {{$member->where('prodi','SI')->count()}}&nbsp;Orang</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-dark stretched-link" href="{{route('members.index')}}">View Details</a>
              <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-md-6">
          <div class="card bg-light text-dark mb-4">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="fas fa-book fa-lg" style="font-size:70px;"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right" style="font-size:20px;margin-top:-5px">Buku</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0" style="font-size:40px">{{$book->count()}}&nbsp;Judul</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-dark stretched-link" href="{{route('books.index')}}">View Details</a>
              <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card bg-light text-dark mb-4">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="fas fa-book-open fa-lg" style="font-size:70px"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right" style="font-size:20px;margin-top:-5px">Stok Buku</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0" style="font-size:40px">{{$book->sum('jumlah')}}&nbsp;Buku</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-dark stretched-link" href="{{route('books.index')}}">View Details</a>
              <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card bg-light text-dark mb-4">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="fas fa-window-restore fa-lg" style="font-size:70px"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right" style="font-size:20px;margin-top:-5px">Buku Dipinjam</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0" style="font-size:40px">
                      {{$transaction->where('status', 'pinjam')->count()}}&nbsp;Buku</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-dark stretched-link" href="{{route('books.index')}}">View Details</a>
              <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-4 col-md-6">
          <div class="card bg-light text-dark mb-4">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="fas fa-receipt fa-lg" style="font-size:70px"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right" style="font-size:20px;margin-top:-5px">Buku di Rak 1</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0" style="font-size:40px">
                      {{$book->where('lokasi', 'rak1')->sum('jumlah')}}&nbsp;Buku</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-dark stretched-link" href="{{route('books.index')}}">View Details</a>
              <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card bg-light text-dark mb-4">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="fas fa-receipt fa-lg" style="font-size:70px"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right" style="font-size:20px;margin-top:-5px">Buku di Rak 2</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0" style="font-size:40px">
                      {{$book->where('lokasi', 'rak2')->sum('jumlah')}}&nbsp;Buku</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-dark stretched-link" href="{{route('books.index')}}">View Details</a>
              <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-md-6">
          <div class="card bg-light text-dark mb-4">
            <div class="card-body">
              <div class="clearfix">
                <div class="float-left">
                  <i class="fas fa-receipt fa-lg" style="font-size:70px"></i>
                </div>
                <div class="float-right">
                  <p class="mb-0 text-right" style="font-size:20px;margin-top:-5px">Buku di Rak 3</p>
                  <div class="fluid-container">
                    <h3 class="font-weight-medium text-right mb-0" style="font-size:40px">
                      {{$book->where('lokasi', 'rak3')->sum('jumlah')}}&nbsp;Buku</h3>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
              <a class="small text-dark stretched-link" href="{{route('transaction.index')}}">View Details</a>
              <div class="small text-dark"><i class="fas fa-angle-right"></i></div>
            </div>
          </div>
        </div>
      </div>
      <br>
    </div>
  </main>
</div>
</div>


@endsection