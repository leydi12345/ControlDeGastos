@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-12 col-md-6 col-xs-12">
	<h3>Editar Contacto: {{ $contacto->nombre}} </h3>
	<br>
	@if (count($errors)>0)
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		</ul>
	</div>
  </div>
</div>
	@endif

			{!!Form::model($contacto,['method'=>'PATCH','route'=>['contacto.update',$contacto->idcontacto]])!!}
	{{Form::token()}}

<div class="row">
   <div class="col-lg-12 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Nombre</label>
		<input type="text" name="nombre" class="form-control" value="{{$contacto->nombre}}" placeholder="Nombre..">

	</div>

  </div>
</div>


<div class="row">
   <div class="col-lg-12 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Email</label>
		<input type="text" name="email" class="form-control" value="{{$contacto->email}}" placeholder="Nombre..">

	</div>

  </div>
</div>


<div class="row">
   <div class="col-lg-12 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Asunto</label>
		<input type="text" name="asunto" class="form-control" value="{{$contacto->asunto}}" placeholder="Nombre..">

	</div>

  </div>
</div>

<div class="row">
   <div class="col-lg-12 col-md-6 col-xs-12">
	<div class="form-group">
		<label>mensaje</label>
		<textarea class="form-control" name="mensaje" rows="5" value="{{$contacto->mensaje}}">{{$contacto->mensaje}}</textarea>
	</div>

  </div>
</div>

	<div class="form-group">
		<button class="btn btn-primary" type="submit">Guardar</button>
		<button class="btn btn-danger" type="reset">Cancelar</button>
	</div>


	{!!Form::close()!!}

</div>


@endsection