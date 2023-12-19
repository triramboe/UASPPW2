<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Buku Populer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="text-gray-900 dark:text-gray-100">
                <a href="{{ route('buku.index') }}" class="text-blue-500"> <!-- Ganti 'index' dengan nama rute halaman index Anda -->
                    <span class="inline-flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="h-5 w-5 mr-1">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </span>
                </a>
                <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
                    <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Buku</th>
                                <th scope="col" class="px-6 py-4 font-medium text-gray-900">Rating</th>
                                <!-- Tambahkan kolom lain sesuai kebutuhan -->
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                            @foreach($bukuPopuler as $buku)
                            <tr class="hover:bg-gray-50">
                                <td class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                                    <a href="{{ $buku->id ? route('galeri.buku', $buku->id) : '#' }}" class="font-medium text-gray-700">{{ $buku->judul }}</a>
                                    <div class="text-gray-400">{{ $buku->penulis }}</div>
                                </td>
                                <td class="px-6 py-4">{{ $buku->rating ?? '-' }}</td>
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