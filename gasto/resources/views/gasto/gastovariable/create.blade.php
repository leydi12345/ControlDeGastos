@extends ('layouts.admin')
@section ('contenido')

<div class="row">
   <div class="col-lg-6 col-md-6 col-xs-12">
	<h3>Nuevo Gasto Variable</h3>
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
     
	

	{!!Form::open(array('url'=>'gasto/gastovariable','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
	{{Form::token()}}

<div class="row"> 



	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
		<div class="form-group">
		<label for="transporte">ingrese transporte</label>
		<input type="text" name="transporte" required value="{{old('transporte')}}" class="form-control" >

		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
		<div class="form-group">
		<label for="alimento">ingrese gasto alimento</label>
		<input type="text" name="alimento" required value="{{old('alimento')}}" class="form-control" >

		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
		<div class="form-group">
		<label for="vestimenta">ingrese gasto vestimenta</label>
		<input type="text" name="vestimenta" required value="{{old('vestimenta')}}" class="form-control" >

		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
		<div class="form-group">
		<label for="utiles">ingrese gasto utiles</label>
		<input type="text" name="utiles" required value="{{old('utiles')}}" class="form-control" >

		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
		<div class="form-group">
		<label for="extras">ingrese los datos extras</label>
		<input type="text" name="extras" required value="{{old('extras')}}" class="form-control" >

		</div>
	</div>

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
		<div class="form-group">
		<label for="otros">ingrese los datos de otros</label>
		<input type="text" name="otros" required value="{{old('otros')}}" class="form-control" >

		</div>
	</div>

	

	<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" >
		<div class="form-group">
		<label for="sub_total">Ingreste Total De Gasto Variable</label>
		<input type="text" name="sub_total" required value="{{old('sub_total')}}" class="form-control" >

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