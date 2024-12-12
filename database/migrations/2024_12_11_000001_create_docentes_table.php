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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 32)->nullable(false);
            $table->string('apellidos', 32)->nullable();
            $table->string('direccion')->nullable();
            $table->enum ('departamento', ['Administración', 'Comercio', 'Informática', 'Relaciones con las empresas', 'DIOP', 'Innovación'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('docentes', function (Blueprint $table) {
            //
        });
    }
};
