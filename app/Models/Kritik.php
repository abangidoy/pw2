<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Login;
use App\Models\Film;

class Kritik extends Model
{
    protected $table = 'kritik';
    protected $primaryKey = 'id';
    protected $fillable = ['content', 'point', 'login_id', 'film_id'];

    public $timestamps = true;

    public function login(): BelongsTo
    {
        return $this->belongsTo(Login::class, 'login_id', 'id');
    }

    public function film(): BelongsTo
    {
        return $this->belongsTo(Film::class, 'film_id', 'id');
    }
}