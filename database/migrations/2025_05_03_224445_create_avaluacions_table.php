<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('avaluacions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alumne_id')->constrained('alumnes')->onDelete('cascade');
            $table->foreignId('uf_id')->constrained('ufs')->onDelete('cascade');
            $table->integer('nota')->nullable();
            $table->timestamps();
            $table->unique(['alumne_id','uf_id']); // cada alumno+uf único (evitar duplicadas)
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avaluacions');
    }
};
