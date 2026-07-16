@extends('layouts.app')

@section('content')
    <div class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Edit Data Buku</h2>

        <!-- Action mengarah ke route update dengan membawa parameter ID buku -->
        <form action="{{ route('books.update', $book->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT') <!-- Wajib menggunakan method PUT untuk proses update data -->

            <div>
                <label class="block text-gray-700 font-medium mb-1">Judul Buku</label>
                <input type="text" name="judul_buku"
                    class="w-full border rounded p-2 focus:outline-none focus:border-blue-500 @error('judul_buku') border-red-500 @enderror"
                    value="{{ old('judul_buku', $book->judul_buku) }}">
                @error('judul_buku')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Kategori Buku</label>
                <select name="category_id"
                    class="w-full border rounded p-2 focus:outline-none focus:border-blue-500 @error('category_id') border-red-500 @enderror">
                    @foreach ($categories as $category)
                        <!-- Mengecek jika kategori sesuai dengan data lama, maka otomatis terpilih (selected) -->
                        <option value="{{ $category->id }}" {{ $book->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->nama_kategori }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Penulis</label>
                <input type="text" name="penulis"
                    class="w-full border rounded p-2 focus:outline-none focus:border-blue-500 @error('penulis') border-red-500 @enderror"
                    value="{{ old('penulis', $book->penulis) }}">
                @error('penulis')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-1">Tahun Terbit</label>
                <input type="number" name="tahun_terbit"
                    class="w-full border rounded p-2 focus:outline-none focus:border-blue-500 @error('tahun_terbit') border-red-500 @enderror"
                    value="{{ old('tahun_terbit', $book->tahun_terbit) }}">
                @error('tahun_terbit')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between items-center pt-2">
                <a href="{{ route('books.index') }}" class="text-gray-600 hover:underline">Batal</a>
                <button type="submit"
                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded font-semibold">Perbarui
                    Buku</button>
            </div>
        </form>
    </div>
@endsection
