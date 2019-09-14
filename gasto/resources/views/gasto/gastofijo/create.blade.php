@extends ('layouts.admin')
@section ('contenido')

<div class="row">
   <div class="col-lg-6 col-md-6 col-xs-12">
	<h3>Nuevo seguimiento</h3>
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
     
	

	{!!Form::open(array('url'=>'gasto/gastofijo','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
	{{Form::token()}}

<div class="row"> 



	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
		<div class="form-group">
		<label for="luz">ingrese los datos de luz</label>
		<input type="text" name="luz" required value="{{old('luz')}}" class="form-control" >

		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
		<div class="form-group">
		<label for="cable">ingrese los datos de cable</label>
		<input type="text" name="cable" required value="{{old('cable')}}" class="form-control" >

		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
		<div class="form-group">
		<label for="agua">ingrese los datos de agua</label>
		<input type="text" name="agua" required value="{{old('agua')}}" class="form-control" >

		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
		<div class="form-group">
		<label for="hipoteca">ingrese los datos de hipoteca</label>
		<input type="text" name="hipoteca" required value="{{old('hipoteca')}}" class="form-control" >

		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
		<div class="form-group">
		<label for="alquiler">ingrese los datos de alquiler</label>
		<input type="text" name="alquiler" required value="{{old('alquiler')}}" class="form-control" >

		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
		<div class="form-group">
		<label for="otros">ingrese los datos de otros</label>
		<input type="text" name="otros" required value="{{old('otros')}}" class="form-control" >

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

</div>










	{!!Form::close()!!}



@endsection