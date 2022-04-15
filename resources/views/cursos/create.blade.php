{{-- @extends => Al igual que la función view(), la expresión @extends() busca dentro del directorio "view" a diferencia
                 que esta expresión se utiliza para importar las Plantillas de Blade --}}
@extends('layouts/plantilla')

{{-- @section(1er_parametro, 2do_parametro) => Se utiliza esta expresión para definir el valor los parametros que se le enviará a la plantilla de blade --}}
{{-- 1er_parametro: Definimos el nombre del parametro declarado en la plantilla --}}
{{-- 2do_parametro: Pasamos un valor que se mostrará en la plantilla  --}}
@section('title', 'Cursos create')

{{-- @section(1er_parametro, 2do_parametro) => Se utiliza esta expresión para definir el valor los parametros que se le enviará a la plantilla de blade --}}
{{-- 1er_parametro: Definimos el nombre del parametro declarado en la plantilla --}}
@section('content')
    {{-- Utilizamos esta sintaxis para poder agregar contenido HTML extenso como valor que se pasará a la plantilla --}}
    <h1>En esta página podrás crear un curso</h1>
    {{-- Creamos el formulario y agregamos en el atributo "action" la referencía de la ruta que creará el curso --}}
    <form action="{{ route('cursos.store') }}" method="POST">

        {{-- @csrf: es necesaria esta referencia al realizar una petición "post" o "put", ya que ese crea un ID para validar la petición enviada --}}
        @csrf

        <label>
            Nombre:
            <br>
            {{-- old([NOMBRE_CAMPO]) => La función "old()" recibe como parametro el nombre del campo y
                 al recargarse la página cuando se envía el formulario este obtiene el valor que tenía anteriormente --}}
            <input type="text" name="name" value="{{ old('name') }}">
        </label>

        {{-- Obtenemos el error relacionado al campo "name" al enviar el formulario --}}
        @error('name')
            <br>
            <small>*{{ $message }}</small>
            <br>
        @enderror

        <br>

        <label>
            Descripción:
            <br>
            <textarea name="description" row="5">{{ old('description') }}</textarea>
        </label>

        {{-- Obtenemos el error relacionado al campo "description" al enviar el formulario --}}
        @error('description')
            <br>
            <small>*{{ $message }}</small>
            <br>
        @enderror
        
        <br>

        <label>
            Categoría:
            <br>
            <input type="text" name="categoria" value="{{ old('categoria') }}">
        </label>

        {{-- Obtenemos el error relacionado al campo "categoria" al enviar el formulario --}}
        @error('categoria')
            <br>
            <small>*{{ $message }}</small>
            <br>
        @enderror

        <br>

        <button type="submit">Enviar formulario</button>

    </form>

@endsection 
{{-- Fin de la declaración del campo "content" --}}