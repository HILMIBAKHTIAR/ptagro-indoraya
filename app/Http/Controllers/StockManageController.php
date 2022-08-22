<?php

namespace App\Http\Controllers;

use App\Stock;
use Illuminate\Http\Request;

class StockManageController extends Controller
{
    //
    public function viewStock()
    {
        $data_stock = Stock::all();
        return view('stock.index', compact('data_stock'));
    }
    public function createStock()
    {
        return view('stock.create');
    }
    public function addStock(Request $request)
    {
        $this->validate($request, [
            'nama_bahan' => 'required',
            'qty' => 'required',
        ]);
        $data_stock = new Stock;
        $data_stock->nama_bahan = $request->get('nama_bahan');
        $data_stock->qty = $request->get('qty');
        $data_stock->save();
        return redirect('/stock')->with('message','Data, Berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data_stock = Stock::find($id);
        return view('stock.edit', compact('data_stock'));
    }
    public function updateStock(Request $request, $id)
    {

        $this->validate($request, [
            'qty' => 'required',
        ]);
        $stock = Stock::find($id);
        $stock->qty = $request->qty;
        $stock->save();
        return redirect('/stock')->with('Data, Berhasil diubah');
    }

    public function destroy($id)
    {
        $stock = Stock::findOrFail($id);
        $stock->delete();
        return redirect('/stock')->with('Data, Berhasil dihapus');
    }
}
