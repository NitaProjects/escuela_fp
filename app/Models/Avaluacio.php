<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaluacio extends Model
{
    protected $table = 'avaluacions';

    public function alumne()
    {
        return $this->belongsTo(Alumne::class);
    }
    public function uf()
    {
        return $this->belongsTo(Uf::class);
    }
    
    public function modul()
    {
        return $this->hasOneThrough(Modul::class, Uf::class, 'id', 'id', 'uf_id', 'modul_id');
    }
}
