<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryCast extends Model
{
    use HasFactory;

    protected $table = 'history_casts';
    public $timestamps = false; // Tidak menggunakan timestamp otomatis

    protected $fillable = ['cast_id', 'action', 'time', 'nama', 'umur', 'bio'];

    public function cast()
    {
        return $this->belongsTo(Cast::class);
    }
}