<!-- Sidebar -->
<div id="sidebar" class="fixed left-0 top-16 bottom-0 w-64 bg-gradient-to-b from-gray-800 to-gray-900 shadow-2xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300 z-40 overflow-y-auto">
    <div class="p-6 space-y-6">
        <!-- Menu Title -->
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Menu Utama</p>
        </div>

        <!-- Navigation Menu -->
        <nav class="space-y-2">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-all group {{ request()->routeIs('admin.dashboard.index') ? 'bg-gradient-to-r from-gray-500 to-gray-600 text-white' : '' }}">
                <i class="fas fa-chart-line text-lg group-hover:scale-110 transition-transform"></i>
                <span class="font-medium">Dashboard</span>
                <i class="fas fa-arrow-right text-xs ml-auto opacity-0 group-hover:opacity-100 transition-opacity"></i>
            </a>

            <!-- Penjualan -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-all group">
                <i class="fas fa-shopping-cart text-lg group-hover:scale-110 transition-transform"></i>
                <span class="font-medium">Penjualan</span>
                <i class="fas fa-arrow-right text-xs ml-auto opacity-0 group-hover:opacity-100 transition-opacity"></i>
            </a>

            <!-- Produk -->
            <a href="{{ route('admin.products.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-all group {{ request()->routeIs('admin.products.index') ? 'bg-gradient-to-r from-gray-500 to-gray-600 text-white' : '' }}">
                <i class="fas fa-box text-lg group-hover:scale-110 transition-transform"></i>
                <span class="font-medium">Produk</span>
                <i class="fas fa-arrow-right text-xs ml-auto opacity-0 group-hover:opacity-100 transition-opacity"></i>
            </a>

            <!-- Kategori -->
            <a href="{{ route('admin.categories.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-all group {{ request()->routeIs('admin.categories.index') ? 'bg-gradient-to-r from-gray-500 to-gray-600 text-white' : '' }}">
                <i class="fas fa-tag text-lg group-hover:scale-110 transition-transform"></i>
                <span class="font-medium">Kategori</span>
                <i class="fas fa-arrow-right text-xs ml-auto opacity-0 group-hover:opacity-100 transition-opacity"></i>
            </a>

            <!-- Pelanggan -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-all group">
                <i class="fas fa-users text-lg group-hover:scale-110 transition-transform"></i>
                <span class="font-medium">Pelanggan</span>
                <i class="fas fa-arrow-right text-xs ml-auto opacity-0 group-hover:opacity-100 transition-opacity"></i>
            </a>

            <!-- Diskon -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-all group">
                <i class="fas fa-percent text-lg group-hover:scale-110 transition-transform"></i>
                <span class="font-medium">Diskon</span>
                <i class="fas fa-arrow-right text-xs ml-auto opacity-0 group-hover:opacity-100 transition-opacity"></i>
            </a>

            <!-- Pengeluaran -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white transition-all group">
                <i class="fas fa-money-bill-wave text-lg group-hover:scale-110 transition-transform"></i>
                <span class="font-medium">Pengeluaran</span>
                <i class="fas fa-arrow-right text-xs ml-auto opacity-0 group-hover:opacity-100 transition-opacity"></i>
            </a>
        </nav>

        <!-- Divider -->
        <div class="border-t border-gray-700"></div>

        <!-- Secondary Menu -->
        <div>
            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Lainnya</p>
        </div>

        <nav class="space-y-2">
            <!-- Laporan -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-600 hover:text-white transition-all group">
                <i class="fas fa-file-pdf text-lg group-hover:scale-110 transition-transform"></i>
                <span class="font-medium">Laporan</span>
                <i class="fas fa-arrow-right text-xs ml-auto opacity-0 group-hover:opacity-100 transition-opacity"></i>
            </a>

            <!-- Pengaturan -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-600 hover:text-white transition-all group">
                <i class="fas fa-sliders-h text-lg group-hover:scale-110 transition-transform"></i>
                <span class="font-medium">Pengaturan</span>
                <i class="fas fa-arrow-right text-xs ml-auto opacity-0 group-hover:opacity-100 transition-opacity"></i>
            </a>
        </nav>
    </div>

    <!-- Footer Info
    <div class="absolute bottom-0 left-0 right-0 p-4 border-t border-gray-600 bg-gray-800" style="background-color: #2d3a48;">
        <div class="flex items-center space-x-2 text-xs text-gray-400">
            <i class="fas fa-info-circle"></i>
            <span>Version 1.0.0</span>
        </div>
    </div> -->
</div>

<!-- Sidebar Overlay (Mobile) -->
<div id="sidebarOverlay" class="fixed inset-0 bg-black opacity-0 invisible lg:hidden transition-all duration-300 z-30"></div>

<script>
    const sidebar = document.getElementById('sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebarOverlay = document.getElementById('sidebarOverlay');

    sidebarToggle?.addEventListener('click', () => {
        sidebar.classList.toggle('-translate-x-full');
        sidebarOverlay.classList.toggle('opacity-0');
        sidebarOverlay.classList.toggle('invisible');
    });

    sidebarOverlay?.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
        sidebarOverlay.classList.add('opacity-0');
        sidebarOverlay.classList.add('invisible');
    });

    // Close sidebar when clicking a link on mobile
    sidebar.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 1024) {
                sidebar.classList.add('-translate-x-full');
                sidebarOverlay.classList.add('opacity-0');
                sidebarOverlay.classList.add('invisible');
            }
        });
    });
</script>