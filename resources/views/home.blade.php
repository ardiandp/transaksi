@extends('layouts.app')

@section('content')
<style>
    .container {
        margin-top: 100px;
    }
</style>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script>
                        @if(session('success'))
                            swal({
                                title: "{{ session('success') }}",
                                text: "Data berhasil dihapus",
                                icon: "success",
                                button: "Ok",
                            });
                        @endif
                    </script>

                    
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Selamat Datang, {{ $user->name }}!</h1>
        <p class="lead">Anda login sebagai <strong>{{ ucfirst($user->role) }}</strong>.</p>
        <hr class="my-4">
        <p>Ini adalah halaman home Anda. Selamat menggunakan aplikasi kami!</p>
    </div>
</div>
@endsection
