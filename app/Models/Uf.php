<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uf extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'modul_id'];

    public function modul() {
        return $this->belongsTo(Modul::class);
    }

    public function avaluacions() {
        return $this->hasMany(Avaluacio::class, 'uf_id');
    }

    public function alumnes() {
        return $this->belongsToMany(Alumne::class, 'avaluacions', 'uf_id', 'alumne_id')
                    ->withPivot('nota')
                    ->withTimestamps();
    }
}
