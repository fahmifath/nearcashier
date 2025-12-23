@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Welcome Section -->
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-2">Selamat Datang di NearCashier</h1>
        <p class="text-gray-600">Kelola bisnis kasir Anda dengan mudah dan efisien</p>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Total Penjualan -->
        <div class="bg-white rounded-xl card-shadow p-6 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Penjualan</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-2">Rp 45.2M</h3>
                    <p class="text-green-500 text-xs mt-2"><i class="fas fa-arrow-up mr-1"></i>+12% dari bulan lalu</p>
                </div>
                <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-shopping-cart text-blue-500 text-lg"></i>
                </div>
            </div>
        </div>

        <!-- Total Pelanggan -->
        <div class="bg-white rounded-xl card-shadow p-6 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Pelanggan</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-2">324</h3>
                    <p class="text-green-500 text-xs mt-2"><i class="fas fa-arrow-up mr-1"></i>+8 pelanggan baru</p>
                </div>
                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-users text-green-500 text-lg"></i>
                </div>
            </div>
        </div>

        <!-- Total Produk -->
        <div class="bg-white rounded-xl card-shadow p-6 border-l-4 border-purple-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Produk</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-2">156</h3>
                    <p class="text-orange-500 text-xs mt-2"><i class="fas fa-exclamation-circle mr-1"></i>12 stok menipis</p>
                </div>
                <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-box text-purple-500 text-lg"></i>
                </div>
            </div>
        </div>

        <!-- Total Pengeluaran -->
        <div class="bg-white rounded-xl card-shadow p-6 border-l-4 border-red-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600 text-sm font-medium">Total Pengeluaran</p>
                    <h3 class="text-2xl font-bold text-gray-800 mt-2">Rp 12.5M</h3>
                    <p class="text-red-500 text-xs mt-2"><i class="fas fa-arrow-up mr-1"></i>+5% dari bulan lalu</p>
                </div>
                <div class="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center">
                    <i class="fas fa-money-bill-wave text-red-500 text-lg"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Chart Penjualan -->
        <div class="lg:col-span-2 bg-white rounded-xl card-shadow p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Grafik Penjualan 7 Hari Terakhir</h2>
            <div class="h-64 flex items-end justify-around gap-2">
                <div class="flex-1 flex flex-col items-center group">
                    <div class="w-full bg-gradient-to-t from-blue-500 to-blue-400 rounded-t-lg h-32 hover:from-blue-600 hover:to-blue-500 transition-all cursor-pointer"></div>
                    <p class="text-xs text-gray-600 mt-2">Sen</p>
                </div>
                <div class="flex-1 flex flex-col items-center group">
                    <div class="w-full bg-gradient-to-t from-blue-500 to-blue-400 rounded-t-lg h-40 hover:from-blue-600 hover:to-blue-500 transition-all cursor-pointer"></div>
                    <p class="text-xs text-gray-600 mt-2">Sel</p>
                </div>
                <div class="flex-1 flex flex-col items-center group">
                    <div class="w-full bg-gradient-to-t from-blue-500 to-blue-400 rounded-t-lg h-36 hover:from-blue-600 hover:to-blue-500 transition-all cursor-pointer"></div>
                    <p class="text-xs text-gray-600 mt-2">Rab</p>
                </div>
                <div class="flex-1 flex flex-col items-center group">
                    <div class="w-full bg-gradient-to-t from-blue-500 to-blue-400 rounded-t-lg h-48 hover:from-blue-600 hover:to-blue-500 transition-all cursor-pointer"></div>
                    <p class="text-xs text-gray-600 mt-2">Kam</p>
                </div>
                <div class="flex-1 flex flex-col items-center group">
                    <div class="w-full bg-gradient-to-t from-blue-500 to-blue-400 rounded-t-lg h-44 hover:from-blue-600 hover:to-blue-500 transition-all cursor-pointer"></div>
                    <p class="text-xs text-gray-600 mt-2">Jum</p>
                </div>
                <div class="flex-1 flex flex-col items-center group">
                    <div class="w-full bg-gradient-to-t from-blue-500 to-blue-400 rounded-t-lg h-52 hover:from-blue-600 hover:to-blue-500 transition-all cursor-pointer"></div>
                    <p class="text-xs text-gray-600 mt-2">Sab</p>
                </div>
                <div class="flex-1 flex flex-col items-center group">
                    <div class="w-full bg-gradient-to-t from-blue-500 to-blue-400 rounded-t-lg h-40 hover:from-blue-600 hover:to-blue-500 transition-all cursor-pointer"></div>
                    <p class="text-xs text-gray-600 mt-2">Min</p>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white rounded-xl card-shadow p-6">
            <h2 class="text-lg font-bold text-gray-800 mb-4">Aksi Cepat</h2>
            <div class="space-y-2">
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg bg-blue-50 hover:bg-blue-100 transition-colors text-blue-600 font-medium">
                    <i class="fas fa-plus text-lg"></i>
                    <span class="text-sm">Penjualan Baru</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg bg-green-50 hover:bg-green-100 transition-colors text-green-600 font-medium">
                    <i class="fas fa-plus text-lg"></i>
                    <span class="text-sm">Produk Baru</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg bg-purple-50 hover:bg-purple-100 transition-colors text-purple-600 font-medium">
                    <i class="fas fa-plus text-lg"></i>
                    <span class="text-sm">Pelanggan Baru</span>
                </a>
                <a href="#" class="flex items-center space-x-3 p-3 rounded-lg bg-orange-50 hover:bg-orange-100 transition-colors text-orange-600 font-medium">
                    <i class="fas fa-file-pdf text-lg"></i>
                    <span class="text-sm">Lihat Laporan</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
