<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use Symfony\Component\HttpFoundation\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $nome = $request->nome;
        $serie = Serie::create([
            'nome' => $nome
        ]);

        $qtd_temporadas = $request->qtd_temporadas;
        $ep_por_temporada = $request->ep_por_temporada;

        for ($i = 1; $i <= $qtd_temporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            for ($j = 1; $j <= $ep_por_temporada; $j++) {
                $episodio = $temporada->episodios()->create(['numero' => $j]);
            }
        }

        $request->session()->flash(
            'mensagem',
            "Série {$serie->nome} e suas temporadas e episódios criados com sucesso."
        );

        return redirect()->route('listar_series');
    }

    public function destroy(Request $request)
    {
        $id = $request->id;

        Serie::destroy($id);

        $request->session()->flash(
            'mensagem',
            "Série ID {$id} excluída com sucesso."
        );

        return redirect()->route('listar_series');
    }
}
