<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{   
    //__invoke: Método magico que se ejecuta cuando se llama a la clase como un objeto
    // Se utiliza cuando se quiere invocar una clase con un unico metodo
    // Tambien se utiliza cuando queremos que el Controlador administre una unica Ruta
    public function __invoke()
    {
        // return view('welcome');
        return "Bienvenido a la página principal";
    }
}
