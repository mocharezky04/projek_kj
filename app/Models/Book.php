<?php

namespace App\Models;

use Database\Factories\BookFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'judul',
    'penulis',
    'penerbit',
    'tahun_terbit',
    'isbn',
    'stok',
    'deskripsi',
    'cover',
])]
class Book extends Model
{
    /** @use HasFactory<BookFactory> */
    use HasFactory;
}
