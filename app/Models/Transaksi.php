<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table="transaksi";

    protected $fillable = [
        'tanggal',
        'nama_gerai',
        'no_invoice',
        'nama_customer',
        'jenis_perawatan',
        'harga_treatment',
        'disc',
        'terapist',
        'pembayaran',
        'jumlah',
        'komisi',
    ];
}
