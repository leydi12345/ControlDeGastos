@extends ('layouts.admin')
@section ('contenido')

<div class="row">
   <div class="col-lg-6 col-md-6 col-xs-12">
	<h3>Nuevo Contacto</h3>
	@if (count($errors)>0)
	    <div class="alert alert-danger">
		  <ul>
			@foreach ($errors->all() as $error)
			<li>{{$error}}</li>
			@endforeach
		   </ul>
	       </div>
	       @endif

	      </div>
	     </div> 
     
	

	{!!Form::open(array('url'=>'contacto','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
	{{Form::token()}}

<div class="row">
   <div class="col-lg-12 col-md-6 col-xs-12">
	<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" class="form-control" placeholder="NOMBRE..">
				</div>
			</div>
		</div>


				<div class="form-group">
					<label for="email">Email</label>
					<input type="text" name="email" class="form-control" placeholder="Email..">
				</div>

				<div class="form-group">
					<label for="asunto">ASUNTO</label>
					<input type="text" name="asunto" class="form-control" placeholder="ASUNTO..">
				</div>


<div class="row">
   <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
      <div class="form-group">
		<label>Mensaje</label>
		<textarea class="form-control" name="mensaje" rows="5" placeholder="Descripcion.."></textarea>
		
     </div>
   </div>
</div>

	
		

	<!--<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
		<div class="form-group">
		<label for="tipo_persona">Tipo Persona</label>
		<select name="tipo_persona" class="form-control selectpicker" data-live-search="true">
					
						<option value="Victima">Victima</option>
						<option value="Infractor">Infractor</option>
						<option value="Testigo">Testigo</option>
					
					

				</select>

		</div>
	</div> -->






		

		


	

				<!--<div class="col-lg-6 col-sm-6 col-xs-12" >
			<div class="form-group">
			<label for="codigo">Codigo</label>
			<input type="text" name="codigo" required value="{{old('codigo')}}" class="form-control" >

			</div>				
		</div>	-->









<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12" >
				<div class="form-group">
		<button class="btn btn-primary" type="submit">Guardar</button>
		<button class="btn btn-danger" type="reset">Cancelar</button>
	</div>
</div>	












	{!!Form::close()!!}



@endsection