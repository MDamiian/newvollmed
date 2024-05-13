<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Paciente extends Model
{
    protected $table = 'pacientes';

    use HasFactory;

    protected $fillable = [
        'datos_id',
        'usuario_id',
        'activo',
        'nss',
    ];

    public $timestamps = false;

    public function datos(): HasOne
    {
        return $this->hasOne(DatosPersonales::class, 'id', 'datos_id');
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'usuario_id');
    }

    public function consultas(): HasMany
    {
        return $this->hasMany(Consulta::class, 'id', 'paciente_id');
    }
}
