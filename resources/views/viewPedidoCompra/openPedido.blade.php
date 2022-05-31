@extends('adminlte::page')

@section('title', 'Pedido')

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

    @csrf
        <!- Primeira linha ->
        <div class="content-center" style="min-height: 2172.31px;" >
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Abrindo Pedido <small></small></h3>
                                </div>
                                <form action="/abrir/pedido" method="post" id="quickForm" novalidate="novalidate">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="dataPedido">Data do Pedido</label>
                                            <input type="text" name="dataPedido" class="form-control" id="dataPedido" value="{{ date('d/m/Y H:i') }}">
                                        </div>
                                        <div class="form-group">
                                            <div class="col col-12">
                                                <label for="pessoa">Cliente</label>
                                                <select id="codigoCliente" name="codigoCliente" class="codigoCliente form-control mb-3 {{ ($errors->has('pessoa') ? 'is-invalid' : '') }}">
                                                    <option value="">Selecione um cliente</option>
                                                    @foreach($pessoas as $pessoa)
                                                        <option value="{{ $pessoa->C001_CPF }}">{{ $pessoa->C001_CPF }} - {{ $pessoa->C001_NomePessoa }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label hidden="hidden" for="statusPedido">Status</label>
                                            <select hidden="hidden" name="statusPedido" id="statusPedido" class="form-control">
                                            <option value="0">Em aberto</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Abrir Pedido</button>
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

    <script>
        $(document).ready(function() {
            $('.codigoCliente').select2();
        });
    </script>

@endsection
