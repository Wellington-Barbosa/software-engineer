<?php

namespace App\Services;


use App\Models\C002_Produto;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FabricaProduto
{
    public function criaProduto($codigoBarras, $descProduto, $valorUnitario, $quantidade):C002_Produto
    {
        //data e Hora de criação do registro
        $date = Carbon::now();
        $dateInclusao = $date;

        //recupera dados do usuário logado no sistema
        $usuario = User::query()
            ->where("id", "=", Auth::user()->getAuthIdentifier())
            ->select("name")
            ->first()
            ->name;

        $usuarioInclusao = $usuario;

        DB::beginTransaction();

        $produto = C002_Produto::create([
            'C002_CodigoBarras' => $codigoBarras,
            'C002_DescricaoProduto' => $descProduto,
            'C002_ValorUnitario' => $valorUnitario,
            'C002_Quantidade' => $quantidade,
            'C002_UsuarioInclusao' => $usuarioInclusao,
            'C002_DataInclusao' => $dateInclusao,
        ]);

        DB::commit();

        return $produto;
    }
}
