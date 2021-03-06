
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" >
      <!-- Bootstrap JS -->
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/estilos.css')}}">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script src="{{asset('js/menu.js')}}"></script>
    <title>Listado de Horarios</title>
  </head>
  <body>
<!--Creation the Menu-->

  <header>
		<div class="menu_bar">
			<a href="#" class="bt-menu"><span class="icon-menu"></span>Menú</a>
		</div>

		<nav>
			<ul>
				<li><a href="/barber_shop/public/inicio"><span class="icon-home"></span>Inicio</a></li>
				<li><a href="/barber_shop/public/clientes"><span class="icon-users"></span>Clientes</a></li>
				<li><a href="/barber_shop/public/barberos"><span class="icon-hipster"></span>Barberos</a></li>
				<li><a href="/barber_shop/public/horarios"><span class="icon-clock"></span>Horarios</a></li>
				<li><a href="/barber_shop/public/tarifas"><span class="icon-file-text"></span>Tarifas</a></li>
				<li><a href="/barber_shop/public/citas"><span class="icon-profile"></span>Citas</a></li>
				<li><a href="/barber_shop/public/ganancias"><span class="icon-coin-dollar"></span>Ganancias</a></li>
        <li>
          <form id="Logout" method="POST" action="{{url('logout')}}">
            {{csrf_field()}}
            <a href="javascript:{}" 
             onclick="document.getElementById('Logout').submit();">Cerrar Sesión</a>
            </form>
        </li>
			</ul>
		</nav>
	</header>



<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Hora</th>
      <th scope="col">Acciones</th>
   
    </tr>
  </thead>
  <tbody>
  @foreach($horarios as $hora)<!--nombre de la variable mas un alias-->
    <tr>
      <th scope="row">{{$hora->id}}</th>
      <td>{{$hora->hora}}</td>
      <td>  
      <form method="POST" action="{{url('/horarios/'.$hora->id)}}">
      {{csrf_field()}}
      {{method_field('DELETE')}}
      <button type="submit" onclick="return confirm('Desea Eliminar el horario Seleccionado');"
      class="btn btn-danger btn-sm">Eliminar</button>
      <a href="{{ url('/horarios/'.$hora->id.'/edit') }}" class="btn btn-primary btn-sm">Editar</a>
      </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

<!--show Paginate in the view-->
    {{$horarios->links()}}



<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#crearHorario">
  Crear Nuevo Horario
</button>

<!-- Modal -->
<div class="modal fade" id="crearHorario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Horarios</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
   
<form method="POST" action="{{ url('/horarios')}}"><br>
{{ csrf_field() }}
    <label for="fname">Hora:</label><br><br>
    <input type="time"id="hora" name="hora"><br><br>
  
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Horario</button>
        </form>
      </div>
    </div>
  </div>
</div>
    </footer>

@isset($mensaje)
          <script type="text/javascript">
          alert("No se puede Eliminar este Registro")
      </script>
      @endisset
  </body>
</html>