<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Menentukan nama tabel (opsional, tapi aman untuk menghindari salah deteksi jamak/plural)
    protected $table = 'categories';

    // Kolom yang boleh diisi
    protected $fillable = ['nama_kategori'];

    // Relasi ke tabel Book
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}