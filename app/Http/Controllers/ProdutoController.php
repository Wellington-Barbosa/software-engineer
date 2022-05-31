<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdutoFormRequest;
use App\Models\C002_Produto;
use App\Services\FabricaProduto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * @var Request
     */
    protected $request;
    private $repository;

    public function __construct(Request $request, C002_Produto $produto)
    {
        $this->request = $request;
        $this->repository = $produto;
    }

    public function create()
    {
        return view('viewProduto.createProduto');
    }

    public function index(Request $request)
    {
        $produtos = DB::table('C002_Produto')
            ->orderBy('id')
            ->paginate(19);

        $mensagem = $this->request->session()->get('mensagem');

        return view('viewProduto.indexProduto', [
            'produtos' => $produtos,
            'mensagem' => $mensagem
        ]);
    }

    public function store(ProdutoFormRequest $request, FabricaProduto $fabricaProduto)
    {
        $produto = $fabricaProduto->criaProduto(
            $request->codigoBarras,
            $request->descProduto,
            $request->valorUnitario,
            $request->quantidade
        );

        $request->session()
            ->flash(
                'mensagem',
                "O produto '{$produto->C001_DescricaoProduto}' foi inserido com sucesso!"
            );

        return redirect()->route('listar_produtos');
    }

    public function edit($id)
    {
        $produto = C002_Produto::find($id);

        return view('viewProduto.editProduto')->with('produto', $produto);
    }

    public function update(Request $request)
    {
        $produto = C002_Produto::find($request->id);

        $produto->C002_CodigoBarras = $request->codigoBarras;
        $produto->C002_DescricaoProduto = $request->descProduto;
        $produto->C002_ValorUnitario = $request->valorUnitario;
        $produto->C002_Quantidade = $request->quantidade;
        $produto->save();

        $request->session()
            ->flash(
                'mensagem',
                "O produto '{$produto->C002_DescricaoProduto}' foi atualizado(a) com sucesso!"
            );

        return redirect()->action([ProdutoController::class, 'index']);
    }

    public function show($id)
    {
        $produto = C002_Produto::findOrFail($id);

        return view('viewProduto.showProduto', ['produto' => $produto]);
    }

    public function destroy($id)
    {
        C002_Produto::where('id', $id)->delete($id);

        return redirect()->route('listar_produtos');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $produtos = $this->repository->search($request->filter);

        $mensagem = $this->request->session()->get('mensagem');

        return view('viewProduto.indexProduto', [
            'produtos' => $produtos,
            'mensagem' => $mensagem,
            'filters' => $filters
        ]);
    }
}
