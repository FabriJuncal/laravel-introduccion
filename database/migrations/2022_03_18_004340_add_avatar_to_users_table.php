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
        // Schema::table() => Crea una nueva columna en la tabla seleccionada
        // 1er_parametro => El nombre de la tabla a la que se le agregarán las columnas
        // 2do_parametro => Una instancia de la clase Blueprint (Esta instancia se utiliza para crear las columnas)
        Schema::table('users', function (Blueprint $table) {
            // Crea una columna llamada "avatar" de tipo "string" y de longitud "255" y la coloca despues de la columna "name"
            $table->string('avatar')->nullable()->after('email');
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
            // Elimina la columna "avatar" de la tabla "users"
            $table->dropColumn('avatar');
        });
    }
};
