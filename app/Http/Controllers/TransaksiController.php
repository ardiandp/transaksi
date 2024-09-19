<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

public function index()
{ 
       $transaksis = Transaksi::selectRaw('
            
            
            no_invoice,
            MIN(tanggal) as tanggal, -- Mengambil tanggal terawal dalam setiap grup
            MAX(nama_gerai) as nama_gerai, -- Mengambil nama gerai
            MAX(nama_customer) as nama_customer, -- Mengambil nama customer
            MAX(jenis_perawatan) as jenis_perawatan, -- Mengambil jenis perawatan
            MAX(harga_treatment) as harga_treatment, -- Mengambil harga treatment
            MAX(disc) as disc, -- Mengambil diskon
            MAX(terapist) as terapist, -- Mengambil nama terapist
            MAX(pembayaran) as pembayaran, -- Mengambil metode pembayaran
            SUM(jumlah) as total_jumlah, -- Menjumlahkan total jumlah
            MAX(komisi) as komisi, -- Mengambil komisi tertinggi
            COUNT(*) as jml -- Menghitung jumlah record dalam setiap grup
        ')
        ->groupBy('no_invoice')
        ->get();

   return view('transaksi.index', compact('transaksis'));
   
    
    
}

public function create()
{
    return view('transaksi.create');
}

public function store(Request $request)
{
    $detail_transaksi = $request->input('nama_customer');
    foreach ($detail_transaksi as $key => $value) {
        $transaksi = new Transaksi();
        $transaksi->tanggal = $request->input('tanggal');
        $transaksi->nama_gerai = $request->input('nama_gerai');
        $transaksi->no_invoice = $request->input('no_invoice');
        $transaksi->nama_customer = $value;
        $transaksi->jenis_perawatan = $request->input('jenis_perawatan')[$key];
        $transaksi->harga_treatment = $request->input('harga_treatment')[$key];
        $transaksi->disc = $request->input('disc')[$key];
        $transaksi->terapist = $request->input('terapist')[$key];
        $transaksi->pembayaran = $request->input('pembayaran')[$key];
        $transaksi->save();
    }

    session()->flash('success', 'Data berhasil disimpan');
    return redirect()->route('transaksi');
}

public function edit($no_invoice)
{
    $transaksi = Transaksi::where('no_invoice', $no_invoice)->firstOrFail();
    $transaksi_detail = Transaksi::where('no_invoice', $no_invoice)->get();
    return view('transaksi.edit', compact('transaksi', 'transaksi_detail'));
}

public function update(Request $request,  $no_invoice)
{
    $detail_transaksi = $request->input('nama_customer');
    foreach ($detail_transaksi as $key => $value) {
        $transaksi = Transaksi::find($request->input('id')[$key]);
        $transaksi->tanggal = $request->input('tanggal')[$key];
        $transaksi->nama_gerai = $request->input('nama_gerai')[$key];
        $transaksi->no_invoice = $request->input('no_invoice')[$key];
        $transaksi->nama_customer = $value;
        $transaksi->jenis_perawatan = $request->input('jenis_perawatan')[$key];
        $transaksi->harga_treatment = $request->input('harga_treatment')[$key];
        $transaksi->disc = $request->input('disc')[$key];
        $transaksi->terapist = $request->input('terapist')[$key];
        $transaksi->pembayaran = $request->input('pembayaran')[$key];
        $transaksi->save();
    }
    session()->flash('success', 'Data berhasil diupdate');
    return redirect()->route('transaksi');
}

public function destroy($no_invoice)
{
    $transaksi = Transaksi::where('no_invoice', $no_invoice)->get();
    foreach ($transaksi as $t) {
        $t->delete();
    }
    session()->flash('success', 'Data berhasil dihapus');
    return redirect()->route('transaksi');
}
}
