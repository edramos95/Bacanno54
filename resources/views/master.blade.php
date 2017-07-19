<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Ventas de Bacanno 54</title>
	<link rel="stylesheet" href="{{asset("css/bootstrap.css")}}">
	<script src="{{asset("js/jquery-3.2.1.js")}}"></script>
</head>
<body>
	<nav class="navbar navbar-default">
 	 <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Bacanno 54</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="{{url('form_enviar_correo')}}">Enviar publicidad<span class="sr-only">(current)</span></a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Registros<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('/registrarPlatillos')}}">Registrar platillo</a></li>
            <!--<li><a href="#"></a></li>-->
            <li><a href="{{url('/registrarBebidas')}}">Registrar bebida</a></li>
            <li><a href="{{url('/registrarTrabajadores')}}">Registrar trabajador</a></li>
            <li><a href="{{url('/registrarClientes')}}">Registrar clientes</a></li>
            <li><a href="{{url('/registrarPromociones')}}">Registrar promoción</a></li>
            <li><a href="{{url('registrarPuestos')}}">Registrar puestos</a></li>
          </ul>
        </li>
         <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Consultas<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="{{url('/consultarPlatillos')}}">Consultar platillos</a></li>
            <li><a href="{{url('/consultarBebidas')}}">Consultar bebidas</a></li>
            <li><a href="{{url('/consultarTrabajadores')}}">Consultar trabajadores</a></li>
            <li><a href="{{url('/consultarClientes')}}">Consultar clientes</a></li>
            <li><a href="{{url('/consultarPromociones')}}">Consultar promociones</a></li>
            <li><a href="{{url('/consultarPuestos')}}">Consultar puestos</a></li>
            <!--<li class="divider"></li>-->
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
	<div class="row">
		<div class="col-xs-12">
			@yield('contenido')
		</div>
	</div>
</div>

<footer class="text-center">
	<hr>
	     &copy; Bacanno 54 &copy;
	</footer>
</footer>
<script src="{{asset("js/bootstrap.js")}}"></script>
</body>
</html>