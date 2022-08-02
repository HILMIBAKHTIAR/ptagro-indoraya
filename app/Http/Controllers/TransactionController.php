<?php

namespace App\Http\Controllers;

use App\Acces;
use Barryvdh\DomPDF\Facade\PDF;
use Session;
use App\Access;
use App\Activity;
use Illuminate\Http\Request;
use App\Produk;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // public function index()
    // {
    //     //
    //     $data_produk = Produk::all();
    //     return view('transaction.index', compact('data_produk'));
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //fungsi menampilkan halaman transaksi
    public function viewTransaction()
    {
        //
        $id_account = Auth::id();
        $data_produk = Produk::all();
        $check_access = Acces::where('user', $id_account)->first();
        // $check_access = Access::where('id_user', $id_account)->first();
        if ($check_access->transaksi == 1) {
            $data_produk = Produk::all();
            return view('transaction.index', compact('data_produk'));
        } else {
            return back();
        }
    }

     // Take Transaction Product 
     public function transactionProduct($id)
     {
         $id_account = Auth::id();
         $check_access = Acces::where('user', $id_account)
             ->first();
         if ($check_access->transaksi == 1) {
             $product = Product::where('kode_barang', '=', $id)
                 ->first();
             $supply_system = Supply_system::first();
             $status = $supply_system->status;
 
             return response()->json([
                 'product' => $product,
                 'status' => $status
             ]);
         } else {
             return back();
         }
     }
 
     // Check Transaction Product
     public function transactionProductCheck($id)
     {
         $id_account = Auth::id();
         $check_access = Acces::where('user', $id_account)
             ->first();
         if ($check_access->transaksi == 1) {
             $product_check = Product::where('kode_barang', '=', $id)
                 ->count();
 
             if ($product_check != 0) {
                 $product = Product::where('kode_barang', '=', $id)
                     ->first();
                 $supply_system = Supply_system::first();
                 $status = $supply_system->status;
                 $check = "tersedia";
             } else {
                 $product = '';
                 $status = '';
                 $check = "tidak tersedia";
             }
 
             return response()->json([
                 'product' => $product,
                 'status' => $status,
                 'check' => $check
             ]);
         } else {
             return back();
         }
     }

    // fungsi proses transaksi
    public function transactionProcess(Request $req)
    {
        //
        $id_account = Auth::id();
        $check_access = Auth::where('user', $id_account)->first();
        if ($check_access->transaksi == 1) {
            $jml_produk = count($req->kode_produk);
            for ($i = 0; $i < $jml_produk; $i++) {
                $transaction = new Transaction;
                $transaction->kode_transaksi = $req->kode_transaksi;
                $transaction->kode_produk = $req->kode_produk[$i];
                $produk_data = Produk::where('kode_produk', $req->kode_produk[$i])->first();
                $transaction->produk = $produk_data->produk;
                $transaction->jumlah = $req->jumlah[$i];
                $transaction->total_harga = $req->total_harga[$i];
                $transaction->harga = $produk_data->harga;
                $transaction->total_produk = $req->total_produk['i'];
                $transaction->subtotal = $req->subtotal;
                $transaction->diskon = $req->diskon;
                $transaction->total = $req->total;
                $transaction->bayar = $req->bayar;
                $transaction->kembali = $req->kembali;
                $transaction->id_kasir = $id_account;
                $transaction->kasir = $check_access->name;
                $transaction->save();
            }
            $activity = new Activity;
            $activity->id_user = $id_account;
            $activity->user = $check_access->name;
            $activity->nama_kegiatan = 'Transaksi';
            $activity->jumlah = $jml_produk;
            $activity->save();

            Session::flash('success', 'Transaksi berhasil dilakukan', $req->kode_transaksi);

            return back();
        } else {
            Session::flash('error', 'Anda tidak memiliki akses untuk melakukan transaksi');
            return back();
        }
    }

    //fungsi cetak struk transaksi
    public function receiptTransaction($id)
    {
        //
        $id_account = Auth::id();
        $check_access = Access::where('id_user', $id_account)->first();
        if ($check_access->transaksi == 1) {
            $transaction = Transaction::where('transaction.kode_transaksi', '=', $id)
                ->select('transactions.*')
                ->first();
            $transactions = Transaction::where('transactions.kode_transaksi', '=', $id)
                ->select('transactions.*')
                ->get();

            $diskon = $transaction->subtotal * $transaction->diskon / 100;
            $customPaper = array(0, 0, 400.00, 283.80);
            $pdf = PDF::loadview('transaction.receipt_transaction', compact('transaction', 'transactions', 'diskon', 'market'))->setPaper($customPaper, 'landscape');
            return $pdf->stream();
        } else {
            return back();
        }
    }
}
