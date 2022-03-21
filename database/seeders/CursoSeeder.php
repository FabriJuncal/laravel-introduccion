<?php

namespace Database\Seeders;

use App\Models\Curso;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Al crear el Seeder vemos que se crea la clase con el nombre que hemos puesto en el comando y lo
// extiende del la clase Sedeer, de este modo podremos hacer uso de los métodos de la clase Seeder
// es decir, podremos utilizar todos los métodos de la clase Seeder
class CursoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Instanciamos el modelo Curso
        $curso = new Curso();
        // Definimos los atributos del modelo Curso
        $curso->nombre = 'Laravel';
        $curso->descripcion = 'El mejor framework de PHP';
        $curso->categoria = 'Desarrollo Web';
        // Insertamos en la base de datos
        $curso->save();

        // Instanciamos el modelo Curso
        $curso2 = new Curso();
        // Definimos los atributos del modelo Curso
        $curso2->nombre = 'Laravel';
        $curso2->descripcion = 'El mejor framework de PHP';
        $curso2->categoria = 'Desarrollo Web';
        // Insertamos en la base de datos
        $curso2->save();
        // Instanciamos el modelo Curso
        $curso3 = new Curso();
        // Definimos los atributos del modelo Curso
        $curso3->nombre = 'Laravel';
        $curso3->descripcion = 'El mejor framework de PHP';
        $curso3->categoria = 'Desarrollo Web';
        // Insertamos en la base de datos
        $curso3->save();
    }
}
