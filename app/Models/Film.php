<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Genre;

class Film extends Model
{
    use HasFactory;
    protected $table = 'film';
    protected $primaryKey = 'id';
    protected $fillable = ['judul', 'ringkasan', 'tahun', 'poster', 'genre_id'];

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'id');
    }
}