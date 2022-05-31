<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class C002_Produto extends Model
{
    use HasFactory;

    public function usesTimestamps()
    {
        return false;
    }

    protected $table = 'C002_Produto'; //Especificando o nome da tabela no banco de dados.

    protected $fillable = [
        'C002_CodigoBarras',
        'C002_DescricaoProduto',
        'C002_ValorUnitario',
        'C002_Quantidade',
        'C002_UsuarioInclusao',
        'C002_DataInclusao',
        'C002_UsuarioAlteracao',
        'C002_DataAlteracao',
    ];

    public function search($filter = null)
    {
        $results = $this->where(function ($query) use ($filter){
            if ($filter){
                //$query->where('C001_CPF', '=', $filter);
                $query->where('C002_DescricaoProduto', 'LIKE', "%{$filter}%");
                //$query->where('C001_Email', 'LIKE', "%{$filter}%");
            }
        })
            ->paginate();

        return $results;
    }

    public function T002_PedidoCompraItem()
    {
        return $this->hasMany(T002_PedidoCompraItem::class, 'C002_CodigoProduto', 'C002_CodigoBarras');
    }
}
