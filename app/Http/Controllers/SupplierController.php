<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Kategori;
use App\Supplier;
use Illuminate\Http\Request;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_supplier = Supplier::all();
        return view('supplier.index', compact('data_supplier'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('supplier.create');
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
        // dd($request->all());
        $request->validate([

            'perusahaan' => 'required',
            'nama_supplier' => 'required',
            'no_telp' => 'required',
            'situs_web' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required',
            'catatan' => 'required'
        ]);

        $data_supplier = Supplier::create([
            'perusahaan' => $request->perusahaan,
            'nama_supplier' => $request->nama_supplier,
            'no_telp' => $request->no_telp,
            'situs_web' => $request->situs_web,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
            'catatan' => $request->catatan
        ]);

        $data_supplier->save();
        return redirect('/supplier')->with('message', 'Data Supplier Berhasil Ditambahkan');
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
        $data_supplier = Supplier::find($id);
        return view('supplier.edit', compact('data_supplier'));
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

            'perusahaan' => 'required',
            'nama_supplier' => 'required',
            'no_telp' => 'required',
            'situs_web' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'kode_pos' => 'required',
            'catatan' => 'required'
        ]);

        $data_supplier = Supplier::find($id);
        $data_supplier->perusahaan = $request->get('perusahaan');
        $data_supplier->nama_supplier = $request->get('nama_supplier');
        $data_supplier->no_telp = $request->get('no_telp');
        $data_supplier->situs_web = $request->get('situs_web');
        $data_supplier->email = $request->get('email');
        $data_supplier->alamat = $request->get('alamat');
        $data_supplier->kota = $request->get('kota');
        $data_supplier->kode_pos = $request->get('kode_pos');
        $data_supplier->catatan = $request->get('catatan');
        $data_supplier->save();
        return redirect('/supplier')->with('status', 'Data Supplier Berhasil Diubah');
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
        $data_supplier = Supplier::findOrFail($id);
        $data_supplier->delete();
        return redirect('/supplier')->with('status', 'Data Supplier Berhasil Dihapus');
    }
}
