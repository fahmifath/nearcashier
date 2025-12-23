<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - NearCashier</title>
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
        .btn-register {
            background: linear-gradient(135deg, #4b5563 0%, #2c3e50 100%);
            transition: all 0.3s ease;
        }
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(75, 85, 99, 0.4);
        }
        .register-icon {
            font-size: 3rem;
            background-color: white;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .password-strength {
            height: 3px;
            border-radius: 2px;
            transition: all 0.3s ease;
        }
        .password-weak { background-color: #ef4444; }
        .password-fair { background-color: #f59e0b; }
        .password-good { background-color: #eab308; }
        .password-strong { background-color: #10b981; }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex items-center justify-center px-4 sm:px-6 lg:px-8 gradient-bg py-6">
        <div class="w-full max-w-2xl">
            <!-- Header -->
            <div class="text-center mb-4">
                <div class="flex justify-center mb-3">
                    <i class="fas fa-user-plus register-icon text-2xl sm:text-3xl"></i>
                </div>
                <h1 class="text-3xl font-bold text-white mb-1">NearCashier</h1>
                <p class="text-gray-300 text-sm">Buat Akun Baru</p>
            </div>

            <!-- Register Card -->
            <div class="bg-white rounded-2xl card-shadow p-6">
                <h2 class="text-xl font-bold text-gray-800 mb-1">Daftar Sekarang</h2>
                <p class="text-gray-600 text-xs mb-4">Isi formulir untuk membuat akun</p>

                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-lg p-3 mb-4">
                        <div class="flex items-start">
                            <i class="fas fa-exclamation-circle text-red-500 mt-0 mr-2 flex-shrink-0 text-sm"></i>
                            <div>
                                @foreach ($errors->all() as $error)
                                    <p class="text-red-700 text-xs font-medium">{{ $error }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <form action="{{ route('register.process') }}" method="POST" class="space-y-3">
                    @csrf

                    <!-- Row 1: Name and Email -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <!-- Name Input -->
                        <div>
                            <label for="name" class="block text-xs font-medium text-gray-700 mb-1">
                                <i class="fas fa-user mr-1 text-gray-500 text-xs"></i>Nama
                            </label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                value="{{ old('name') }}"
                                class="w-full px-3 py-2 border-2 border-gray-200 rounded-lg input-focus outline-none transition-all text-sm"
                                placeholder="Nama Anda"
                                required
                                autofocus
                            >
                            @error('name')
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-info-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Input -->
                        <div>
                            <label for="email" class="block text-xs font-medium text-gray-700 mb-1">
                                <i class="fas fa-envelope mr-1 text-gray-500 text-xs"></i>Email
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="w-full px-3 py-2 border-2 border-gray-200 rounded-lg input-focus outline-none transition-all text-sm"
                                placeholder="Email Anda"
                                required
                            >
                            @error('email')
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-info-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Row 2: Password and Confirm Password -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                        <!-- Password Input -->
                        <div>
                            <label for="password" class="block text-xs font-medium text-gray-700 mb-1">
                                <i class="fas fa-lock mr-1 text-gray-500 text-xs"></i>Password
                            </label>
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="w-full px-3 py-2 border-2 border-gray-200 rounded-lg input-focus outline-none transition-all text-sm"
                                placeholder="Min 6 karakter"
                                required
                            >
                            <div class="mt-1 flex gap-1">
                                <div class="flex-1 password-strength password-weak" id="passwordStrength"></div>
                            </div>
                            <p class="text-gray-500 text-xs mt-1">Min 6 char</p>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-info-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password Input -->
                        <div>
                            <label for="password_confirmation" class="block text-xs font-medium text-gray-700 mb-1">
                                <i class="fas fa-check-circle mr-1 text-gray-500 text-xs"></i>Konfirmasi
                            </label>
                            <input
                                type="password"
                                id="password_confirmation"
                                name="password_confirmation"
                                class="w-full px-3 py-2 border-2 border-gray-200 rounded-lg input-focus outline-none transition-all text-sm"
                                placeholder="Ulangi password"
                                required
                            >
                            @error('password_confirmation')
                                <p class="text-red-500 text-xs mt-1"><i class="fas fa-info-circle mr-1"></i>{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Terms Agreement -->
                    <div class="flex items-start">
                        <input
                            type="checkbox"
                            id="agree"
                            name="agree"
                            class="w-4 h-4 text-gray-600 rounded cursor-pointer mt-1"
                            required
                        >
                        <label for="agree" class="ml-2 text-xs text-gray-600 cursor-pointer">
                            Saya setuju dengan <span class="font-semibold text-gray-700">Syarat dan Ketentuan</span> serta <span class="font-semibold text-gray-700">Kebijakan Privasi</span>
                        </label>
                    </div>

                    <!-- Register Button -->
                    <button
                        type="submit"
                        class="w-full btn-register text-white font-bold py-2 px-4 rounded-lg transition-all duration-300 text-sm"
                    >
                        <i class="fas fa-user-check mr-2"></i>Daftar
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

                <!-- Login Link -->
                <div class="bg-gray-50 rounded-lg p-3 text-center">
                    <p class="text-gray-600 text-xs">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="font-semibold text-gray-800 hover:text-gray-600 transition-colors">
                            Masuk di sini
                        </a>
                    </p>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center mt-3">
                <p class="text-gray-300 text-xs">
                    &copy; 2025 NearCashier
                </p>
            </div>
        </div>
    </div>

    <!-- Password Strength Checker -->
    <script>
        document.getElementById('password').addEventListener('input', function(e) {
            const password = e.target.value;
            const strengthBar = document.getElementById('passwordStrength');
            
            if (password.length === 0) {
                strengthBar.className = 'flex-1 password-strength password-weak';
                return;
            }

            let strength = 0;
            
            // Check length
            if (password.length >= 6) strength++;
            if (password.length >= 8) strength++;
            if (password.length >= 12) strength++;

            // Check for numbers
            if (/[0-9]/.test(password)) strength++;

            // Check for lowercase and uppercase
            if (/[a-z]/.test(password) && /[A-Z]/.test(password)) strength++;

            // Check for special characters
            if (/[!@#$%^&*(),.?":{}|<>]/.test(password)) strength++;

            strengthBar.classList.remove('password-weak', 'password-fair', 'password-good', 'password-strong');
            
            if (strength <= 2) {
                strengthBar.classList.add('password-weak');
            } else if (strength <= 3) {
                strengthBar.classList.add('password-fair');
            } else if (strength <= 4) {
                strengthBar.classList.add('password-good');
            } else {
                strengthBar.classList.add('password-strong');
            }
        });
    </script>
</body>
</html>
