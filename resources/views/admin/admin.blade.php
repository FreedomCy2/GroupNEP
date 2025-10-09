<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Login</title>
    
    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        .bg-clinic {
            background: linear-gradient(to right, #3BAFDA, #68D6EC);
        }
    </style>
</head>
<body class="bg-gray-100">

    {{-- Main Container --}}
    <div class="min-h-screen flex items-center justify-center px-4">

        {{-- Card --}}
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md p-8">

            {{-- Logo --}}
            <div class="text-center mb-6">
                <img src="{{ asset('images/clinic-logo.png') }}" alt="Clinic Logo" class="mx-auto w-20 h-20 mb-3">
                <h1 class="text-2xl font-semibold text-gray-700">Welcome to <span class="text-blue-500">Clinic Portal</span></h1>
                <p class="text-gray-500 text-sm">Sign in to continue</p>
            </div>

            {{-- Login Form --}}
            <form method="POST" action="{{ route('login') }}" novalidate>
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        value="{{ old('email') }}"
                        class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                        placeholder="Enter your email" 
                        required 
                        autofocus
                    >
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                        placeholder="Enter your password" 
                        required
                    >
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Remember Me --}}
                <div class="flex items-center mb-4">
                    <input type="checkbox" name="remember" id="remember" class="mr-2">
                    <label for="remember" class="text-sm text-gray-700">Remember me</label>
                </div>

                {{-- Submit Button --}}
                <button type="submit" 
                    class="w-full bg-clinic text-white py-2 rounded-lg shadow-md hover:opacity-90 transition">
                    Login
                </button>

                {{-- Forgot Password --}}
                @if (Route::has('password.request'))
                    <div class="text-center mt-4">
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline">
                            Forgot your password?
                        </a>
                    </div>
                @endif

            </form>

        </div>
    </div>
</body>
</html>
