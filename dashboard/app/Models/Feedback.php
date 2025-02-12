<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda
    protected $table = 'feedbacks';

    // Tentukan kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'name',
        'field',
        'review',
    ];
}
