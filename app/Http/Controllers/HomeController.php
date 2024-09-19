<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
