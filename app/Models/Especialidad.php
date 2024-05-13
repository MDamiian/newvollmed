<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Especialidad extends Model
{
    protected $table = 'especialidades';

    use HasFactory;

    protected $fillable = [
        'nombre',
    ];

    public $timestamps = false;

    public function medico(): BelongsTo
    {
        return $this->belongsTo(Medico::class);
    }
}
