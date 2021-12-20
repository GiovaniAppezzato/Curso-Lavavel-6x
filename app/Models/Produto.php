<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produtos';
    protected $fillable = ['nome', 'descricao', 'valor', 'imagem'];

    public function search($filtro = null)
    {
        $resultados = $this->where(function ($query) use($filtro) {
            if($filtro) {
                $query->where('nome', 'like', '%'.$filtro.'%');
            }
        })->paginate(25);

        return $resultados;
    }
}
