<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // 1. READ (Tampil Data) - Menampilkan semua daftar buku
    public function index()
    {
        $books = Book::with('category')->latest()->get();
        return view('books.index', compact('books'));
    }

    // 2. CREATE (Form) - Menampilkan halaman form tambah buku
    public function create()
    {
        $categories = Category::all();
        return view('books.create', compact('categories'));
    }

    // 3. STORE (Proses Tambah) - Menyimpan buku baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'judul_buku'  => 'required|string|max:255',
            'penulis'     => 'required|string|max:255',
            'tahun_terbit'=> 'required|integer',
        ]);

        Book::create($request->all());

        return redirect()->route('books.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    // 4. EDIT (Form) - Menampilkan form untuk edit data buku lama
    public function edit(Book $book)
    {
        $categories = Category::all();
        return view('books.edit', compact('book', 'categories'));
    }

    // 5. UPDATE (Proses Edit) - Memperbarui data buku di database
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'judul_buku'  => 'required|string|max:255',
            'penulis'     => 'required|string|max:255',
            'tahun_terbit'=> 'required|integer',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index')->with('success', 'Data buku berhasil diubah!');
    }

    // 6. DESTROY (Hapus) - Menghapus data buku dari database
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Buku berhasil dihapus!');
    }
}