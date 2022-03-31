<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Casts\Attribute;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // MUTADOR:
    // Creamos un Mutador llamado "name" como el nombre del campo que vamos a modificar
    // Attribute: es una clase de Laravel que nos permite modificar los valores de los campos
    protected function name(): Attribute
    {

        /* MANERA LARGA */

        // Instanciamos una nueva clase Attribute
        // return new Attribute(

            // get: es un método de la clase Attribute que nos permite modificar el valor del campo cuando lo obtenemos desde la base de datos
            // Le pasamos el valor del campo que queremos modificar
            // get: function ($value){
            //     // con la función "ucwords" convertimos la 1ra letra de cada palabra en mayúscula
            //     return ucwords($value);
            // },
            // // set: es un método de la clase Attribute que nos permite modificar el valor del campo cuando lo insertemos en la base de datos
            // // Le pasamos el valor del campo que queremos modificar
            // set: function ($value) {
            //     // Si el valor del campo es un string lo convertimos a minúsculas con la función "strtolower"
            //     return strtolower($value);
            // }
        // );
// ==============================================================================================================================================================
            /* MANERA CORTA */
            
        return new Attribute(
            // get: es un método de la clase Attribute que nos permite modificar el valor del campo cuando lo obtenemos desde la base de datos
            // Le pasamos el valor del campo que queremos modificar
            // con la función "ucwords" convertimos la 1ra letra de cada palabra en mayúscula
            get: fn($value) => ucwords($value),
            // set: es un método de la clase Attribute que nos permite modificar el valor del campo cuando lo insertemos en la base de datos
            // Le pasamos el valor del campo que queremos modificar
            // Si el valor del campo es un string lo convertimos a minúsculas con la función "strtolower"
            set: fn($value) => strtolower($value)
        );

    }

    // EJEMPLO:
    /* 
    
    C:\xampp_php8\htdocs\laravel-introduccion>php artisan tinker
    Psy Shell v0.11.2 (PHP 8.1.2 — cli) by Justin Hileman
   
    >>> use App\Models\User;
    >>> $user = new User();
    => App\Models\User {#3495}
    >>> $user->name = "ViCtOr ArAnA";
    => "ViCtOr ArAnA"
    >>> $user->email = "victor@codersfree.com";
    => "victor@codersfree.com"
    >>> $user->password = bcrypt("12345678");
    => "$2y$10$3GA3sFh2JHOml85DHMSEA.kZNT4Om3H/zfh7smybhm9X/km7.i/V2"
    >>> $user->save();
    => true
    >>>
    
    */
}