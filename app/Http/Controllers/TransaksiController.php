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
}
