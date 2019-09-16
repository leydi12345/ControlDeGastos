@extends ('layouts.admin')
@section ('contenido')

<div class="row">
	<div class="col-lg-12 col-md-6 col-xs-12">
	<h3>Editar gasto variable: {{ $variable->fecha}} </h3>
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

			{!!Form::model($variable,['method'=>'PATCH','route'=>['gastovariable.update',$variable->idgasto_variable]])!!}
	{{Form::token()}}

<div class="row">
   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Transporte</label>
		<input type="text" name="transporte" class="form-control" value="{{$variable->transporte}}" placeholder="Transporte..">

	</div>

  </div>

   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Vestimenta</label>
		<input type="text" name="vestimenta" class="form-control" value="{{$variable->vestimenta}}" placeholder="vestimenta..">

	</div>

  </div>
</div>
<div class="row">
   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Alimento</label>
		<input type="text" name="alimento" class="form-control" value="{{$variable->alimento}}" placeholder="Alimento..">

	</div>

  </div>

   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Utiles</label>
		<input type="text" name="utiles" class="form-control" value="{{$variable->utiles}}" placeholder="Utiles..">

	</div>

  </div>
</div>
<div class="row">
   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Extras</label>
		<input type="text" name="extras" class="form-control" value="{{$variable->extras}}" placeholder="Extras..">

	</div>

  </div>

   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Otros</label>
		<input type="text" name="otros" class="form-control" value="{{$variable->otros}}" placeholder="Otros..">

	</div>

  </div>
</div>

<div class="row">
   <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
	<div class="form-group">
		<label>Sub Total</label>
		<input type="text" name="sub_total" class="form-control" value="{{$variable->sub_total}}" placeholder="Sub Total..">

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