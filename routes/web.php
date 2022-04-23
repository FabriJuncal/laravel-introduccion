<?php


// Importamos el Controlador "HomeController"
use App\Http\Controllers\HomeController;
// Importamos el Controlador "CursoController"
use App\Http\Controllers\CursoController;
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

// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Retornamos un string si se accede a la ruta principal
// HomeController::class => Llamamos al controlador HomeController y buscará el método magíco "__invoke"

Route::get('/', HomeController::class);

// Forma: Laravel 7
// Route::get('/', 'HomeController');
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// [CursoController::class, 'index'] => Agregamos como 1er parametro la clase del Controlador y como 2do parametro el nombre del método que queremos ejecutar
// Se utiliza esta sintaxis cuando se crea una Clase que Administrará varias Rutas con distintos Métodos

// Route::get('/cursos', [CursoController::class, 'index']);

// Forma: Laravel 7
// Route::get('/cursos', 'CursoController@index']);
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Retornamos un string si se accede a la rita 
// [CursoController::class, 'create'] => Agregamos como 1er parametro la clase del Controlador y como 2do parametro el nombre del método que queremos ejecutar
// Se utiliza esta sintaxis cuando se crea una Clase que Administrará varias Rutas con distintos Métodos

// Route::get('cursos/create', [CursoController::class, 'create']);

// Forma: Laravel 7
// Route::get('/cursos', 'CursoController@create']);
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Obtenemos datos de la URL encerrandolas en llaves "{}" y lo mostramos por pantalla
// [CursoController::class, 'show'] => Agregamos como 1er parametro la clase del Controlador y como 2do parametro el nombre del método que queremos ejecutar
// Se utiliza esta sintaxis cuando se crea una Clase que Administrará varias Rutas con distintos Métodos

// Route::get('cursos/{curso}', [CursoController::class, 'show']);

// Forma: Laravel 7
// Route::get('/cursos', 'CursoController@show']);
// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------

// Enviamos dos variables desde la URL y lo obtenemos con la función anonima para retornar un valor
// {categoria?}: En la variable categoria tiene el caracter "?" para indicar que es opcional,
// Para que sea del todo opcional tambien se debe agregar el valor por defecto en la función anonima
// Route::get('cursos/{curso}/{categoria?}', function ($curso, $categoria = null) {
    
//     if($categoria){
//         return "Bienvendio al curso $curso, de la categoría $categoria";#
//     }else{
//         return "Bienvendio al curso $curso";
//     }
// });


// ------------------------------------------------------------------------------------------------------------------------------------------------------------------------
// Route::controller([AGREGAR_CONTROLADOR])->group(function(){}): Con esta sintaxis se agrupan varias rutas que utilizan el mismo controlador
Route::controller(CursoController::class)->group(function(){

    // ->name('[AGREGAR NOMBRE DE RUTA]') => Se le asigna un nombre a la ruta para poder utilizarla en otras partes de la aplicación
    // Este nombre se utilizará para hacer referencia a la ruta en otras partes de la aplicación con la función "route('[AGREGAR NOMBRE DE RUTA]')"
    
    // Tipos de Métodos:
    // get(): para obtener datos
    // post(): para enviar datos
    // put(): para actualizar datos
    // delete(): para eliminar datos

    Route::get('cursos', 'index')->name('cursos.index');
    Route::get('cursos/create', 'create')->name('cursos.create');
    Route::get('cursos/{curso}', 'show')->name('cursos.show');
    Route::post('cursos', 'store')->name('cursos.store');
    Route::get('cursos/{curso}/edit', 'edit')->name('cursos.edit');
    Route::put('cursos/{curso}', 'update')->name('cursos.update');
    Route::delete('cursos/{curso}', 'destroy')->name('cursos.destroy');
});