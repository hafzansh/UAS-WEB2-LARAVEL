<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #383434;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #cad6ce;
}

.tengah{
    text-align: center;
    text-decoration: underline;
}

</style>
</head>
<body>

<h2 class="tengah">Laporan Data Transaksi</h2>

<table>
  <tr>
      <th>NO.</th>
      <th>Kode</th>
      <th>Buku</th>
      <th>Peminjam</th>
      <th>Tanggal Pinjam</th>
      <th>Tanggal Kembali</th>
      <th>Status</th>
  </tr>
  @php $no=1;  @endphp
  @foreach($data as $transaction)
    <tr>
        <td> {{ $no++ }} </td>
        <td> {{ $transaction->kode_transaksi }} </td>
        <td> {{ $transaction->book->judul }} </td>
        <td> {{ $transaction->member->nama }} </td>
        <td> {{ date("d F Y", strtotime($transaction->tgl_pinjam)) }} </td>
        <td> {{ date("d F Y", strtotime($transaction->tgl_kembali)) }} </td>
        <td> {{ $transaction->status == 'kembali' ? 'Sudah dikembalikan' : 'Masih Dipinjam' }} </td>
    </tr>
  @endforeach
</table>

</body>
</html>
