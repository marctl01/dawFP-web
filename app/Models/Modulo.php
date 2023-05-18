<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function ufs()
    {
        return $this->hasMany(Uf::class);
    }

    public function evaluaciones()
    {
        return $this->hasMany(Evaluacion::class);
    }
}
