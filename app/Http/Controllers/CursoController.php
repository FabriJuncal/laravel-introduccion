<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CursoController extends Controller
{
    // Por convención al metodo que mostrará la pantalla principal se le llama "index()"
    public function index(){

        // Curso::paginate() => Devuelve una colección de registros paginados
        // orderBy('id', 'desc') => Ordena los registros obtenidos por el campo "id" en forma descendente
        // 1er parametro(Opcional, por defecto devuelve 15 registros): Cantidad de registros por página
        $cursos = Curso::orderBy('id', 'desc')->paginate();

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

    // Por convención al metodo que creará un elemento (Producto, Curso, etc) se le llama "store()"
    // La instancia Request es necesaria para obtener los datos del formulario cuando se realiza una petición POST o PUT
    public function store(Request $request){

        // Validamos los datos que se reciben del formulario, en este caso se validan que los campos no estén vacíos
        // Si no se cumplen las reglas de validación se redirige a la vista "create".
        // Las validaciones se van realizando en el orden de Izquierda a Derecha, por lo tanto 1ro va a verificar que el campo "name" no esté vacío
        $request->validate([
            'name' => 'required|max:10',
            'description' => 'required|min:5',
            'categoria' => 'required',
        ]);

        // Instanciamos un nuevo objeto de la clase Curso
        $curso = new Curso();

        $name = $request->name;

        $curso->name = $name;
        // Agregamos el campo "slug" al objeto Curso para las URL's amigables
        // Str::slug(): Convierte el texto que le pasemos como 1er parametro en minuscula y convierte los espacios en el caracter que le pasemos como 2do parametro
        $curso->slug = Str::slug($name, '-');
        $curso->description = $request->description;
        $curso->categoria = $request->categoria;
        $curso->save();

        // Redireccionamos a la página del curso creado
        // redirect() => Esta función redirecciona a una ruta
        // route() => Esta función devuelve la ruta completa
        // 1er parametro: Ruta a la que se quiere redireccionar (En este caso se pasó una Vista que hace referencia a una ruta)
        // 2do parametro: Se le pasa el ID del curso creado, con solo pasarle el objeto del curso creado Laravel ya encuentra el ID de este
        return redirect()->route('cursos.show', $curso);
    }

    // Por convención al metodo que mostrará la pantalla con la descripción de un elemento (Producto, Curso, etc) se le llama "show()"
    // Se puede realizar una instancia al pasar como parametro de la función, de este modo reducimos el codigo
    // En este caso se realizó una instancia del objeto "Curso"
    public function show(Curso $curso){
        
        // Al agregar "Curso $curso" como parametro de la función Laravel entiende que el parametro que estamos
        // pasando es una instancia de la clase Cursos y nos devuelve el objeto filtrado por su ID y de esta
        // manera nos ahorramos de escribír 
        // $curso = Curso::find($id);

        // Curso::find() => Devuelve un registro de la tabla "cursos" filtrado por el ID pasado como parametro
        // $curso = Curso::find($id);

        // view() => Esta función accede a la carpeta "resources/views" y busca el archivo .php que se le pasa como parametro
        // para que se encuentre la vista cabe destacar que hay que pasarle la ruta completa en el caso que el archivo .php
        // Se encuentre dentro de algún directorio

        // compact() => Esta función crea un array con los parametros que se le pasan como parametros y el resultado en este caso es:
        // ['curso' => $curso]
        return view('cursos/show', compact('curso'));
    }

    // Por convención al metodo que mostrará la pantalla con un formulario (de editar por ejemplo) se le llama "edit()"
    // Se puede realizar una instancia al pasar como parametro de la función, de este modo reducimos el codigo
    // En este caso se realizó una instancia del objeto "Curso"
    public function edit(Curso $curso){
        // Mostramos la Vista de la página de edición
        return view('cursos/edit', compact('curso'));
    }

    // Por convención al metodo que actualizará un elemento (Producto, Curso, etc) se le llama "update()"
    // La instancia Request es necesaria para obtener los datos del formulario cuando se realiza una petición POST o PUT
    // Se puede realizar una instancia al pasar como parametro de la función, de este modo reducimos el codigo
    // En este caso se realizó una instancia del objeto "Curso"
    public function update(Request $request, Curso $curso){

        // Validamos los datos que se reciben del formulario, en este caso se validan que los campos no estén vacíos
        // Si no se cumplen las reglas de validación se redirige a la vista "create".
        // Las validaciones se van realizando en el orden de Izquierda a Derecha, por lo tanto 1ro va a verificar que el campo "name" no esté vacío
        $request->validate([
            'name' => 'required|max:10',
            'description' => 'required|min:5',
            'categoria' => 'required',
        ]);

        // No hace falta que instancemos el objeto Curso porque Laravel ya lo hace por nosotros
        // al instancar el objeto Curso en el parametro $curso de la función
        // de esta forma Laravel ya filtra el curso por el id que contiene el objeto Curso
        // y nos ayuda a actualizar los datos

        $name = $request->name;

        // Agregamos el campo "slug" al objeto Curso para las URL's amigables
        // Str::slug(): Convierte el texto que le pasemos como 1er parametro en minuscula y convierte los espacios en el caracter que le pasemos como 2do parametro
        $curso->slug = Str::slug($name, '-');
        $curso->description = $request->description;
        $curso->categoria = $request->categoria;
        $curso->save();

        // Redireccionamos a la página del curso creado
        // redirect() => Esta función redirecciona a una ruta
        // route() => Esta función devuelve la ruta completa
        // 1er parametro: Ruta a la que se quiere redireccionar (En este caso se pasó una Vista que hace referencia a una ruta)
        // 2do parametro: Se le pasa el ID del curso creado, con solo pasarle el objeto del curso creado Laravel ya encuentra el ID de este
        return redirect()->route('cursos.show', $curso);
    }

    // Por convención al metodo que eliminará un elemento (Producto, Curso, etc) se le llama "destroy()"
    // Se puede realizar una instancia al pasar como parametro de la función, de este modo reducimos el codigo
    // En este caso se realizó una instancia del objeto "Curso"
    public function destroy(Curso $curso){
        // delete(): Este método se encargá de eliminar el registro de la base de datos
        $curso->delete();

        // Luego de eliminar el registro redireccionamos a la página principal
        return redirect()->route('cursos.index');
    }
}
