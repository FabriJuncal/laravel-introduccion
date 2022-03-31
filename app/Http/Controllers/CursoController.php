<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    // Por convención al metodo que mostrará la pantalla principal se le llama "index()"
    public function index(){

        // Curso::paginate() => Devuelve una colección de registros paginados
        // 1er parametro(Opcional, por defecto devuelve 15 registros): Cantidad de registros por página
        $cursos = Curso::paginate();

        // view() => Esta función accede a la carpeta "resources/views" y busca el archivo .php que se le pasa como parametro
        // para que se encuentre la vista cabe destacar que hay que pasarle la ruta completa en el caso que el archivo .php
        // Se encuentre dentro de algún directorio

        // compact() => Esta función crea un array con los parametros que se le pasan como parametros y el resultado en este caso es:
        // ['cursos' => $cursos]
        return view('cursos/index', compact('cursos'));
    }

    // Por convención al metodo que mostrará la pantalla con un formulario (de alta por ejemplo) se le llama "create()"
    public function create(){
        // view() => Esta función accede a la carpeta "resources/views" y busca el archivo .php que se le pasa como parametro
        // para que se encuentre la vista cabe destacar que hay que pasarle la ruta completa en el caso que el archivo .php
        // Se encuentre dentro de algún directorio
        return view('cursos/create');
    }

    // Por convención al metodo que mostrará la pantalla con la descripción de un elemento (Producto, Curso, etc) se le llama "show()"
    public function show($id){
        
        // Curso::find() => Devuelve un registro de la tabla "cursos" filtrado por el ID pasado como parametro
        $curso = Curso::find($id);

        // view() => Esta función accede a la carpeta "resources/views" y busca el archivo .php que se le pasa como parametro
        // para que se encuentre la vista cabe destacar que hay que pasarle la ruta completa en el caso que el archivo .php
        // Se encuentre dentro de algún directorio

        // compact() => Esta función crea un array con los parametros que se le pasan como parametros y el resultado en este caso es:
        // ['curso' => $curso]
        return view('cursos/show', compact('curso'));
    }
}
