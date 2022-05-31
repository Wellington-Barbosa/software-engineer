<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class C001_Pessoa extends Model
{
    use HasFactory;

    public function usesTimestamps()
    {
        return false;
    }

    protected $table = 'C001_Pessoa'; //Especificando o nome da tabela no banco de dados.

    protected $fillable = [
        'C001_CPF',
        'C001_NomePessoa',
        'C001_Email',
        'C001_UsuarioInclusao',
        'C001_DataInclusao',
        'C001_UsuarioAlteracao',
        'C001_DataAlteracao',
    ];

    public function search($filter = null)
    {
        $results = $this->where(function ($query) use ($filter){
            if ($filter){
                //$query->where('C001_CPF', '=', $filter);
                $query->where('C001_NomePessoa', 'LIKE', "%{$filter}%");
                //$query->where('C001_Email', 'LIKE', "%{$filter}%");
            }
        })
            ->paginate();

        return $results;
    }

    public function T001_PedidoCompra()
    {
        return $this->hasMany(T001_PedidoCompra::class, 'C001_CodigoCliente', 'C001_CPF');
    }
}
