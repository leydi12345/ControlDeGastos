@extends ('layouts.admin')
@section ('contenido')


<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado Contacto-Mensaje <a href="contacto/create"><button class="btn btn-success"><i class="fas fa-plus"></i> Nuevo</button></a>    </h3>
		<br>
		@include('contacto.search')
	</div>

</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id</th>
					<th>Nombre</th>
					<th>Email</th>
					<th>Asunto</th>
					<th>Mensaje</th>
					<th>Opciones</th>
				</thead>
				@foreach ($contactos as $c)
				<tr>
					<td>{{ $c->idcontacto}}</td>
					<td>{{ $c->nombre}}</td>
					<td>{{ $c->email}}</td>
					<td>{{ $c->asunto}}</td>
					<td>{{ $c->mensaje}}</td>
					<td>
						<a href="{{URL::action('ContactoController@edit',$c->idcontacto)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$c->idcontacto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>

				</tr>
				@include('contacto.modal')
				@endforeach
			</table>
		</div>
			{{$contactos->render()}}
	</div>
</div>


@endsection