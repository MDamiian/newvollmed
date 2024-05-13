<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DatosPersonales extends Model
{
    protected $table = 'datos_personales';

    use HasFactory;

    protected $fillable = [
        'nombre',
        'curp',
        'telefono',
        'direccion_id',
    ];

    public $timestamps = false;

    public function paciente(): BelongsTo
    {
        return $this->belongsTo(Paciente::class);
    }

    public function medico(): BelongsTo
    {
        return $this->belongsTo(Medico::class);
    }

    public function direccion(): HasOne
    {
        return $this->hasOne(Direccion::class, 'id', 'direccion_id');
    }
}
