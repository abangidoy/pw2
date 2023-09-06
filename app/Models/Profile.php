<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Login;

class Profile extends Model
{
    protected $table = 'profile';
    protected $primaryKey = 'id';
    protected $fillable = ['umur', 'bio', 'alamat', 'login_id'];

    public $timestamps = true;

    public function login(): BelongsTo
    {
        return $this->belongsTo(Login::class, 'login_id', 'id');
    }
}