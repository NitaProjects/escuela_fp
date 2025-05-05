<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modul extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'professor_id'];

    public function ufs() {
        return $this->hasMany(Uf::class);
    }

    public function professor() {
        return $this->belongsTo(Professor::class);
    }

    public function alumnes() {
        return $this->hasManyThrough(Alumne::class, Avaluacio::class, 'modul_id', 'id', 'id', 'alumne_id');
    }
}
