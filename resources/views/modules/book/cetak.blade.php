<!DOCTYPE html>
<html>

<head>
  <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td,
    th {
      border: 1px solid #383434;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #cad6ce;
    }

    .tengah {
      text-align: center;
      text-decoration: underline;
    }
  </style>
</head>

<body>

  <h2 class="tengah">Laporan Data Buku</h2>

  <table>
    <tr>
      <th>NO.</th>
      <th>Judul</th>
      <th>ISBN</th>
      <th>Penerbit</th>
      <th>Tahun Terbit</th>
      <th>Jumlah</th>
      <th>Lokasi</th>
    </tr>
    @php $no=1; @endphp
    @foreach($data as $book)
    <tr>
      <td> {{ $no++ }} </td>
      <td> {{ $book->judul }} </td>
      <td> {{ $book->isbn }} </td>
      <td> {{ $book->penerbit }} </td>
      <td> {{ $book->tahun_terbit }} </td>
      <td> {{ $book->jumlah }} </td>
      <td>
        @if($book->lokasi == 'rak1')
        RAK 1
        @elseif($book->lokasi == 'rak2')
        RAK 2
        @else
        RAK 3
        @endif</td>
    </tr>
    @endforeach
  </table>

</body>

</html>