<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Al crear el modelo vemos que se crea la clase con el nombre que hemos puesto en el comando y lo
// extiende del la clase Model, de este modo podremos hacer uso de los métodos de la clase Model
// es decir, podremos utilizar el ORM de Laravel para administrar la base de datos
class Curso extends Model
{
    use HasFactory;

    // Con este código indicamos que la tabla que va a utilizar el modelo será distina a la que le indicamos 
    // en la convención, en este caso en vez de utilizar la tabla "curso" utilizaremos "users"
    // protected $table = 'users';
}
