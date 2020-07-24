<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Book;
use App\Member;
use App\Transaction;
use Yajra\DataTables\Html\Builder;
use DataTables;
use Session;
use Carbon\Carbon;
use PDF;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Builder $builder)
    {
        if($request->ajax()) {
            $transactions = Transaction::where('status','pinjam');
            return DataTables::of($transactions)
            ->editColumn('action',function($transactions){
                return view('layouts.partials._return', [
                'model' => $transactions,
                'form_url' => route('transaction.update', $transactions->id),
                'confirm_message' => 'Apakah buku sudah benar kembali?' ]);
            })
            ->editColumn('tgl_pinjam', function($transactions){                
                return date("d F Y", strtotime($transactions->tgl_pinjam));
            })
            ->editColumn('tgl_kembali', function($transactions){
                return date("d F Y", strtotime($transactions->tgl_kembali));
            })                      
            ->addColumn('judul', function ($transaction) {
                return $transaction->book->judul;
            })
            ->addColumn('member', function ($transaction) {
                return $transaction->member->nama;
            })
            
            ->rawColumns(['action'])
            ->make('true');
        }
        $transaction = Transaction::get();
        $member   = Member::get();
        $book      = Book::get();
        $html = $builder->columns([
            ['data' => 'kode_transaksi' ,'name' => 'kode_transaksi','title' => 'Kode'],
            ['data' => 'judul' ,'name' => 'judul','title' => 'Buku'],
            ['data' => 'member' ,'name' => 'judul','title' => 'Peminjam'],
            ['data' => 'tgl_pinjam' ,'name' => 'tgl_pinjam','title' => 'Tanggal Pinjam'],
            ['data' => 'tgl_kembali' ,'name' => 'tgl_kembali','title' => 'Tanggal Kembali'],
            ['data' => 'status' ,'name' => 'status','title' => 'Status'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Aksi', 'orderable' => false, 'searchable' => 'false']
        ]);
        return view('modules.transaction.index', compact('html','transaction','member','book'));
    }
    public function history(Request $request, Builder $builder)
    {
        if($request->ajax()) {
            $transactions = Transaction::all();
            return DataTables::of($transactions)
            ->editColumn('action',function($transactions){
                return view('layouts.partials._history', [
                'model' => $transactions,
                'form_url' => route('transaction.destroy', $transactions->id),
                'confirm_message' => 'Apakah buku sudah benar kembali?' ]);
            })
            ->editColumn('tgl_pinjam', function($transactions){                
                return date("d F Y", strtotime($transactions->tgl_pinjam));
            })
            ->editColumn('tgl_kembali', function($transactions){
                return date("d F Y", strtotime($transactions->tgl_kembali));
            })                      
            ->addColumn('judul', function ($transaction) {
                return $transaction->book->judul;
            })
            ->addColumn('member', function ($transaction) {
                return $transaction->member->nama;
            })
            
            ->rawColumns(['action'])
            ->make('true');
        }
        $transaction = Transaction::get();
        $member   = Member::get();
        $book      = Book::get();
        $html = $builder->columns([
            ['data' => 'kode_transaksi' ,'name' => 'kode_transaksi','title' => 'Kode'],
            ['data' => 'judul' ,'name' => 'judul','title' => 'Buku'],
            ['data' => 'member' ,'name' => 'judul','title' => 'Peminjam'],
            ['data' => 'tgl_pinjam' ,'name' => 'tgl_pinjam','title' => 'Tanggal Pinjam'],
            ['data' => 'tgl_kembali' ,'name' => 'tgl_kembali','title' => 'Tanggal Kembali'],
            ['data' => 'status' ,'name' => 'status','title' => 'Status'],
            ['data' => 'action', 'name' => 'action', 'title' => 'Aksi', 'orderable' => false, 'searchable' => 'false']
        ]);
        return view('modules.transaction.history', compact('html','transaction','member','book'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getRow = Transaction::orderBy('id', 'DESC')->get();
        $rowCount = $getRow->count();
        
        $lastId = $getRow->first();

        $autocode = "P-KT-00001";
        
        if ($rowCount > 0) {
            if ($lastId->id < 9) {
                    $autocode = "P-KT-0000".''.($lastId->id + 1);
            } else if ($lastId->id < 99) {
                    $autocode = "P-KT-000".''.($lastId->id + 1);
            } else if ($lastId->id < 999) {
                    $autocode = "P-KT-00".''.($lastId->id + 1);
            } else if ($lastId->id < 9999) {
                    $autocode = "P-KT-0".''.($lastId->id + 1);
            } else {
                    $autocode = "P-KT-".''.($lastId->id + 1);
            }
        }

        $books = Book::where('jumlah', '>', 0)->get();
        $members = Member::get();
        return view('modules.transaction.create', compact('books', 'autocode', 'members'));
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
            'kode_transaksi' => 'required|string|max:255',
            'tgl_pinjam' => 'required',
            'tgl_kembali' => 'required',
            'book_id' => 'required',
            'member_id' => 'required',

        ]);

        $transaction = Transaction::create([
                'kode_transaksi' => $request->get('kode_transaksi'),
                'tgl_pinjam' => $request->get('tgl_pinjam'),
                'tgl_kembali' => $request->get('tgl_kembali'),
                'book_id' => $request->get('book_id'),
                'member_id' => $request->get('member_id'),
                'keterangan' => $request->get('keterangan'),
                'status' => 'pinjam'
            ]);

        $transaction->book->where('id', $transaction->book_id)
                        ->update([
                            'jumlah' => ($transaction->book->jumlah - 1),
                            ]);

        Session::flash("flash_message", [
            "warna"     => "alert-success",
            "message"   => "Transaksi Berhasil Ditambahkan"
        ]);
        return redirect()->route('home');
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
    public function edit($id)
    {
        return view('modules.transaction.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $transaction = Transaction::find($id);
        $transaction->update([
                'status' => 'kembali'
                ]);

        $transaction->book->where('id', $transaction->book->id)
                        ->update([
                            'jumlah' => ($transaction->book->jumlah + 1),
                            ]);

        Session::flash("flash_message", [
            "warna"     => "alert-success",
            "message"   => "Buku berhasil dikembalikan"
        ]);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        if(!$transaction->destroy($transaction->id)) return redirect()->back();
        Session::flash("flash_message", [
            "warna"     => "alert-danger",
            "message"   => "Data Transaksi Berhasil Di Hapus"
        ]);
        return redirect()->route('history');
    }
    public function printTransaction(Request $request)
    {
        $q = Transaction::with('book','member');

        if($request->get('status')) 
        {
             if($request->get('status') == 'pinjam') {
                $q->where('status', 'pinjam');
            } else {
                $q->where('status', 'kembali');
            }
        }
        $data = $q->get();
        if(is_null($data)){
            Session::flash("flash_message", [
                "warna"     => "alert-danger",
                "message"   => "Data Kosong Tidak Bisa Dicetak"
            ]);
            return redirect()->back();
        }else{
            $judul = "DATA TRANSAKSI-".date('Y-m-d').".pdf";
            $pdf = PDF::Loadview('modules.transaction.print', compact('data'));
            $pdf->setPaper('A4', 'landscape');
            return $pdf->stream($judul, array("Attachment" => false));
        }
    }
}
