@extends('layout')

@section('cabecalho')
Episódios
@endsection

@section('conteudo')
@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

<ul class="list-group">
    <form action="">
        @foreach ($episodios as $episodio)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Episódio {{ $episodio->numero }}
            <input type="checkbox" name="" id="">
        </li>
        @endforeach

        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form>
</ul>
@endsection