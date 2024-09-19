<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg p-8 max-w-sm w-full">
        <h2 class="text-2xl font-semibold text-center text-white bg-gradient-to-r from-purple-500 to-indigo-500 py-4 rounded-t-lg">Form Login</h2>
        <br>
        <form action="{{ route('login') }}" method="POST" class="space-y-6">
            @csrf
            <div>
                <input type="email" name="email" placeholder="Masukan alamat email" required
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400">
            </div>
            <div>
                <input type="password" name="password" placeholder="Masukan Password" required
                    class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-400">
            </div>
            <div class="flex items-center justify-between">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="remember" class="form-checkbox text-indigo-600 rounded">
                    <span class="text-gray-600">Ingatkan saya</span>
                </label>
               
            </div>
            <button type="submit"
                class="w-full bg-gradient-to-r from-purple-500 to-indigo-500 text-white py-2 rounded-lg hover:opacity-90 transition-opacity duration-300">Login</button>
        </form>
        
    </div>
</body>
</html>

