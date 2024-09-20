<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Gerai;
use App\Models\User;

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
    $gerai = Gerai::all();
    $last_invoice = Transaksi::orderBy('id', 'desc')->value('no_invoice');
    $last_invoice = substr($last_invoice, 4);
    $next_invoice = sprintf('INV-%05d', (int) $last_invoice + 1);
    $terapist = User::where('role', 'terapist')->get();
    return view('transaksi.create', compact('gerai', 'next_invoice', 'terapist'));
}

public function store(Request $request)
{
    /*dd($request->all());
    $transaksi = new Transaksi();
    $transaksi->tanggal = $request->input('tanggal');
    $transaksi->nama_gerai = $request->input('nama_gerai');
    $transaksi->no_invoice = $request->input('no_invoice');
    $transaksi->nama_customer = $request->input('nama_customer');
    $transaksi->terapist = $request->input('terapist');
    $transaksi->pembayaran = $request->input('pembayaran');
    $transaksi->save(); */

    foreach ($request->input('jenis_perawatan') as $key => $value) {
        $transaksi_detail = new Transaksi();
        $transaksi_detail->tanggal = $request->input('tanggal');
        $transaksi_detail->nama_gerai = $request->input('nama_gerai');
        $transaksi_detail->no_invoice =$request->input('no_invoice');
        $transaksi_detail->nama_customer = $request->input('nama_customer');
        $transaksi_detail->jenis_perawatan = $value;
        $transaksi_detail->harga_treatment = $request->input('harga_treatment')[$key];
        $transaksi_detail->disc = $request->input('disc')[$key];
        $transaksi_detail->terapist = $request->input('terapist');
        $transaksi_detail->pembayaran = $request->input('pembayaran');
        $transaksi_detail->jumlah = $request->input('jumlah')[$key];
        $transaksi_detail->komisi = $request->input('komisi')[$key];
        $transaksi_detail->save();
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
    //dd($request->all());
    $transaksi = Transaksi::where('no_invoice', $no_invoice)->get();

    foreach ($transaksi as $index => $t) {
        // Mendapatkan nilai dari input, jika array gunakan [0], jika field tunggal cukup ambil nilainya saja
        $t->tanggal = $request->input('tanggal'); // Bukan array, langsung ambil nilai
        $t->nama_gerai = $request->input('nama_gerai'); // Bukan array, langsung ambil nilai
        $t->nama_customer = $request->input('nama_customer'); // Bukan array, langsung ambil nilai
        
        // Input yang berupa array, akses menggunakan $index
        $t->jenis_perawatan = $request->input('jenis_perawatan')[$index] ?? null;
        $t->harga_treatment = $request->input('harga_treatment')[$index] ?? null;
        $t->disc = $request->input('disc')[$index] ?? null;
        $t->jumlah = $request->input('jumlah')[$index] ?? null;
        $t->komisi = $request->input('komisi')[$index] ?? null;
        
        // Simpan perubahan
        $t->save();
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
