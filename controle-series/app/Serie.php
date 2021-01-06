<?php

namespace App;

use App\Models\Temporada;
use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $table = 'series';

    // Para nao adicionar os campos "updated_at" e "created_at"
    public $timestamps = false;
    protected $fillable = ['nome'];

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
}
