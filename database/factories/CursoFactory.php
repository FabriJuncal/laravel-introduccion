<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */

// Al crear el Factory vemos que se crea la clase con el nombre que hemos definido en el comando y lo
// extiende del la clase Factory, de este modo podremos hacer uso de los métodos de la clase Factory
// es decir, podremos utilizar todos los métodos de la clase Factory
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {   

        // Creamos un nombre aletario para el curso
        // El sentence() es un método de la clase Faker que genera una frase aleatoria
        $name = $this->faker->sentence();

        // En el return devolvemos un array con los datos que queremos que se carguen con registros de relleno
        return [
            'name' => $name, 
            'slug' => Str::slug($name, '-'), // Str::slug(): Convierte el texto que le pasemos como 1er parametro en minuscula y convierte los espacios en el caracter que le pasemos como 2do parametro
            'description' => $this->faker->paragraph(), // El paragraph() es un método de la clase Faker que genera un parrafo aleatorio
            'categoria' => $this->faker->randomElement(['Desarrollo Web', 'Desarrollo Móvil', 'Diseño Web']), // El randomElement() es un método de la clase Faker que genera un elemento aleatorio de un array
        ];
    }
}
