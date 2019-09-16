@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-12 col-md-6 col-xs-12">
	<h3>Editar gasto fijo: {{ $gasto->fecha}} </h3>
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

			{!!Form::model($gasto,['method'=>'PATCH','route'=>['gastofijo.update',$gasto->idgasto_fijo]])!!}
	{{Form::token()}}

<div class="row">
	
   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<label>luz</label>
		<input type="text" name="luz" class="form-control" value="{{$gasto->luz}}" placeholder="Luz..">

	</div>

  </div>

   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Cable</label>
		<input type="text" name="cable" class="form-control" value="{{$gasto->luz}}" placeholder="Cable..">

	</div>

  </div>
</div>
<div class="row">
   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Agua</label>
		<input type="text" name="agua" class="form-control" value="{{$gasto->agua}}" placeholder="Agua..">

	</div>

  </div>

   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Hipoteca</label>
		<input type="text" name="hipoteca" class="form-control" value="{{$gasto->hipoteca}}" placeholder="Hipoteca..">

	</div>

  </div>
</div>

<div class="row">
   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Alquiler</label>
		<input type="text" name="alquiler" class="form-control" value="{{$gasto->alquiler}}" placeholder="Alquiler..">

	</div>

  </div>

   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Otros</label>
		<input type="text" name="otros" class="form-control" value="{{$gasto->otros}}" placeholder="Otros..">

	</div>

  </div>
</div>

<div class="row">
   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Sub_total</label>
		<input type="text" name="sub_total" class="form-control" value="{{$gasto->sub_total}}" placeholder="Sub_total..">

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