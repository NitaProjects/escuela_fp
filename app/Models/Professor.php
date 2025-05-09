<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;

    protected $fillable = ['nom', 'email', 'user_id'];

    public function moduls()
    {
        return $this->hasMany(Modul::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
