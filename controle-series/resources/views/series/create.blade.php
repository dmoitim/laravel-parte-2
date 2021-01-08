@extends('layout')

@section('cabecalho')
Adicionar Série
@endsection

@section('conteudo')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form method="POST">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <label for="nome" class="">Nome</label>
            <input type="text" class="form-control" name="nome" id="nome" />
        </div>
        <div class="col-md-2">
            <label for="qtd_temporadas" class="">Nº temporadas</label>
            <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas" />
        </div>
        <div class="col-md-2">
            <label for="pe_por_temporada" class="">Ep por temporada</label>
            <input type="number" class="form-control" name="pe_por_temporada" id="pe_por_temporada" />
        </div>
    </div>

    <button class="btn btn-primary mt-2">Adicionar</button>
</form>
@endsection