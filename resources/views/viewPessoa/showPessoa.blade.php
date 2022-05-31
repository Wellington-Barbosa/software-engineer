@extends('adminlte::page')

@section('title', 'Cadastro do Cliente')

@section('content_header')
    <button class="btn btn-success col col-12" disabled="disabled"><h1>Software Engineer</h1></button>
@stop

@section('content')

    <!- Primeira linha ->
    <div class="content-center" style="min-height: 2172.31px;" >
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Dados do(a) cliente {{ $pessoa->C001_NomePessoa }} <small></small></h3>
                            </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="codigoPessoa">CPF</label>
                                        <input type="text" name="codigoPessoa" class="form-control" id="codigoPessoa" disabled="disabled" value="{{ $pessoa->C001_CPF }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nomePessoa">Nome</label>
                                        <input type="text" name="nomePessoa" class="form-control" id="nomePessoa" disabled="disabled" value="{{ $pessoa->C001_NomePessoa }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">E-mail</label>
                                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" disabled="disabled" value="{{ $pessoa->C001_Email }}">
                                    </div>
                                </div>
                                <div class="col-lg-12" style="text-align: right;" >
                                    <button type="button" class="btn btn-primary" value="voltar" onclick="history.go(-1)">Voltar</button>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
