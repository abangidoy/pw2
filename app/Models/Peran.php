<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Cast;
use App\Models\Film;

class Peran extends Model
{
    protected $table = 'peran';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'film_id', 'cast_id',];

    public $timestamps = true;

    public function cast(): BelongsTo
    {
        return $this->belongsTo(Cast::class, 'cast_id', 'id');
    }

    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class, 'film_id', 'id');
    }
}