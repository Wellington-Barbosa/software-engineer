<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoaFormRequest;
use App\Models\C001_Pessoa;
use App\Services\FabricaPessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PessoaController extends Controller
{
    /**
     * @var Request
     */
    protected $request;
    private $repository;

    public function __construct(Request $request, C001_Pessoa $pessoa)
    {
        $this->request = $request;
        $this->repository = $pessoa;
    }

    public function create()
    {
        return view('viewPessoa.createPessoa');
    }

    public function index(Request $request)
    {
        $pessoas = DB::table('C001_Pessoa')
            -> orderBy('id')
            ->paginate(19);

        $mensagem = $this->request->session()->get('mensagem');

        return view('viewPessoa.indexPessoa', [
            'pessoas' => $pessoas,
            'mensagem' => $mensagem
        ]);

    }

    public function store(PessoaFormRequest $request, FabricaPessoa $fabricaPessoa)
    {
        $pessoa = $fabricaPessoa->criaPessoa(
            $request->codigoPessoa,
            $request->nomePessoa,
            $request->email
        );

        $request->session()
            ->flash(
                'mensagem',
                "O cliente '{$pessoa->C001_NomePessoa}' foi inserido com sucesso!"
            );

        return redirect()->route('listar_pessoas');
    }

    public function edit($id)
    {
        /*$pessoa = C001_Pessoa::where('C001_CodigoPessoa', $id)->first();
        if (!empty($pessoa)){
            return view('viewPessoa.editPessoa', ['pessoa' => $pessoa]);
        } else {
            return redirect()->route('listar_pessoas');
        }*/

        $pessoa = C001_Pessoa::find($id);

        return view('viewPessoa.editPessoa')->with('pessoa', $pessoa);
    }

    public function update(Request $request)
    {

        $pessoa = C001_Pessoa::find($request->id);
        //$pessoa = C001_Pessoa::find(1);

        $pessoa->C001_CPF = $request->codigoPessoa;
        $pessoa->C001_NomePessoa = $request->nomePessoa;
        $pessoa->C001_Email = $request->email;
        $pessoa->save();

        $request->session()
            ->flash(
                'mensagem',
                "O(a) cliente '{$pessoa->C001_NomePessoa}' foi atualizado(a) com sucesso!"
            );

        return redirect()->action([PessoaController::class, 'index']);
    }

    public function show($id)
    {
        $pessoa = C001_Pessoa::findOrFail($id);

        return view('viewPessoa.showPessoa', ['pessoa' => $pessoa]);
    }

    public function destroy($id)
    {
        C001_Pessoa::where('id', $id)->delete($id);

        return redirect()->route('listar_pessoas');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $pessoas = $this->repository->search($request->filter);

        $mensagem = $this->request->session()->get('mensagem');

        return view('viewPessoa.indexPessoa', [
            'pessoas' => $pessoas,
            'mensagem' => $mensagem,
            'filters' => $filters
        ]);
    }
}
