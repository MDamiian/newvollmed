<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Direccion extends Model
{
    protected $table = 'direcciones';

    use HasFactory;

    protected $fillable = [
        'calle',
        'numero',
        'complemento',
        'colonia',
        'ciudad',
    ];

    public $timestamps = false;

    public function datos(): BelongsTo
    {
        return $this->belongsTo(DatosPersonales::class);
    }
}
