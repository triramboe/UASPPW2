<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Detail Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white overflow-hidden rounded-lg shadow-md m-5 p-6">
                <section id="album" class="py-4 text-center bg-light">
                    <div class="container mx-auto">
                        <h2 class="text-3xl font-bold mb-4">{{ $bukus->judul }}</h2>
                        <hr class="my-2">

                        @auth
                            <form method="post" action="{{ route('buku.favorite', ['id' => $bukus->id]) }}">
                                @csrf
                                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded mt-2 hover:bg-blue-600">
                                    Save to Favorites
                                </button>
                            </form>
                        @endauth

                        <div class="flex items-center justify-center mb-2 mt-3">
                            <p class="text-xl font-semibold mr-2">Rating:</p>
                            <div class="flex items-center justify-center">
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $bukus->rating)
                                        <svg fill="gold" class="w-5 h-5 text-yellow-500" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 2a1 1 0 0 1 .773.37l1.94 2.497 4.81.556a1 1 0 0 1 .554 1.705l-3.53 3.428.83 4.874a1 1 0 0 1-1.451 1.054L10 14.666l-4.315 2.26a1 1 0 0 1-1.45-1.055l.83-4.874-3.53-3.428a1 1 0 0 1 .554-1.705l4.81-.556L9.227 2.37A1 1 0 0 1 10 2z"/>
                                        </svg>
                                    @else
                                        <svg fill="gray" class="w-5 h-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M10 2a1 1 0 0 1 .773.37l1.94 2.497 4.81.556a1 1 0 0 1 .554 1.705l-3.53 3.428.83 4.874a1 1 0 0 1-1.451 1.054L10 14.666l-4.315 2.26a1 1 0 0 1-1.45-1.055l.83-4.874-3.53-3.428a1 1 0 0 1 .554-1.705l4.81-.556L9.227 2.37A1 1 0 0 1 10 2z"/>
                                        </svg>
                                    @endif
                                @endfor
                            </div>
                            <p class="text-lg font-semibold ml-2">{{ number_format($bukus->rating, 1) }}</p>
                        </div>

                        <div class="flex flex-wrap gap-4 overflow-x-auto justify-center">
                            @foreach($bukus->galleries as $gallery)
                                <div class="flex-shrink-0 flex flex-col items-center rounded-md bg-white m-2 p-4">
                                    <a href="{{ asset($gallery->path) }}" data-lightbox="image-1" data-title="{{ $gallery->keterangan }}">
                                        <img src="{{ asset($gallery->path) }}" class="w-200 h-150 object-cover rounded-md" alt="{{ $gallery->nama_galeri }}" width="200" height="150">
                                    </a>
                                    <p class="mt-2 text-sm">{{ $gallery->nama_galeri }}</p>
                                </div>
                            @endforeach
                        </div>

                        <form method="post" action="{{ route('buku.rate', ['id' => $bukus->id]) }}" class="mt-4">
                            @csrf
                            <div class="mb-4 mx-auto">
                                <label for="rating" class="block text-sm font-medium text-gray-700">Submit Rating:</label>
                                <select name="rating" id="rating" class="mt-1 block w-1/4 border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 rounded-md mx-auto">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">
                                Submit Rating
                            </button>
                        </form>
                    </div>

                    <a href="{{ route('buku.index') }}" class="inline-block px-4 py-2 border border-blue-500 text-blue-500 bg-blue-100 rounded mt-4 hover:bg-blue-200">
                        {{ __('Back to Book List') }}
                    </a>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
