{{-- @extends => Al igual que la función view(), la expresión @extends() busca dentro del directorio "view" a diferencia
                 que esta expresión se utiliza para importar las Plantillas de Blade --}}
                 @extends('layouts/plantilla')

                 {{-- @section(1er_parametro, 2do_parametro) => Se utiliza esta expresión para definir el valor los parametros que se le enviará a la plantilla de blade --}}
                 {{-- 1er_parametro: Definimos el nombre del parametro declarado en la plantilla --}}
                 {{-- 2do_parametro: Pasamos un valor que se mostrará en la plantilla  --}}
                 @section('title', 'Cursos edit')
                 
                 {{-- @section(1er_parametro, 2do_parametro) => Se utiliza esta expresión para definir el valor los parametros que se le enviará a la plantilla de blade --}}
                 {{-- 1er_parametro: Definimos el nombre del parametro declarado en la plantilla --}}
                 @section('content')
                     {{-- Utilizamos esta sintaxis para poder agregar contenido HTML extenso como valor que se pasará a la plantilla --}}
                     <h1>En esta página podrás editar un curso</h1>
                     {{-- Creamos el formulario y agregamos en el atributo "action" la referencía de la ruta que actualizará el curso --}}
                     <form action="{{ route('cursos.update', $curso) }}" method="post">

                        {{-- @csrf: es necesaria esta referencia al realizar una petición "post" o "put", ya que ese crea un ID para validar la petición enviada --}}
                         @csrf

                         {{-- Supuestamente esta era la manera de enviar una petición "put", pero no funciona --}}
                         {{-- @method('put') --}}
                        
                         {{-- Cargamos los campos con los valores del objeto Curso que se le paso como parametro al hacer la redirección a esta página --}}
                         <label>
                             Nombre:
                             <br>
                             <input type="text" name="name" value={{ $curso->name }}>
                         </label>
                 
                         <br>
                 
                         <label>
                             Descripción:
                             <br>
                             <textarea name="description" row="5">{{ $curso->description }}</textarea>
                         </label>
                         
                         <br>
                 
                         <label>
                             Categoría:
                             <br>
                             <input type="text" name="categoria" value={{ $curso->categoria }}>
                         </label>
                 
                         <br>
                         
                         {{-- Esta es la manera que funcionó enviar la petición "PUT" --}}
                         <input type="hidden" name="_method" value="PUT">
                         <button type="submit">Actualizar formulario</button>
                 
                     </form>
                 
                 @endsection 
                 {{-- Fin de la declaración del campo "content" --}}