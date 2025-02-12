<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookSubmission extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan konvensi Laravel
    protected $table = 'book_submissions';

    // Tentukan kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'name',
        'book_title',
        'author',
        'reason',
    ];
}
