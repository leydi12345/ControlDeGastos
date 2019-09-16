@extends ('layouts.admin')
@section ('contenido')

<div class="row">
   <div class="col-lg-6 col-md-6 col-xs-12">
	<h3>Nuevo Ingreso:SEPTIEMBRE</h3>
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
     
	

	{!!Form::open(array('url'=>'ingreso/ingreso','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
	{{Form::token()}}

<div class="row"> 



	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
		<div class="form-group">
		<label for="ingreso_fijo">Datos De ingreso Fijo</label>
		<input type="text" name="ingreso_fijo" required value="{{old('ingreso_fijo')}}" class="form-control" >

		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
		<div class="form-group">
		<label for="ingreso_variable">Datos de ingreso variable </label>
		<input type="text" name="ingreso_variable" required value="{{old('ingreso_variable')}}" class="form-control" >

		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
		<div class="form-group">
		<label for="total">Total Ingreso</label>
		<input type="text" name="total" required value="{{old('total')}}" class="form-control" >

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