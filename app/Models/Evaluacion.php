<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'modulo_id', 'unidadf_id', 'nota'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function modulo()
    {
        return $this->belongsTo(Modulo::class);
    }

    public function unidadf()
    {
        return $this->belongsTo(Uf::class);
    }
}
