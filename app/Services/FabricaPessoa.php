<?php

namespace App\Services;

use App\Models\C001_Pessoa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FabricaPessoa
{
    public function criaPessoa($codigoPessoa, $nomePessoa, $email):C001_Pessoa
    {
        //data e Hora de criação do registro
        $date = Carbon::now();
        $dateInclusao = $date;

        //data e hora hoje formatada - Mudar
        //$data = Carbon::now()->format('d/m/Y');
        //$dataHoje = $data;

        //recupera dados do usuário logado no sistema
        $usuario = User::query()
            ->where("id", "=", Auth::user()->getAuthIdentifier())
            ->select("name")
            ->first()
            ->name;

        $usuarioInclusao = $usuario;

        DB::beginTransaction();

        $pessoa = C001_Pessoa::create([
            'C001_CPF' => $codigoPessoa,
            'C001_NomePessoa' => $nomePessoa,
            'C001_Email' => $email,
            'C001_UsuarioInclusao' => $usuarioInclusao,
            'C001_DataInclusao' => $dateInclusao,
        ]);

        DB::commit();

        return $pessoa;
    }
}
