<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T002_PedidoCompraItem extends Model
{
    use HasFactory;

    public function usesTimestamps()
    {
        return false;
    }

    protected $table = 'T002_PedidoCompraItem'; //Especificando o nome da tabela no banco de dados.

    protected $fillable = [
        'T001_ID',
        'C002_CodigoProduto',
        'C002_DescricaoProduto',
        'T002_Quantidade',
        'T002_ValorItem',
        'T002_ValorTotalItem'
    ];

    public function T002_PedidoCompraItem()
    {
        return $this->belongsTo(T001_PedidoCompra::class, 'id', 'T001_ID');
    }

    public function C002_Produto()
    {
        return $this->hasMany(C002_Produto::class, 'C002_CodigoBarras', 'C002_CodigoProduto');
    }
}
