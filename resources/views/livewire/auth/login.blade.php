<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Clinic Login</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />
    
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

    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-md p-8">
            
            <!-- Header -->
            <div class="text-center mb-6">
                <img src="/images/clinic-logo.png" alt="Clinic Logo" class="mx-auto w-20 h-20 mb-3" />
                <h1 class="text-2xl font-semibold text-gray-700">
                    Log in to your account
                </h1>
                <p class="text-gray-500 text-sm">
                    Enter your email and password below to log in
                </p>
            </div>

            <!-- Login Form -->
            <form method="POST" action="/login" novalidate class="flex flex-col gap-6">
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        autofocus
                        autocomplete="email"
                        placeholder="email@example.com"
                        class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                    />
                    <!-- Validation error placeholder -->
                    <p class="text-red-500 text-xs mt-1 hidden" id="email-error">Please enter a valid email.</p>
                </div>

                <!-- Password -->
                <div class="relative">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        autocomplete="current-password"
                        placeholder="Password"
                        class="mt-1 w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400"
                    />
                    <!-- Password visibility toggle -->
                    <button
                        type="button"
                        onclick="togglePasswordVisibility()"
                        class="absolute top-8 right-3 text-sm text-gray-500 hover:text-gray-700 focus:outline-none"
                        aria-label="Toggle password visibility"
                    >
                        Show
                    </button>
                    <!-- Validation error placeholder -->
                    <p class="text-red-500 text-xs mt-1 hidden" id="password-error">Please enter your password.</p>
                </div>

                <!-- Remember Me -->
                <div class="flex items-center">
                    <input
                        type="checkbox"
                        id="remember"
                        name="remember"
                        class="mr-2"
                    />
                    <label for="remember" class="text-sm text-gray-700">Remember me</label>
                </div>

                <!-- Submit Button -->
                <button
                    type="submit"
                    class="w-full bg-clinic text-white py-2 rounded-lg shadow-md hover:opacity-90 transition"
                >
                    Log in
                </button>

                <!-- Forgot Password Link -->
                <div class="text-center mt-4">
                    <a href="/password/reset" class="text-sm text-blue-500 hover:underline">
                        Forgot your password?
                    </a>
                </div>

                <!-- Register Link -->
                <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-zinc-600 mt-4">
                    <span>Don't have an account?</span>
                    <a href="/register" class="text-blue-500 hover:underline">Sign up</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const btn = event.currentTarget;
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                btn.textContent = 'Hide';
            } else {
                passwordInput.type = 'password';
                btn.textContent = 'Show';
            }
        }
    </script>

</body>
</html>
