@extends('layouts.main')

@section('title', 'Manajemen Produk')

@section('styles')
    .table-hover tbody tr:hover {
        background-color: #f3f4f6;
    }
    .btn-action {
        transition: all 0.2s ease;
    }
    .btn-action:hover {
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    /* Modal Animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px) scale(0.95);
        }
        to {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }

    @keyframes slideDown {
        from {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
        to {
            opacity: 0;
            transform: translateY(30px) scale(0.95);
        }
    }

    .modal-backdrop {
        animation: fadeIn 0.3s ease-out forwards;
    }

    .modal-backdrop.closing {
        animation: fadeIn 0.3s ease-out reverse forwards;
    }

    .modal-content {
        animation: slideUp 0.4s cubic-bezier(0.34, 1.56, 0.64, 1) forwards;
    }

    .modal-content.closing {
        animation: slideDown 0.3s ease-out forwards;
    }

    .hidden {
        display: none !important;
    }
@endsection

@section('content')
<div class="max-w-7xl mx-auto">
    <!-- Page Header -->
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h1 class="text-4xl font-bold text-gray-800">Manajemen Produk</h1>
                <p class="text-gray-600 mt-2">Kelola inventaris produk Anda dengan mudah</p>
            </div>
            <button onclick="openCreateModal()" class="bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-3 px-6 rounded-lg transition-all flex items-center space-x-2 shadow-lg hover:shadow-xl">
                <i class="fas fa-plus text-lg"></i>
                <span>Tambah Produk</span>
            </button>
        </div>
    </div>

    <!-- Alert Messages -->
    @if (session('success'))
        <div class="bg-gradient-to-r from-green-50 to-green-100 border-l-4 border-green-500 rounded-lg p-4 mb-6 shadow-sm" id="successAlert">
            <div class="flex items-start">
                <i class="fas fa-check-circle text-green-500 text-xl mt-0.5 mr-3 flex-shrink-0"></i>
                <div>
                    <p class="text-green-800 font-semibold text-sm">Berhasil!</p>
                    <p class="text-green-700 text-sm mt-1">{{ session('success') }}</p>
                </div>
            </div>
        </div>
        <script>
            setTimeout(() => {
                document.getElementById('successAlert')?.remove();
            }, 4000);
        </script>
    @endif

    <!-- Table Card -->
    <div class="bg-white rounded-xl card-shadow overflow-hidden">
        <!-- Table Header Stats -->
        <div class="bg-gradient-to-r from-blue-50 to-blue-100 px-6 py-4 border-b border-blue-200">
            <div class="flex items-center space-x-2">
                <i class="fas fa-boxes text-blue-600 text-lg"></i>
                <span class="text-blue-900 font-semibold">Total Produk: {{ $products->count() }}</span>
            </div>
        </div>

        <!-- Responsive Table -->
        <div class="overflow-x-auto">
            @if($products->count() > 0)
                <table class="w-full table-hover">
                    <thead class="bg-gray-100 border-b-2 border-gray-300">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">No</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Nama Produk</th>
                            <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Kategori</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">Harga Beli</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">Harga Jual</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">Stok</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">Satuan</th>
                            <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($products as $index => $product)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800">
                                    <span class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-xs">{{ $loop->iteration }}</span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-400 to-indigo-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                            <i class="fas fa-cube text-white text-sm"></i>
                                        </div>
                                        <div>
                                            <p class="text-sm font-semibold text-gray-800">{{ $product->name }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-block bg-purple-100 text-purple-800 px-3 py-1 rounded-full text-xs">{{ $product->category->name }}</span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800 text-center">
                                    Rp {{ number_format($product->purchase_price, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800 text-center">
                                    Rp {{ number_format($product->selling_price, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800 text-center">
                                    <span class="inline-block @if($product->stock <= 10) bg-red-100 text-red-800 @else bg-green-100 text-green-800 @endif px-3 py-1 rounded-full text-xs">
                                        {{ $product->stock }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-800 text-center">
                                    {{ $product->unit }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex justify-center items-center gap-2">
                                        <button type="button" onclick="openEditModal({{ $product->id }})" class="btn-action bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white px-4 py-2 rounded-lg inline-flex items-center space-x-2 shadow-md hover:shadow-lg transition-all">
                                            <i class="fas fa-pen-to-square text-sm"></i>
                                            <span class="hidden sm:inline text-xs">Edit</span>
                                        </button>
                                        <button type="button" onclick="openDeleteModal({{ $product->id }}, '{{ addslashes($product->name) }}')" class="btn-action bg-gradient-to-r from-red-500 to-red-600 hover:from-red-600 hover:to-red-700 text-white px-4 py-2 rounded-lg inline-flex items-center space-x-2 shadow-md hover:shadow-lg transition-all">
                                            <i class="fas fa-trash-alt text-sm"></i>
                                            <span class="hidden sm:inline text-xs">Hapus</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="px-6 py-16 text-center">
                    <div class="inline-flex items-center justify-center w-20 h-20 bg-gray-100 rounded-full mb-4">
                        <i class="fas fa-inbox text-4xl text-gray-400"></i>
                    </div>
                    <p class="text-gray-600 font-semibold text-lg mb-2">Tidak Ada Produk</p>
                    <p class="text-gray-500 text-sm mb-6">Mulai dengan membuat produk baru untuk inventaris Anda</p>
                    <button onclick="openCreateModal()" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition-colors inline-flex items-center space-x-2">
                        <i class="fas fa-plus"></i>
                        <span>Buat Produk Pertama</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Create/Edit Modal -->
<div id="productModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40 flex items-center justify-center p-4 overflow-y-auto modal-backdrop">
    <div class="bg-white rounded-xl card-shadow max-w-md w-full my-8 modal-content">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-gradient-to-r from-blue-50 to-blue-100">
            <h2 class="text-lg font-bold text-gray-800" id="modalTitle">
                <i class="fas fa-plus-circle mr-2 text-blue-600"></i>Tambah Produk
            </h2>
            <button onclick="closeModal()" class="text-gray-500 hover:text-gray-700 hover:bg-gray-200 rounded-full p-1 transition-colors">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <form id="productForm" method="POST" action="{{ route('admin.products.store') }}" class="p-6 space-y-4">
            @csrf
            <input type="hidden" name="_method" id="formMethod" value="POST">

            <!-- Category Select -->
            <div>
                <label for="productCategory" class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-tag mr-2 text-blue-500"></i>Kategori
                </label>
                <select
                    id="productCategory"
                    name="category_id"
                    class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all text-sm"
                    required
                >
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Name Input -->
            <div>
                <label for="productName" class="block text-sm font-bold text-gray-700 mb-2">
                    <i class="fas fa-cube mr-2 text-blue-500"></i>Nama Produk
                </label>
                <input
                    type="text"
                    id="productName"
                    name="name"
                    class="w-full px-4 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all text-sm"
                    placeholder="Nama produk"
                    required
                >
            </div>

            <!-- Price Row -->
            <div class="grid grid-cols-2 gap-3">
                <!-- Purchase Price -->
                <div>
                    <label for="productPurchasePrice" class="block text-xs font-bold text-gray-700 mb-1">
                        <i class="fas fa-money-bill mr-1 text-blue-500"></i>Harga Beli
                    </label>
                    <input
                        type="number"
                        id="productPurchasePrice"
                        name="purchase_price"
                        class="w-full px-3 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all text-sm"
                        placeholder="0"
                        min="0"
                        step="0.01"
                        required
                    >
                </div>

                <!-- Selling Price -->
                <div>
                    <label for="productSellingPrice" class="block text-xs font-bold text-gray-700 mb-1">
                        <i class="fas fa-tag mr-1 text-blue-500"></i>Harga Jual
                    </label>
                    <input
                        type="number"
                        id="productSellingPrice"
                        name="selling_price"
                        class="w-full px-3 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all text-sm"
                        placeholder="0"
                        min="0"
                        step="0.01"
                        required
                    >
                </div>
            </div>

            <!-- Stock & Unit Row -->
            <div class="grid grid-cols-2 gap-3">
                <!-- Stock -->
                <div>
                    <label for="productStock" class="block text-xs font-bold text-gray-700 mb-1">
                        <i class="fas fa-layer-group mr-1 text-blue-500"></i>Stok
                    </label>
                    <input
                        type="number"
                        id="productStock"
                        name="stock"
                        class="w-full px-3 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all text-sm"
                        placeholder="0"
                        min="0"
                        required
                    >
                </div>

                <!-- Unit -->
                <div>
                    <label for="productUnit" class="block text-xs font-bold text-gray-700 mb-1">
                        <i class="fas fa-ruler mr-1 text-blue-500"></i>Satuan
                    </label>
                    <input
                        type="text"
                        id="productUnit"
                        name="unit"
                        class="w-full px-3 py-2 border-2 border-gray-200 rounded-lg focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200 transition-all text-sm"
                        placeholder="Pcs/Kg"
                        required
                    >
                </div>
            </div>

            <!-- Buttons -->
            <div class="flex gap-3 pt-4 border-t border-gray-200">
                <button type="button" onclick="closeModal()" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded-lg transition-colors text-sm">
                    Batal
                </button>
                <button type="submit" class="flex-1 bg-gradient-to-r from-blue-500 to-blue-600 hover:from-blue-600 hover:to-blue-700 text-white font-bold py-2 px-4 rounded-lg transition-all shadow-md hover:shadow-lg text-sm">
                    <i class="fas fa-save mr-1"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40 flex items-center justify-center p-4 overflow-y-auto modal-backdrop">
    <div class="bg-white rounded-xl card-shadow max-w-md w-full my-8 modal-content">
        <div class="p-8 text-center">
            <div class="w-20 h-20 bg-red-100 rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-exclamation-triangle text-red-600 text-3xl"></i>
            </div>
            <h2 class="text-xl font-bold text-gray-800 mb-2">Hapus Produk?</h2>
            <p class="text-gray-600 mb-2">
                Anda akan menghapus produk:
            </p>
            <p class="bg-red-50 border border-red-200 rounded-lg px-4 py-3 mb-6">
                <strong class="text-red-700" id="deleteProductName">-</strong>
            </p>
            <p class="text-gray-500 text-sm mb-6">
                <i class="fas fa-info-circle mr-2 text-orange-500"></i>Tindakan ini tidak dapat dibatalkan dan akan menghapus semua data terkait.
            </p>

            <form id="deleteForm" method="POST" class="space-y-0">
                @csrf
                @method('DELETE')

                <div class="flex gap-3">
                    <button type="button" onclick="closeDeleteModal()" class="flex-1 bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2.5 px-4 rounded-lg transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="flex-1 bg-red-500 hover:bg-red-600 text-white font-bold py-2.5 px-4 rounded-lg transition-all shadow-md hover:shadow-lg">
                        <i class="fas fa-trash-alt mr-2"></i>Hapus
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    const productModal = document.getElementById('productModal');
    const deleteModal = document.getElementById('deleteModal');
    const productForm = document.getElementById('productForm');
    const deleteForm = document.getElementById('deleteForm');

    // Open Create Modal
    function openCreateModal() {
        document.getElementById('modalTitle').innerHTML = '<i class="fas fa-plus-circle mr-2 text-blue-600"></i>Tambah Produk';
        document.getElementById('formMethod').value = 'POST';
        document.getElementById('productCategory').value = '';
        document.getElementById('productName').value = '';
        document.getElementById('productPurchasePrice').value = '';
        document.getElementById('productSellingPrice').value = '';
        document.getElementById('productStock').value = '';
        document.getElementById('productUnit').value = '';
        productForm.action = '{{ route("admin.products.store") }}';
        
        productModal.classList.remove('hidden');
        productModal.classList.add('modal-backdrop');
        productModal.querySelector('.modal-content').classList.remove('closing');
        document.body.style.overflow = 'hidden';
    }

    // Open Edit Modal - Fetch data from server
    function openEditModal(id) {
        document.getElementById('modalTitle').innerHTML = '<i class="fas fa-edit mr-2 text-blue-600"></i>Edit Produk';
        document.getElementById('formMethod').value = 'PUT';
        productForm.action = `/admin/products/${id}`;
        
        // Fetch product data from server
        fetch(`/admin/products/${id}`)
            .then(response => {
                if (!response.ok) throw new Error('Gagal mengambil data produk');
                return response.json();
            })
            .then(data => {
                document.getElementById('productCategory').value = data.category_id || '';
                document.getElementById('productName').value = data.name || '';
                document.getElementById('productPurchasePrice').value = data.purchase_price || '';
                document.getElementById('productSellingPrice').value = data.selling_price || '';
                document.getElementById('productStock').value = data.stock || '';
                document.getElementById('productUnit').value = data.unit || '';
                
                productModal.classList.remove('hidden');
                productModal.classList.add('modal-backdrop');
                productModal.querySelector('.modal-content').classList.remove('closing');
                document.body.style.overflow = 'hidden';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Gagal mengambil data produk. Silakan coba lagi.');
            });
    }

    // Close Modal
    function closeModal() {
        const modalContent = productModal.querySelector('.modal-content');
        productModal.classList.add('closing');
        modalContent.classList.add('closing');
        
        setTimeout(() => {
            productModal.classList.add('hidden');
            productModal.classList.remove('modal-backdrop', 'closing');
            modalContent.classList.remove('closing');
            document.body.style.overflow = 'auto';
        }, 300);
    }

    // Open Delete Modal
    function openDeleteModal(id, name) {
        document.getElementById('deleteProductName').textContent = name;
        deleteForm.action = `/admin/products/${id}`;
        
        deleteModal.classList.remove('hidden');
        deleteModal.classList.add('modal-backdrop');
        deleteModal.querySelector('.modal-content').classList.remove('closing');
        document.body.style.overflow = 'hidden';
    }

    // Close Delete Modal
    function closeDeleteModal() {
        const modalContent = deleteModal.querySelector('.modal-content');
        deleteModal.classList.add('closing');
        modalContent.classList.add('closing');
        
        setTimeout(() => {
            deleteModal.classList.add('hidden');
            deleteModal.classList.remove('modal-backdrop', 'closing');
            modalContent.classList.remove('closing');
            document.body.style.overflow = 'auto';
        }, 300);
    }

    // Close modal when clicking outside
    productModal.addEventListener('click', function(e) {
        if (e.target === productModal) {
            closeModal();
        }
    });

    deleteModal.addEventListener('click', function(e) {
        if (e.target === deleteModal) {
            closeDeleteModal();
        }
    });

    // Close on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeModal();
            closeDeleteModal();
        }
    });
</script>
@endsection
