<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Modifica la columna llamada "name" de tipo "string" y le agrega una longitud  de "150" y define que tambien puede ser nulo
            $table->string('name', 150)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            // Modifica la columna llamada "name" de tipo "string" y le quita la longitud  de "150" y define que no puede ser nulo
            $table->string('name', 255)->nullable(false)->change();
        });
    }
};
