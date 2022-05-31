<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T001_PedidoCompra extends Model
{
    use HasFactory;

    public function usesTimestamps()
    {
        return false;
    }

    protected $table = 'T001_PedidoCompra'; //Especificando o nome da tabela no banco de dados.

    protected $fillable = [
        'T001_NumeroPedido',
        'T001_DataPedido',
        'C001_CodigoCliente',
        'T001_StatusPedido',
        'T001_UsuarioInclusao',
        'T001_DataInclusao',
        'T001_UsuarioAlteracao',
        'T001_DataAlteracao'
    ];

    public function C001_Pessoa()
    {
        return $this->belongsTo(C001_Pessoa::class, 'C001_CPF', 'C001_CodigoCliente');
    }

    public function T002_PedidoCompraItem()
    {
        return $this->hasMany(T002_PedidoCompraItem::class, 'T001_ID', 'id');
    }
}
