<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursoAcademico extends Model
{
    protected $table = 'cursos_academico';

    protected $fillable = [
        'nombre_curso',
        'horas_lectivas_profesor',
    ];

    public function departamentos()
    {
        return $this->hasMany(Departamento::class, 'id_curso');
    }

    public function categorias()
    {
        return $this->hasMany(Categoria::class, 'id_curso');
    }

    public function cargaLectiva()
    {
        return $this->hasMany(CargaLectiva::class, 'id_cursos_academico');
    }
}
