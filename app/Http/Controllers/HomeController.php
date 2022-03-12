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
        // view() => Esta función accede a la carpeta "resources/views" y busca el archivo .php que se le pasa como parametro
        // para que se encuentre la vista cabe destacar que hay que pasarle la ruta completa en el caso que el archivo .php
        // Se encuentre dentro de algún directorio
        return view('home');
    }
}
