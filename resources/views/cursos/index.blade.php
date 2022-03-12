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
@endsection 
{{-- Fin de la declaración del campo "content" --}}