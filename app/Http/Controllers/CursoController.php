<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    // Por convención al metodo que mostrará la pantalla principal se le llama "index()"
    public function index(){
        return "Bienvenido a la página principal";
    }

    // Por convención al metodo que mostrará la pantalla con un formulario (de alta por ejemplo) se le llama "create()"
    public function create(){
        return "En esta página podrás crear un curso";
    }

    // Por convención al metodo que mostrará la pantalla con la descripción de un elemento (Producto, Curso, etc) se le llama "show()"
    public function show($curso){
        return "Bienvenido al curso: $curso";
    }
}
