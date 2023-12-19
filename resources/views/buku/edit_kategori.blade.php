<!-- resources/views/kategori/form.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ isset($kategori) ? 'Edit Kategori' : 'Tambah Kategori' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="text-gray-900 dark:text-gray-100">
                <!-- Form untuk tambah/edit kategori -->
                <form method="post" action="{{ isset($kategori) ? route('kategori.update', $kategori->id) : route('kategori.store') }}">
                    @csrf
                    @if(isset($kategori))
                        @method('PUT')
                    @endif

                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Nama Kategori</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', isset($kategori) ? $kategori->nama : '') }}" class="mt-1 p-2 border rounded-md w-full">
                    </div>

                    <!-- Tambahkan kolom lain sesuai kebutuhan -->

                    <div class="mt-4">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
