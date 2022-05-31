@extends('adminlte::page')

@section('title', 'Cadastro de Pessoa')

@section('content_header')
    <button class="btn btn-success col col-12" disabled="disabled"><h1>Software Engineer</h1></button>
@stop

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!- Primeira linha ->
    <div class="content-center" style="min-height: 2172.31px;" >
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Editando dados do(a) cliente {{ $pessoa->C001_NomePessoa }} <small></small></h3>
                            </div>
                            <form action="/pessoa/edit" method="post">

                                <input type="hidden" name="id" id="id" value="{{ $pessoa->id }}">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>

                                @csrf

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="codigoPessoa">CPF</label>
                                        <input type="text" name="codigoPessoa" class="form-control" id="codigoPessoa" value="{{ $pessoa->C001_CPF }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nomePessoa">Nome</label>
                                        <input type="text" name="nomePessoa" class="form-control" id="nomePessoa" value="{{ $pessoa->C001_NomePessoa }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">E-mail</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{ $pessoa->C001_Email }}">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Atualizar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop
