@extends('layouts.app')

<!-- Tambahkan CDN Boxicons agar ikon bisa terbaca -->
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-2xl font-bold text-gray-800">Daftar Buku</h2>
            <a href="{{ route('books.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                + Tambah Buku Baru
            </a>
        </div>

        <table class="w-full table-auto border-collapse border border-gray-200">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="border border-gray-200 px-4 py-2">Judul Buku</th>
                    <th class="border border-gray-200 px-4 py-2">Kategori</th>
                    <th class="border border-gray-200 px-4 py-2">Penulis</th>
                    <th class="border border-gray-200 px-4 py-2">Tahun Terbit</th>
                    <th class="border border-gray-200 px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-200 px-4 py-2 font-medium">{{ $book->judul_buku }}</td>
                        <td class="border border-gray-200 px-4 py-2 text-gray-600">{{ $book->category->nama_kategori }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $book->penulis }}</td>
                        <td class="border border-gray-200 px-4 py-2">{{ $book->tahun_terbit }}</td>
                        <td class="border border-gray-200 px-4 py-2 text-center space-x-3">

                            <!-- Tombol Edit (Ditambahkan ikon edit biar serasi) -->
                            <a href="{{ route('books.edit', $book->id) }}"
                                class="inline-flex items-center text-yellow-600 hover:text-yellow-900 font-semibold">
                                <i class='bx bx-edit alt mr-1 text-lg'></i>
                            </a>

                            <!-- Tombol Hapus (Disimpan di SINI) -->
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline"
                                onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="inline-flex items-center text-red-600 hover:text-red-900 font-semibold">
                                    <!-- Ikon Trash Disimpan di dalam button sebelum teks Hapus -->
                                    <i class='bx bx-trash mr-1 text-lg'></i>
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-gray-500">Belum ada data buku.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
