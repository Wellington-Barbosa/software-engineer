@extends('adminlte::page')

@section('title', 'Pessoas')

@section('content_header')
    <button class="btn btn-success col col-12" disabled="disabled"><h1>Software Engineer</h1></button>
@stop

@section('content')

    @include('mensagem', ['mensagem' => $mensagem])

    <div class="row justify-content-between">
        <div class="col col-4 mt-2">
            <a href="{{ route('form_cadastrar_pessoa') }}" class="btn btn-dark mb-1 col col-4 text-bold">
                Nova Pessoa
            </a>
        </div>

        <div class="col col-7 mt-1">
            <form action="{{ route('pesquisar_pessoas') }}" method="post" class="form form-inline">
                @csrf
                <input type="text" name="filter" placeholder="Filtrar:" class="form-control" style="width: 500px" value="{{ $filters['filter'] ?? '' }}">
                <button type="submit" class="btn btn-info">Pesquisar</button>
            </form>
        </div>
    </div>



    <div class="content-center mt-2" style="min-height: 2172.31px;" >
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Listagem dos Clientes Cadastrados<small></small></h3>
                            </div>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">...</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($pessoas) == 0)
                                    <tr>
                                        <th>-</th>
                                        <th>-</th>
                                        <th>-</th>
                                        <th>-</th>
                                        <th>-</th>
                                        <th>-</th>
                                    </tr>
                                @else
                                    @foreach($pessoas as $pessoa)
                                        <tr>
                                            <th><a href="/pessoa/show/{{ $pessoa->id }}"> {{ $pessoa->id }}</a></th>
                                            <td><a href="/pessoa/show/{{ $pessoa->id }}">{{ $pessoa->C001_CPF }}</a></td>
                                            <td><a href="/pessoa/show/{{ $pessoa->id }}">{{ $pessoa->C001_NomePessoa }}</a></td>
                                            <td><a href="/pessoa/show/{{ $pessoa->id }}">{{ $pessoa->C001_Email }}</a></td>
                                            <td class="d-flex">
                                                <a href="/pessoa/edit/{{ $pessoa->id }}" class="btn btn-primary mr-2">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                    </svg>
                                                </a>
                                                <form action="{{ route('pessoa_delete', ['id'=> $pessoa->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
                                                            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
                                                            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                                        </svg>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                            @if(isset($filters))
                                {{ $pessoas->appends($filters)->links() }}
                            @else
                                {{ $pessoas->links() }}
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
