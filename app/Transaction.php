<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['kode_transaksi', 'member_id', 'book_id', 'tgl_pinjam', 'tgl_kembali', 'status', 'keterangan'];

    public function member()
    {
    	return $this->belongsTo(Member::class);
    }

    public function book()
    {
    	return $this->belongsTo(Book::class);
    }
}
