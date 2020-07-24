<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Book;
use Yajra\DataTables\Html\Builder;
use DataTables;
use Session;
use Carbon\Carbon;
use PDF;

class BookController extends Controller
{
    public function index(Request $request, Builder $builder)
    {
        if($request->ajax()) {
            $books = Book::all();
            return DataTables::of($books)
            ->editColumn('action', function($books){
                return view('layouts.partials._action', [
                'model' => $books,
                'form_url' => route('books.destroy', $books->id),
                'edit_url' => route('books.edit', $books->id),
                'confirm_message' => 'Anda Yakin Ingin Menghapus ?' ]);
            })
            ->rawColumns(['action'])
            ->make('true');
        }

        $html = $builder->columns([
            ['data' => 'judul', 'name' => 'judul', 'title' => 'Judul Buku'],
            ['data' => 'isbn', 'name' => 'isbn', 'title' => 'ISBN'],
            ['data' => 'penerbit', 'name' => 'penerbit', 'title' => 'Penerbit'],
            ['data' => 'tahun_terbit', 'name' => 'tahun_terbit', 'title' => 'Tahun Terbit'],
            ['data' => 'jumlah', 'name' => 'jumlah', 'title' => 'Jumlah'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Aksi', 'orderable' => false, 'searchable' => 'false']
        ]);

        return view('modules.book.index', compact('html'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('modules.book.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul'          => 'required|string|max:50',
            'isbn'           => 'required|string|max:15',
            'penerbit'  => 'required|string|max:50',
            'tahun_terbit'  => 'required|integer',
            'jumlah'  => 'required|integer',
            'deskripsi'  => 'required|string|max:255',
            'lokasi'       => 'required'
        ]);

        if($request->file('cover')) {
            $file = $request->file('cover');
            $date = Carbon::now();
            $random  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$date->format('Y-m-d-H-i-s').'.'.$random; 
            $request->file('cover')->move("images/bookscover", $fileName);
            $cover = $fileName;
        } else {
            $cover= 'no_images.png';
        }
        $user = Book::create([
            'judul' => $request->get('judul'),
            'isbn' => $request->get('isbn'),
            'penerbit' => $request->get('penerbit'),
            'tahun_terbit' => $request->get('tahun_terbit'),
            'jumlah' => $request->get('jumlah'),
            'deskripsi' => $request->get('deskripsi'),
            'lokasi' => $request->get('lokasi'),
            'cover' => $cover
        ]);

        Session::flash("flash_message", [
            "warna"     => "alert-success",
            "message"   => "Data Member Berhasil Ditambahkan"
        ]);
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('modules.book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    
    public function update(Request $request, Book $book)
    {        
        if($request->file('cover')) {
            $file = $request->file('cover');
            $date = Carbon::now();
            $random  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$date->format('Y-m-d-H-i-s').'.'.$random; 
            $request->file('cover')->move("images/bookscover", $fileName);
            $cover = $fileName;
        } else {
            $cover= $request->get('cv');
        }       
        $book->update([
            'judul' => $request->get('judul'),
            'isbn' => $request->get('isbn'),
            'pengarang' => $request->get('pengarang'),
            'penerbit' => $request->get('penerbit'),
            'tahun_terbit' => $request->get('tahun_terbit'),
            'jumlah_buku' => $request->get('jumlah_buku'),
            'deskripsi' => $request->get('deskripsi'),
            'lokasi' => $request->get('lokasi'),
            'cover' => $cover
        ]);

        Session::flash("flash_message", [
            "warna"     => "alert-success",
            "message"   => "Data Buku Berhasil Di Update"
        ]);
        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if(!$book->destroy($book->id)) return redirect()->back();
        Session::flash("flash_message", [
            "warna"     => "alert-danger",
            "message"   => "Data Buku Berhasil Di Hapus"
        ]);
        return redirect()->route('members.index');
    }
    public function printBooks()
    {
        $data = Book::all();

        if(is_null($data)){
            Session::flash("flash_message", [
                "warna"     => "alert-danger",
                "message"   => "Data Kosong Tidak Bisa Dicetak"
            ]);
            return redirect()->back();
        }else{
            $judul = "DATA BUKU-".date('Y-m-d').".pdf";
            $pdf = PDF::Loadview('modules.book.cetak', compact('data'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream($judul, array("Attachment" => false));
        }
    }
}
