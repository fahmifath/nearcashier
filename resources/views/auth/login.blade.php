<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NearCashier</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #4b5563 0%, #2c3e50 100%);
        }
        .card-shadow {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07), 0 10px 15px rgba(0, 0, 0, 0.1), 0 25px 35px rgba(0, 0, 0, 0.05);
        }
        .input-focus:focus {
            border-color: #4b5563;
            box-shadow: 0 0 0 3px rgba(75, 85, 99, 0.1);
        }
        .btn-login {
            background: linear-gradient(135deg, #4b5563 0%, #2c3e50 100%);
            transition: all 0.3s ease;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(75, 85, 99, 0.4);
        }
        .login-icon {
            font-size: 3rem;
            background-color: white;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 gradient-bg py-6">
        <div class="w-full max-w-md">
            <!-- Header -->
            <div class="text-center mb-4">
                <div class="flex justify-center mb-3">
                    <i class="fas fa-cash-register login-icon text-2xl sm:text-3xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-white mb-1">NearCashier</h1>
                <p class="text-gray-200 text-xs">Sistem Manajemen Penjualan Terpadu</p>
            </div>

            <!-- Login Card -->
            <div class="bg-white rounded-2xl card-shadow p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-1">Selamat Datang</h2>
                <p class="text-gray-600 text-xs mb-4">Silakan login untuk melanjutkan</p>

                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-lg p-3 mb-3">
                        <p class="text-red-700 text-xs font-medium">
                            <i class="fas fa-exclamation-circle mr-2"></i>{{ $errors->first() }}
                        </p>
                    </div>
                @endif

                @if (session('success'))
                    <div class="bg-green-50 border border-green-200 rounded-lg p-3 mb-3">
                        <p class="text-green-700 text-xs font-medium">
                            <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
                        </p>
                    </div>
                @endif

                <form action="{{ route('login.process') }}" method="POST" class="space-y-3">
                    @csrf

                    <!-- Email Input -->
                    <div>
                        <label for="email" class="block text-xs font-medium text-gray-700 mb-1">
                            <i class="fas fa-envelope mr-2 text-gray-500"></i>Email
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full px-3 py-2 border-2 border-gray-200 rounded-lg input-focus outline-none transition-all text-sm"
                            placeholder="Email Anda"
                            required
                            autofocus
                        >
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password Input -->
                    <div>
                        <label for="password" class="block text-xs font-medium text-gray-700 mb-1">
                            <i class="fas fa-lock mr-2 text-gray-500"></i>Password
                        </label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="w-full px-3 py-2 border-2 border-gray-200 rounded-lg input-focus outline-none transition-all text-sm"
                            placeholder="Password Anda"
                            required
                        >
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me -->
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            id="remember"
                            name="remember"
                            class="w-3 h-3 text-blue-600 rounded cursor-pointer"
                        >
                        <label for="remember" class="ml-2 text-xs text-gray-600 cursor-pointer">
                            Ingat saya
                        </label>
                    </div>

                    <!-- Login Button -->
                    <button
                        type="submit"
                        class="w-full btn-login text-white font-bold py-2 px-4 rounded-lg transition-all duration-300 text-sm"
                    >
                        <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                    </button>
                </form>

                <!-- Divider -->
                <div class="relative my-3">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-xs">
                        <span class="px-2 bg-white text-gray-500">atau</span>
                    </div>
                </div>

                <!-- Register Button -->
                <a
                    href="{{ route('register') }}"
                    class="w-full block text-center bg-gray-100 hover:bg-gray-200 text-gray-800 font-bold py-2 px-4 rounded-lg transition-all duration-300 text-sm"
                >
                    <i class="fas fa-user-plus mr-2"></i>Buat Akun Baru
                </a>
            </div>

            <!-- Footer -->
            <div class="text-center mt-3">
                <p class="text-gray-300 text-xs">
                    &copy; 2025 NearCashier
                </p>
            </div>
        </div>
    </div>
</body>
</html>
