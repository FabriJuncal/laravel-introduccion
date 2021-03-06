{{-- @extends => Al igual que la función view(), la expresión @extends() busca dentro del directorio "view" a diferencia
                 que esta expresión se utiliza para importar las Plantillas de Blade --}}
@extends('layouts/plantilla')

{{-- @section(1er_parametro, 2do_parametro) => Se utiliza esta expresión para definir el valor los parametros que se le enviará a la plantilla de blade --}}
{{-- 1er_parametro: Definimos el nombre del parametro declarado en la plantilla --}}
{{-- 2do_parametro: Pasamos un valor que se mostrará en la plantilla  --}}
@section('title', 'Cursos ' . $curso)

{{-- @section(1er_parametro, 2do_parametro) => Se utiliza esta expresión para definir el valor los parametros que se le enviará a la plantilla de blade --}}
{{-- 1er_parametro: Definimos el nombre del parametro declarado en la plantilla --}}
@section('content')
    {{-- Utilizamos esta sintaxis para poder agregar contenido HTML extenso como valor que se pasará a la plantilla --}}
    <h1>Bienvenido al curso: {{ $curso->name }}</h1>

    {{-- route('cursos.index') => Pasamos como parametro el nombre que hace referencia a la ruta definida en el archivo "routes\web.php" --}}
    <a href="{{ route('cursos.index') }}">Volver a cursos</a>
    <br>
    {{--  route('cursos.edit', $curso) => Pasamos como 1er parametro el nombre que hace referencia a la ruta definida en el archivo "routes\web.php" 
                                          y como 2do parametro la instancia del objeto que se quiere editar--}}
    <a href="{{ route('cursos.edit', $curso) }}">Editar curso</a>
    {{-- $curso->categoria => Obtenemos la categoria del objeto "curso" y lo mostramos --}}
    <p><strong>Categoria:</strong> {{ $curso->categoria }} </p>
    {{-- $curso->description => Obtenemos la descripción del objeto "curso" y lo mostramos --}}
    <p>{{ $curso->description }} </p>


    <form action="{{ route('cursos.destroy', $curso) }}" method="POST">
        @csrf
        {{-- Supuestamente esta era la manera de enviar una petición "delete", pero no funciona --}}
        {{-- @method('delete') --}}

        {{-- Esta es la manera que funcionó enviar la petición "DELETE" --}}
        <input type="hidden" name="_method" value="DELETE">
        <button type="submit">Eliminar</button>
    </form>

@endsection 
{{-- Fin de la declaración del campo "content" --}}