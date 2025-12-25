<!-- Navbar -->
<nav class="fixed left-0 right-0 top-0 bg-gradient-to-r from-gray-800 to-gray-900 shadow-lg z-50">
    <div class="w-full h-16 px-4 sm:px-6 lg:px-8 flex justify-between items-center">
        <!-- Left: Logo and Brand -->
        <div class="flex items-center space-x-3">
            <button id="sidebarToggle" class="text-white hover:bg-gray-700 p-2 rounded-lg transition-colors lg:hidden">
                <i class="fas fa-bars text-xl"></i>
            </button>
            <div class="flex items-center space-x-2">
                <div class="w-10 h-10 bg-gradient-to-br from-gray-400 to-gray-600 rounded-lg flex items-center justify-center">
                    <i class="fas fa-cash-register text-white text-lg"></i>
                </div>
                <span class="text-white font-bold text-xl sm:inline">NearCashier</span>
            </div>
        </div>

        <!-- Right: User Menu -->
        <div class="flex items-center space-x-4">
            <!-- Notifications -->
            <div class="relative">
                <button class="text-gray-300 hover:text-white transition-colors relative">
                    <i class="fas fa-bell text-lg"></i>
                    <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                </button>
            </div>

            <!-- User Profile Dropdown -->
            <div class="relative group">
                <button class="flex items-center space-x-2 text-gray-300 hover:text-white transition-colors">
                    <div class="w-8 h-8 bg-gradient-to-br from-gray-400 to-gray-600 rounded-full flex items-center justify-center">
                        <i class="fas fa-user text-white text-xs"></i>
                    </div>
                    <span class="text-sm hidden sm:inline">{{ Auth::user()->name ?? 'User' }}</span>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>

                <!-- Dropdown Menu -->
                <div
                    class="absolute right-0 mt-3 w-56 bg-white rounded-xl shadow-lg ring-1 ring-black/5
           opacity-0 invisible group-hover:opacity-100 group-hover:visible
           transform scale-95 group-hover:scale-100
           transition-all duration-200 ease-out z-50">
                    <!-- User Info -->
                    <div class="px-4 py-3 border-b border-gray-100">
                        <p class="text-sm font-semibold text-gray-900 truncate">
                            {{ Auth::user()->name ?? 'User' }}
                        </p>
                        <p class="text-xs text-gray-500 truncate">
                            {{ Auth::user()->email ?? 'user@example.com' }}
                        </p>
                    </div>

                    <!-- Menu -->
                    <div class="py-1">
                        <a href="#"
                            class="flex items-center px-4 py-2 text-sm text-gray-700
                  hover:bg-gray-100 transition rounded-md mx-2">
                            <i class="fas fa-user-circle mr-3 text-gray-400"></i>
                            Profil
                        </a>

                        <a href="#"
                            class="flex items-center px-4 py-2 text-sm text-gray-700
                  hover:bg-gray-100 transition rounded-md mx-2">
                            <i class="fas fa-cog mr-3 text-gray-400"></i>
                            Pengaturan
                        </a>
                    </div>

                    <div class="border-t border-gray-100 my-1"></div>

                    <!-- Logout -->
                    <form action="{{ route('logout') }}" method="POST" class="px-2 pb-2">
                        @csrf
                        <button type="submit"
                            class="flex items-center w-full px-4 py-2 text-sm
                       text-red-600 hover:bg-red-50 rounded-md transition">
                            <i class="fas fa-sign-out-alt mr-3"></i>
                            Logout
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</nav>