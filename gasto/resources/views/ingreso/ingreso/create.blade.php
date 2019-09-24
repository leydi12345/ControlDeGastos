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





<div class="bd-example" style="border-color: #C0C0C0;border-style: solid;border-width: 2px;">
<div class="row">
	    	



	    		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

	    			<div class="form-group">

	    				<label for="nombre">Nombre Gasto Fijo</label>
	    				<input type="text" name="nombre"  id="nombre" class="form-control" placeholder="Nombre Gasto Fijo">
	    				
	    			</div>

	    		</div>



	    		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">

	    			<div class="form-group">
	    				
	    			<label for="ingreso_fijo">Cantidad</label>	
	    			<input type="number" name="ingreso_fijo" id="ingreso_fijo" class="form-control" placeholder="cantidad">
	    			</div>

	    		</div>



	    		<div class="col-lg-2 col-sm-2 col-md-4 col-xs-12">

	    			<div class="form-group">
	    				
	    			<label for="concepto">Concepto Variable</label>	
	    			<input type="text" name="concepto" id="concepto" class="form-control" placeholder="Unidad">
	    			</div>

	    		</div>




	    		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">

	    			<div class="form-group">
	    				
	    				<label for="ingreso_variable">Ingreso Variable</label>
	    				<input type="number" name="ingreso_variable"  id="ingreso_variable" class="form-control" placeholder="P. Compra">

	    			</div>

	    		</div>








	    		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">

	    			<div class="form-group">
	    				
	    				<button type="button" id="bt_add" class="btn  btn-primary"><i class="fas fa-plus"></i> Agregar</button>

	    			</div>

	    		</div>
</div>
</div>
<br>
<div class="row">

	    		<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">

	    			<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
	    				
	    				<thead style="background-color: #A9D0F5">
	    					<th>Opciones</th>
	    					<th>Nombre Gasto fijo</th>
	    					<th>Cantidad fijo</th>
	    					<th>Nombre gasto variable</th>
	    					<th>cantidad variable</th>
	    					<th>Subtotal</th>

	    				</thead>

	    				<tfoot>
	    					<th>TOTAL</th>
	    					<th></th>
	    					<th></th>
	    					<th></th>
	    					<th></th>
	    					<th><h4 id="total">Bs/. 0.00</h4><input type="hidden" name="total" id="total"></th>



	    				</tfoot>

	    				<tbody>
	    					
	    				</tbody>


	    			</table>


	    		</div>



	    		</div>

	    	</div>

			</div>

	    	<div class="row">

	        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
 	        	<div class="form-group">
	        	<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
		         <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Guardar</button>
		         <button class="btn btn-danger" type="reset"><i class="fas fa-ban"></i> Cancelar</button>

	            </div>

	     </div>

	     </div>
    





	{!!Form::close()!!}

@push ('scripts')

<script>

	$(document).ready(function(){
		$('#bt_add').click(function(){

			agregar();
		});
	});


	var cont=0;
	total=0;
	subtotal=[];
	$("#guardar").hide();

	function agregar()
	{

		nombre=$("#nombre").val();
		ingreso_fijo=parseInt($("#ingreso_fijo").val());
		concepto=$("#concepto").val();
		ingreso_variable=parseInt($("#ingreso_variable").val());



		if (nombre!="" && ingreso_fijo!="" && ingreso_fijo>0 && concepto!="" && ingreso_variable!="")
		{

			subtotal[cont]=(ingreso_fijo+ingreso_variable);
			total=total+subtotal[cont];

			var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="text" name="nombre[]" value="'+nombre+'"></td><td><input type="number" name="ingreso_fijo[]" value="'+ingreso_fijo+'"></td><td><input type="text" name="concepto[]" value="'+concepto+'"></td><td><input type="number" name="ingreso_variable[]" value="'+ingreso_variable+'"></td><td><input type="hidden" name="subtotals[]" value="'+subtotal[cont]+'">'+subtotal[cont]+'</td></tr>';

			cont++;

			limpiar();
			$("#total").html("Bs/." + total);
			$("#total").val(total);
			evaluar();
			$('#detalles').append(fila);
	

	}
		else
		{
		alert("Error al ingresar el detalle del presupuesto,revise los datos");
		}
		
	}


	function limpiar(){
		$("#nombre").val("");
		$("#ingreso_variable").val("");
		$("#ingreso_fijo").val("");
		$("#concepto").val("");
	}

	function evaluar(){

		if (total>0)
		{
			$("#guardar").show();

		}
		else
		{
			$("#guardar").hide();
		}
	}


	function eliminar(index){
		total=total-subtotal[index];
		$("#total").html("Bs/." + total);
		$("#total").val(total);

		$("#fila" + index).remove();
		evaluar();
	}


</script>


@endpush

@endsection