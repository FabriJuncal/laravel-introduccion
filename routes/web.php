<?php

use Illuminate\Support\Facades\Route;
use Ramsey\Uuid\Math\RoundingMode;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar las rutas web para su aplicación.
| Estas rutas son cargadas por el RouteServiceProvider dentro de un grupo que
| contiene el grupo de middleware "web". ¡Ahora crea algo grandioso!

|
*/

/*
| El archivo  "routes/web.php" define rutas que son para su interfaz web. 
| A estas rutas se les asigna el webgrupo de middleware, que proporciona características
| como el estado de la sesión y la protección CSRF. Las rutas en "routes/api.php" no tienen estado
| y se asignan al api grupo de middleware.
*/

// Sintaxis que se utiliza para definir una Ruta con el verbo Get, en el cual ejecuta la vista 'welcome'
// si se accede a esta ruta
// Route::get('/', function () {
//     return view('welcome');
// });

// Retornamos un string si se accede a la ruta principal
Route::get('/', function () {
    // return view('welcome');
    return "Bienvenido a la página principal";
});

// Retornamos un string si se accede a la rita 
Route::get('cursos/create', function () {
    return "En esta página podrás crear un curso";
});

// Obtenemos datos de la URL y lo mostramos por pantalla
Route::get('cursos/{curso}', function ($curso) {
    return "Bienvenido al curso: $curso";
});

// Enviamos dos variables desde la URL y lo obtenemos con la función anonima para retornar un valor
// {categoria?}: En la variable categoria tiene el caracter "?" para indicar que es opcional,
// Para que sea del todo opcional tambien se debe agregar el valor por defecto en la función anonima
Route::get('cursos/{curso}/{categoria?}', function ($curso, $categoria = null) {
    
    if($categoria){
        return "Bienvendio al curso $curso, de la categoría $categoria";#
    }else{
        return "Bienvendio al curso $curso";
    }
});