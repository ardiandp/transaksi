<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
   // Pastikan user sudah login
   public function __construct()
   {
       $this->middleware('auth');
   }

   // Tampilkan halaman home dengan ucapan selamat datang
   public function index()
   {
       $user = Auth::user();
       return view('home', compact('user'));
   }

   public function chartTransaksi()
    {
        // Mengambil data transaksi, mengelompokkan per bulan dan per hari
        $transaksiData = Transaksi::select(\DB::raw('DATE(tanggal) as tanggal'), \DB::raw('COUNT(*) as jumlah'))
            ->groupBy(\DB::raw('DATE(tanggal)'))
            ->orderBy('tanggal', 'ASC')
            ->get();

        // Mengelompokkan berdasarkan bulan
        $transaksiPerBulan = $transaksiData->groupBy(function ($item) {
            return \Carbon\Carbon::parse($item->tanggal)->format('Y-m'); // Kelompokkan berdasarkan Tahun-Bulan (YYYY-MM)
        });

        // Membuat data untuk chart
        $chartData = [];
        foreach ($transaksiPerBulan as $bulan => $transaksi) {
            $hariDalamBulan = $transaksi->pluck('tanggal')->map(function ($tanggal) {
                return \Carbon\Carbon::parse($tanggal)->format('d'); // Mengambil hari dari setiap tanggal
            });

            $jumlahPerHari = $transaksi->pluck('jumlah');

            // Tambahkan data ke array
            $chartData[$bulan] = [
                'hari' => $hariDalamBulan,
                'jumlah' => $jumlahPerHari
            ];
        }

        // Kirim data ke view
        return view('transaksi.chart', compact('chartData'));
    }
}
