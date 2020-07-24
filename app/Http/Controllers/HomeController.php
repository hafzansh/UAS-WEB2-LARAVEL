<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Member;
use App\Book;
use DataTables;
use Yajra\DataTables\Facades\DataTables as FacadesDataTables;
use Yajra\DataTables\Html\Builder;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request,Builder $builder)
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
        return view('dashboard', compact('html','transaction','member','book'));

       /* $transaction = Transaction::get();
        $member   = Member::get();
        $book      = Book::get();
        return view('dashboard',compact('transaction','member','book')); */
    }
}
