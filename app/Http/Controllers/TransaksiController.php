<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    // app/Http/Controllers/TransaksiController.php

public function index()
{
    $transaksis = Transaksi::all();
    return view('transaksi.index', compact('transaksis'));
}

public function create()
{
    return view('transaksi.create');
}

public function store(Request $request)
{
    $transaksi = new Transaksi();
    $transaksi->tanggal = $request->input('tanggal');
    $transaksi->nama_gerai = $request->input('nama_gerai');
    $transaksi->no_invoice = $request->input('no_invoice');
    $transaksi->nama_customer = $request->input('nama_customer');
    $transaksi->jenis_perawatan = $request->input('jenis_perawatan');
    $transaksi->harga_treatment = $request->input('harga_treatment');
    $transaksi->disc = $request->input('disc');
    $transaksi->terapist = $request->input('terapist');
    $transaksi->pembayaran = $request->input('pembayaran');
    $transaksi->save();

    session()->flash('success', 'Data berhasil disimpan');
    return redirect()->route('transaksi');
}

public function edit($id)
{
    $transaksi = Transaksi::find($id);
    return view('transaksi.edit', compact('transaksi'));
}

public function update(Request $request, $id)
{
    $transaksi = Transaksi::find($id);
    $transaksi->tanggal = $request->input('tanggal');
    $transaksi->nama_gerai = $request->input('nama_gerai');
    $transaksi->no_invoice = $request->input('no_invoice');
    $transaksi->nama_customer = $request->input('nama_customer');
    $transaksi->jenis_perawatan = $request->input('jenis_perawatan');
    $transaksi->harga_treatment = $request->input('harga_treatment');
    $transaksi->disc = $request->input('disc');
    $transaksi->terapist = $request->input('terapist');
    $transaksi->pembayaran = $request->input('pembayaran');
    $transaksi->save();
    session()->flash('success', 'Data berhasil diupdate');
    return redirect()->route('transaksi');
}

public function destroy($id)
{
    $transaksi = Transaksi::find($id);
    $transaksi->delete();
    session()->flash('success', 'Data berhasil dihapus');
    return redirect()->route('transaksi');
}
}
