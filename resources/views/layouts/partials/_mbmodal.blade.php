<div class="modal fade bd-example-modal-xl" id="modalBooks" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data Buku</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th width="40px">Cover</th>
                            <th>Judul</th>
                            <th>ISBN</th>
                            <th>penerbit</th>
                            <th>Tahun</th>
                            <th>Stok</th>
                        </tr>
                    </thead>
                    <tbody >
                        @foreach($books as $data)
                        <tr class="pilih" data-book_id="<?php echo $data->id; ?>"
                            data-judul="<?php echo $data->judul; ?>">
                            <td class="align-middle align-items-center">
                                @if($data->cover)
                                <img src="{{url('images/bookscover/'. $data->cover)}}" alt="image"
                                    style="margin-right: 10px;border-radius: 30px" width="40px" height="40px"/>
                                @else
                                <img src="{{url('images/bookscover/no_image.png')}}" alt="image" style="margin-right: 10px;" />
                                @endif
                            </td>
                            <td class="align-middle">{{$data->judul}}</td>
                            <td class="align-middle">{{$data->isbn}}</td>
                            <td class="align-middle">{{$data->penerbit}}</td>
                            <td class="align-middle">{{$data->tahun_terbit}}</td>
                            <td class="align-middle">{{$data->jumlah}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade bd-example-modal-lg" id="modalMembers" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="background: #fff;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Data member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table id="lookup" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>
                                Nama
                            </th>
                            <th>
                                NPM
                            </th>
                            <th>
                                Prodi
                            </th>
                            <th>
                                Jenis Kelamin
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($members as $data)
                        <tr class="pilih_member" data-member_id="<?php echo $data->id; ?>"
                            data-nama="<?php echo $data->nama; ?>">
                            <td>
                                {{$data->nama}}
                            </td>
                            <td>
                                {{$data->npm}}
                            </td>

                            <td>
                                @if($data->prodi == 'TI')
                                Teknik Informatika
                                @elseif($data->prodi == 'SI')
                                Sistem Informasi
                                @endif
                            </td>
                            <td>
                                {{$data->jk === "L" ? "Laki - Laki" : "Perempuan"}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>