@extends('layout')

@section('cabecalho')
Temporadas da série {{ $serie->nome }}
@endsection

@section('conteudo')
@if(!empty($mensagem))
<div class="alert alert-success">
    {{ $mensagem }}
</div>
@endif

<ul class="list-group">
    @foreach ($temporadas as $temporada)
    <li class="list-group-item d-flex justify-content-between align-items-center">
        <a href="#">
            Temporada {{ $temporada->numero }}
        </a>
        <span class="badge badge-secondary">
            0 / {{ $temporada->episodios->count() }}
        </span>
    </li>
    @endforeach
</ul>
@endsection