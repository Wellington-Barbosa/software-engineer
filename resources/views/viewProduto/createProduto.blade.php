@extends('adminlte::page')

@section('title', 'Cadastro de Produto')

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
                                <h3 class="card-title">Cadastro de Produto <small></small></h3>
                            </div>
                            <form method="post" id="quickForm" novalidate="novalidate">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="codigoBarras">Código de Barras</label>
                                        <input type="number" name="codigoBarras" class="form-control" id="codigoBarras" placeholder="Informe o código de barras">
                                    </div>
                                    <div class="form-group">
                                        <label for="descProduto">Descrição</label>
                                        <input type="text" name="descProduto" class="form-control" id="descProduto" placeholder="Digite o nome do Produto">
                                    </div>
                                    <div class="form-group">
                                        <label for="valorUnitario">Valor Unitário</label>
                                        <input type="number" name="valorUnitario" class="form-control" id="valorUnitario" placeholder="Informe o valor do Produto R$">
                                    </div>
                                    <div class="form-group">
                                        <label for="quantidade">Quantidade</label>
                                        <input type="number" name="quantidade" class="form-control" id="quantidade" placeholder="Informe a quantidade">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Salvar</button>
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
