
{{-- Este será la Plantilla que se reutilice en las Vistas --}}

{{-- @yield([NOMBRE_CAMPO]) => esta expresión se utiliza para obtener los parametros que se le pasa a la plantilla --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    @yield('content')
</body>
</html>