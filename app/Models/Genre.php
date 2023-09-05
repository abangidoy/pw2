<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Film;

class Genre extends Model
{
    protected $table = 'genre';
    protected $primaryKey = 'id';
    protected $fillable = ['nama'];

    public $timestamps = true;

    // Definisikan relasi dengan model Film
    public function films(): HasMany
    {
        return $this->hasMany(Film::class, 'genre_id');
    }
}