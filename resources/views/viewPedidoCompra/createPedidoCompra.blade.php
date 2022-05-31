@extends('adminlte::page')

@section('title', 'Cadastro de Pedido')

@section('content_header')
    <button class="btn btn-success col col-12" disabled="disabled"><h1>Software Engineer</h1></button>
@stop

{{-- Bloco responsável pelo funcionamento dos campos de Busca da Tela de Controle de Veículos --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

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
                                <h3
                                    class="card-title">DADOS DO PEDIDO N° &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                    <small>Data: </small>
                                    <h5 style="text-align: right">Total: </h5>
                                </h3>
                            </div>
                            <div class="order_callback"></div>
                            <form method="post" id="quickForm" novalidate="novalidate">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="pessoa">Cliente</label>
                                        <select type="text" class="pessoaCliente form-control" name="pessoaCliente" required></select>
                                    </div>

                                    <button class="btn btn-primary col col-12" disabled="disabled" style="text-align: left"><h5>ITENS DO PEDIDO</h5></button>

                                    <div class="row justify-content-between mt-3">

                                        <div class="col col-2">
                                            <label for="valor">Valor</label>
                                            <input type="number" name="valor" class="form-control" id="valor" placeholder="Preço">
                                        </div>
                                        <div class="col col-2">
                                            <label for="quantidade">Quantidade</label>
                                            <input type="number" name="quantidade" class="form-control" id="quantidade" placeholder="Qtde">

                                        </div>

                                        <div class="col col-2" >
                                            <button type="button" class="btn btn-block btn-primary btn-sm" style="margin-top: 22.5%">INSERIR</button>
                                        </div>
                                    </div>
                                </div>
                                <!- Divisão ->
                                <button class="btn btn-primary col col-12" disabled="disabled"></button>

                                <div class="form-group">
                                    <table class="table table-striped list">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Código</th>
                                            <th scope="col">Descrição</th>
                                            <th scope="col">Preço</th>
                                            <th scope="col">Quantidade</th>
                                            <th scope="col">ValorTotal</th>
                                            <th scope="col">...</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>-</th>
                                                <th>-</th>
                                                <th>-</th>
                                                <th>-</th>
                                                <th>-</th>
                                                <th>-</th>
                                                <th>-</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!- ------------------------------------------------------------------------- ->
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        $(document).ready(function() {
            $('.produto').select2();
        });
    </script>

@endsection
