@extends('layouts.app')

@section('content')
<style>
    .container {
        margin-top: 100px;
    }
</style>
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Selamat Datang, {{ $user->name }}!</h1>
        <p class="lead">Anda login sebagai <strong>{{ ucfirst($user->role) }}</strong>.</p>
        <hr class="my-4">
        <p>Ini adalah halaman home Anda. Selamat menggunakan aplikasi kami!</p>
    </div>
</div>
@endsection
