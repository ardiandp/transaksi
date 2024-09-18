<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
    <header style="position: fixed; top: 0; width: 100%; background-color: #000; z-index: 1;">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" style="font-weight: bold; color: #fff;" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" style="font-weight: bold; color: #fff;" href="{{ route('home') }}">Home</a>
                    </li>
                    @if (Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" style="font-weight: bold; color: #fff;" href="{{ route('logout') }}">Logout</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" style="font-weight: bold; color: #fff;" href="{{ route('login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="font-weight: bold; color: #fff;" href="{{ route('register') }}">Register</a>
                        </li>
                    @endif
                </ul>
            </div>
        </nav>
    </header>
    <div style="position: fixed; top: 70px; left: 0; width: 200px; height: calc(100vh - 70px); background-color: #000; z-index: 1;">
        <div class="container-fluid">
            <div class="row h-100">
                <div class="col-md-12 d-flex align-items-center">
                    <!-- Sidebar -->
                    <div class="sidebar w-100">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Transaksi</a>
                            </li>
                            <!-- Add more menu items here -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin-left: 200px; padding-top: 70px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <!-- Content -->
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <footer style="position: fixed; bottom: 0; width: calc(100% - 200px); text-align: center; background-color: #000; color: #fff; padding: 10px;">
        Copyright &copy; 2022 by <a href="https://github.com/ridwanfauzi" style="color: #fff;" target="_blank">Ridwan Fauzi</a>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

