<!-- resources/views/kategori/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Kategori') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="text-gray-900 dark:text-gray-100">
                <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                    <!-- Tabel daftar kategori -->
                    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">ID</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nama Kategori</th>
                                <!-- Tambahkan kolom lain sesuai kebutuhan -->
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                            @foreach($kategoris as $kategori)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">{{ $kategori->id }}</td>
                                    <td class="px-6 py-4">{{ $kategori->nama }}</td>
                                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
