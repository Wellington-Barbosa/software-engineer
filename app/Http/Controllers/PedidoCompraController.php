<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoFormRequest;
use App\Http\Requests\PessoaFormRequest;
use App\Models\C001_Pessoa;
use App\Models\C002_Produto;
use App\Models\T001_PedidoCompra;
use App\Services\FabricaPedido;
use Illuminate\Http\Request;

class PedidoCompraController extends Controller
{
    /**
     * @var Request
     */
    protected $request;
    private $repository;

    public function __construct(Request $request, T001_PedidoCompra $pedidoCompra)
    {
        $this->request = $request;
        $this->repository = $pedidoCompra;
    }

    public function create(Request $request)
    {
        $pessoas = C001_Pessoa::orderBy('C001_NomePessoa', 'ASC')->get();

        return view('viewPedidoCompra.openPedido', [
            'pessoas' => $pessoas
        ]);
    }

    public function complete($id)
    {
        $pedido = T001_PedidoCompra::find($id);

        return view('viewPedidoCompra.createPedidoCompra')->with('pedido', $pedido);
    }

    public function addItem($idPedido, $idProduto)
    {
        $produto = C002_Produto::find($idProduto);

        if(!$produto) {
            return;
        }

        return $produto;
    }

    public function dataAjaxPessoas(Request $request)
    {
        $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = C001_Pessoa::select("id","C001_CPF", "C001_NomePessoa", "C001_Email")
                ->where('C001_NomePessoa', 'LIKE',"%$search%")
                ->get();
        }
        return response()->json($data);
    }

    public function store(PedidoFormRequest $request, FabricaPedido $fabricaPedido)
    {
        $pedido = $fabricaPedido->criaPedido(
            $request->codigoCliente,
            $request->statusPedido
        );

        $request->session()
            ->flash(
                'mensagem',
                "O pedido N° '{$pedido->T001_NumeroPedido}' foi aberto com sucesso!"
            );

        return redirect()->route('form_completar_pedido');
    }


}
