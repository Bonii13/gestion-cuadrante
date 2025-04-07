<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';

    protected $fillable = [
        'nombre_departamento',
        'num_profesores',
        'horas_totales',
        'horas_asignadas',
        'id_curso',
    ];

    public function cursoAcademico()
    {
        return $this->belongsTo(CursoAcademico::class, 'id_curso');
    }

    public function cargaLectivaGrupo()
    {
        return $this->hasMany(CargaLectivaGrupo::class, 'id_departamento');
    }
}
