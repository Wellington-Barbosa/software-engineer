@extends('adminlte::page')

@section('title', 'Edição de Produto')

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
                                <h3 class="card-title">Editando dados do produto {{ $produto->C002_DescricaoProduto }} <small></small></h3>
                            </div>
                            <form action="/produto/edit" method="post">

                                <input type="hidden" name="id" id="id" value="{{ $produto->id }}">
                                <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>

                                @csrf

                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="codigoBarras">Código de Barras</label>
                                        <input type="text" name="codigoBarras" class="form-control" id="codigoBarras" value="{{ $produto->C002_CodigoBarras }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="descProduto">Descrição</label>
                                        <input type="text" name="descProduto" class="form-control" id="descProduto" value="{{ $produto->C002_DescricaoProduto }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="valorUnitario">Valor Unitário</label>
                                        <input type="number" name="valorUnitario" class="form-control" id="valorUnitario" value="{{ $produto->C002_ValorUnitario }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="quantidade">Quantidade</label>
                                        <input type="number" name="quantidade" class="form-control" id="quantidade" value="{{ $produto->C002_Quantidade }}">
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
