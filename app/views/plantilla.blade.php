<!DOCTYPE html>
<html>
<head>
    <title>Tienda</title>
    <!--Incluimos el CSS de bootstrap y el CSS de la plantilla
    que usamos con los helpers de Laravel-->
    {{HTML::style('css/bootstrap.min.css')}}
    {{HTML::style('css/jumbotron-narrow.css')}}

</head>
<body>

<div class="container">
    <div class="header">

        <ul class="nav nav-pills pull-right">
            <li>{{HTML::link('/', 'Inicio')}}</li>
            <li>{{HTML::link('vendedor', 'Vendedores')}}</li>
            <li>{{HTML::link('producto', 'Productos')}}</li>
        </ul>

        <h3 class="text-muted">Tienda</h3>
    </div>

    @yield('contenido')
    <!-- Aqui se incluiran los codigos de las vistas que
    use cada metodo de los controladores -->

    <div class="footer">
        <p>&copy; Codehero 2013</p>
    </div>

</div>

<!-- Incluimos la libreria jQuery  -->
<script src="https://code.jquery.com/jquery.js"></script>
<!-- Incluimos el JS de bootstrap con el Helper de Laravel -->
{{HTML::script('js/bootstrap.min.js')}}
</body>
</html>