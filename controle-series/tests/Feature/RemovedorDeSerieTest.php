<?php

namespace Tests\Feature;

use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RemovedorDeSerieTest extends TestCase
{
    use RefreshDatabase;

    /** @var Serie */
    private $serieCriada;

    protected function setUp(): void
    {
        parent::setUp();

        $criadorDeSerie = new CriadorDeSerie();
        $nomeSerie = 'Nome de teste';
        $this->serieCriada = $criadorDeSerie->criarSerie($nomeSerie, 1, 1);
    }

    public function testRemoverUmaSerie()
    {
        $this->assertDatabaseHas('series', ['id' => $this->serieCriada->id]);

        $removedorDeSerie = new RemovedorDeSerie();
        $nomeSerie = $removedorDeSerie->removerSerie($this->serieCriada->id);

        $this->assertIsString($nomeSerie);
        $this->assertEquals('Nome de teste', $nomeSerie);
        $this->assertDatabaseMissing('series', ['id' => $this->serieCriada->id]);
    }
}
