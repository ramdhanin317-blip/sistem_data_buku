<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Book;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat Kategori
        $novel = Category::create(['nama_kategori' => 'Novel']);
        $sains = Category::create(['nama_kategori' => 'Sains & Teknologi']);

        // Membuat Buku
        Book::create([
            'category_id' => $novel->id,
            'judul_buku' => 'Laskar Pelangi',
            'penulis' => 'Andrea Hirata',
            'tahun_terbit' => 2005
        ]);

        Book::create([
            'category_id' => $sains->id,
            'judul_buku' => 'A Brief History of Time',
            'penulis' => 'Stephen Hawking',
            'tahun_terbit' => 1988
        ]);
    }
}