<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = [
        'judul', 'isbn', 'penerbit', 'tahun_terbit', 'jumlah', 'deskripsi', 'lokasi', 'cover'
    ];

    public function transaction()
    {
    	return $this->hasMany(Transaction::class);
    }
}
