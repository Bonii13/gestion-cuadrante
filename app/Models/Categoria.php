<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $table = 'categorias';

    protected $fillable = [
        'nombre_categoria',
        'id_curso',
    ];

    public function cursoAcademico()
    {
        return $this->belongsTo(CursoAcademico::class, 'id_curso');
    }

    public function cargaLectiva()
    {
        return $this->hasMany(CargaLectiva::class, 'id_categoria');
    }
}
