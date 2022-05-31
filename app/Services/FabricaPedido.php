<?php

namespace App\Services;

use App\Models\T001_PedidoCompra;
use App\Models\T002_PedidoCompraItem;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FabricaPedido
{
    /**
     * @var Request
     */
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function criaPedido($codigoCliente, $statusPedido)
    {
        //data e Hora de criação do registro
        $date = Carbon::now();
        $dateInclusao = $date;

        //data e hora em que a requisição é aberta, ao clicar no botão 'criar' os dados de datetime são capturados do servidor
        $dataPedido = Carbon::now()->format('d/m/Y H:i:s');

        //recupera dados do usuário logado no sistema
        $usuario = User::query()
            ->where("id", "=", Auth::user()->getAuthIdentifier())
            ->select("name")
            ->first()
            ->name;

        $usuarioInclusao = $usuario;

        DB::beginTransaction();

        $pedido = T001_PedidoCompra::create([
            'T001_DataPedido' => $dataPedido,
            'C001_CodigoCliente' => $codigoCliente,
            'T001_StatusPedido' => $statusPedido,
            'T001_UsuarioInclusao' => $usuarioInclusao,
            'T001_DataInclusao' => $dateInclusao
        ]);

        DB::commit();

        return $pedido;
    }

    public function criaItensPedido($idPedido, $codigoProduto, $descProduto, $quantidade, $valorItem, $valorTotalItem)
    {
        DB::beginTransaction();

        $itensPedido = T002_PedidoCompraItem::create([
            'T001_ID' => $idPedido,
            'C002_CodigoProduto' => $codigoProduto,
            'C002_DescricaoProduto' => $descProduto,
            'T002_Quantidade' => $quantidade,
            'T002_ValorItem' => $valorItem,
            'T002_ValorTotalItem' => $valorTotalItem
        ]);

        DB::commit();

        return $itensPedido;
    }
}
