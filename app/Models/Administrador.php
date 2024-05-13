<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Administrador extends Model
{
    protected $table = 'administradores';

    use HasFactory;

    protected $fillable = [
        'usuario_id',
    ];

    public $timestamps = false;

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'usuario_id');
    }
}
