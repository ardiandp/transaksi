<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
//use DataTables;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;  

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Produk::latest()->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    // Tambahkan tombol edit dan delete
                    $editUrl = route('produk.edit', ['produk' => $row->id]);
                    $deleteUrl = route('produk.destroy', ['produk' => $row->id]);
                    $csrfToken = csrf_token();

                    $actionBtns = '<a href="'.$editUrl.'" class="btn btn-primary btn-sm">Edit</a> ';
                    $actionBtns .= '<form action="'.$deleteUrl.'" method="POST" style="display:inline">
                                        <input type="hidden" name="_token" value="'.$csrfToken.'">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>';

                    return $actionBtns; 
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('produk.index');
    }

    public function create()
    {
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'harga' => 'required',
        ]);

        Produk::create($request->all());

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil ditambahkan');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil dihapus');
    }

    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'harga' => 'required',
        ]);

        $produk->update($request->all());

        return redirect()->route('produk.index')
            ->with('success', 'Produk berhasil diperbarui');
    }
}
