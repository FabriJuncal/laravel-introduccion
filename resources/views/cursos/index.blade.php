{{-- @extends => Al igual que la función view(), la expresión @extends() busca dentro del directorio "view" a diferencia
                 que esta expresión se utiliza para importar las Plantillas de Blade --}}
@extends('layouts/plantilla')

{{-- @section(1er_parametro, 2do_parametro) => Se utiliza esta expresión para definir el valor los parametros que se le enviará a la plantilla de blade --}}
{{-- 1er_parametro: Definimos el nombre del parametro declarado en la plantilla --}}
{{-- 2do_parametro: Pasamos un valor que se mostrará en la plantilla  --}}
@section('title', 'Cursos')

{{-- @section(1er_parametro, 2do_parametro) => Se utiliza esta expresión para definir el valor los parametros que se le enviará a la plantilla de blade --}}
{{-- 1er_parametro: Definimos el nombre del parametro declarado en la plantilla --}}
@section('content')
    {{-- Utilizamos esta sintaxis para poder agregar contenido HTML extenso como valor que se pasará a la plantilla --}}
    <h1>Bienvenido a la página principal</h1>

    {{-- route('cursos.create') => Pasamos como parametro el nombre que hace referencia a la ruta definida en el archivo "routes\web.php" --}}
    <a href="{{ route('cursos.create') }}">Crear curso</a>
    <ul>
        {{-- Bucle repetitivo que obtiene los datos de la variable "$cursos" que pasamos como parametro en el archivo "app\Http\Controllers\CursoController.php" --}}
        {{-- y le asigna cada valor a la variable "$curso" --}}
        @foreach ($cursos as $curso)

            <li>
                {{-- route('cursos.show') => Pasamos como parametro el nombre que hace referencia a la ruta definida en el archivo "routes\web.php" --}}
                {{-- $curso->name => Obtenemos el nombre del objeto "curso" y lo mostramos --}}
                <a href="{{ route('cursos.show', $curso) }}">{{ $curso->name }}</a>
            </li>
            
        @endforeach 
        {{-- Fin del bucle "foreach" --}}
    </ul>

    {{-- Obtenemos los links de páginación (Botones, iconos, nros de página, etc) --}}
    {{ $cursos->links() }}

@endsection 
{{-- Fin de la declaración del campo "content" --}}