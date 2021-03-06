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
        // Schema::create() => Crea una nueva tabla en la base de datos
        // 1er_parametro => El nombre de la tabla
        // 2do_parametro => Una instancia de la clase Blueprint (Esta instancia se utiliza para creaer las columnas)
        Schema::create('cursos', function (Blueprint $table) {
            $table->id(); // Crea una columna llamada "id" de tipo "integer" y de longitud "11"
            $table->string('name'); // Crea una columna llamada "name" de tipo "string" y de longitud "255"
            $table->string('slug'); // Crea una columna llamada "slug" de tipo "string" y de longitud "255" (Para las Rutas Amigables)
            $table->text('description'); // Crea una columna llamada "description" de tipo "text"
            $table->text('categoria'); // Crea una columna llamada "categoria" de tipo "text"
            $table->timestamps(); // Crea dos columnas llamadas "created_at" y "updated_at" de tipo "timestamp"
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists() => Elimina una tabla que exista en la base de datos
        // 1er_parametro => El nombre de la tabla
        Schema::dropIfExists('cursos');
    }
};
