
    <h4 class="card-title">Data transaction sedang pinjam</h4>
    
    <div class="table-responsive">
      <table class="table table-striped" id="table">
        <thead>
          <tr>
            <th>
              Kode
            </th>
            <th>
              Buku
            </th>
            <th>
              Peminjam
            </th>
            <th>
              Tgl Pinjam
            </th>
            <th>
              Tgl Kembali
            </th>
            <th>
              Status
            </th>
            <th>
              Action
            </th>
          </tr>
        </thead>
        <tbody>
        @foreach($datas as $data)
          <tr>
            <td class="py-1">
            <a href="{{route('transaction.show', $data->id)}}"> 
              {{$data->kode_transaksi}}
            </a>
            </td>
            <td>
            
              {{$data->book->judul}}
            
            </td>

            <td>
              {{$data->member->nama}}
            </td>
            <td>
             {{date('d/m/y', strtotime($data->tgl_pinjam))}}
            </td>
            <td>
              {{date('d/m/y', strtotime($data->tgl_kembali))}}
            </td>
            <td>
            @if($data->status == 'pinjam')
              <label class="badge badge-warning">Pinjam</label>
            @else
              <label class="badge badge-success">Kembali</label>
            @endif
            </td>
            <td>
            <form action="{{ route('transaction.update', $data->id) }}" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              {{ method_field('put') }}
              <button class="btn btn-info btn-sm" onclick="return confirm('Anda yakin data ini sudah kembali?')">Sudah Kembali
              </button>
            </form>
            
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
