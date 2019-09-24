@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-12 col-md-6 col-xs-12">
	<h3>Editar ingreso: {{ $ingreso->fecha}} </h3>
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

			{!!Form::model($ingreso,['method'=>'PATCH','route'=>['ingreso.update',$ingreso->idingreso]])!!}
	{{Form::token()}}



	<div class="row">
   <div class="col-lg-12 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Nombre Ingreso Fijo</label>
		<input type="text" name="nombre" class="form-control" value="{{$ingreso->nombre}}" placeholder="Nombre Ingreso fijo..">

	</div>

  </div>
</div>

<div class="row">
   <div class="col-lg-12 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Ingreso fijo</label>
		<input type="text" name="ingreso_fijo" class="form-control" value="{{$ingreso->ingreso_fijo}}" placeholder="Ingreso fijo..">

	</div>

  </div>
</div>

<div class="row">
   <div class="col-lg-12 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Nombre Ingreso Variable</label>
		<input type="text" name="concepto" class="form-control" value="{{$ingreso->concepto}}" placeholder="Nombre Ingreso fijo..">

	</div>

  </div>
</div>

<div class="row">
   <div class="col-lg-12 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Ingreso variable</label>
		<input type="text" name="ingreso_variable" class="form-control" value="{{$ingreso->ingreso_variable}}" placeholder="Ingreso variable..">

	</div>

  </div>
</div>
<div class="row">
   <div class="col-lg-12 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Total</label>
		<input type="text" name="total" class="form-control" value="{{$ingreso->total}}" placeholder="Total..">

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