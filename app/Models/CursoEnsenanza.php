<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CursoEnsenanza extends Model
{
    protected $table = 'cursos_ensenanza';

    protected $fillable = [
        'nombre_curso_ensenanza',
    ];

    public function cargaLectiva()
    {
        return $this->hasMany(CargaLectiva::class, 'id_curso_ensenanza');
    }
}
