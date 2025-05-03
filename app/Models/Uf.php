<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    /** @use HasFactory<\Database\Factories\UfFactory> */
    use HasFactory;

    public function modul() { //modul(): pertenece a un módulo – belongsTo (FK modul_id)
        return $this->belongsTo(Modul::class);
    }

    public function avaluacions() {
        return $this->hasMany(Avaluacio::class, 'uf_id');
    }

    public function alumnes() {
        return $this->belongsToMany(Alumne::class, 'avaluacions', 'uf_id', 'alumne_id')
                    ->withPivot('nota') //Agregamos withPivot('nota') para acceder al campo extra nota
                    ->withTimestamps(); //si queremos que Laravel mantenga automáticamente created_at/updated_at en la pivot. Esto nos permite, por ejemplo, hacer $uf->alumnes()->attach($alumneId, ['nota'=>8]) fácilmente
    }
}
