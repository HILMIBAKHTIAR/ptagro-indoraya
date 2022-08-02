<?php

namespace App\Http\Controllers;

use App\Produk;
use App\Kategori;
use Dotenv\Validator;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produk = Produk::all();
        $kategori = Kategori::all();
        return view('produk.index', compact('produk', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('produk.create');
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
        $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'keterangan' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasSession()) {
            // $input = $request->all()
            $input = $request->all();
            $input['photo'] = time() . '.' . $request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('photo'), $input['photo']);

            Produk::create($input);
            return redirect('/produk')->with('success', 'Data berhasil ditambahkan');
        }

        return response()->json(['error' => $request->errors()->all()]);
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
        return view('produk.edit');
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
        $request->validate([
            'nama_produk' => 'required',
            'kategori_id' => 'required',
            'harga_jual' => 'required',
            'harga_pokok' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
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
        $data_produk = Produk::findOrFail($id);
        $data_produk->delete();
        return redirect('/produk')->with('status', 'Data Produk Berhasil diHapus');
    }
}
