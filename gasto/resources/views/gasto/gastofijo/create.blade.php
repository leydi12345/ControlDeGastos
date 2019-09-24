@extends ('layouts.admin')
@section ('contenido')

<div class="row">
   <div class="col-lg-6 col-md-6 col-xs-12">
	<h3>gasto fijo</h3>
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

<div class="bd-example" style="border-color: #C0C0C0;border-style: solid;border-width: 2px;">
<div class="row">
	    	



	    		<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">

	    			<div class="form-group">

	    				<label for="luz">Gasto Luz</label>
	    				<input type="number" name="luz"  id="luz" class="form-control" placeholder="Nombre Gasto Fijo">
	    				
	    			</div>

	    		</div>



	    		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">

	    			<div class="form-group">
	    				
	    			<label for="cable">Gasto Cable</label>	
	    			<input type="number" name="cable" id="cable" class="form-control" placeholder="Gasto Cable">
	    			</div>

	    		</div>



	    		<div class="col-lg-2 col-sm-2 col-md-4 col-xs-12">

	    			<div class="form-group">
	    				
	    			<label for="agua">Gasto Agua</label>	
	    			<input type="number" name="agua" id="agua" class="form-control" placeholder="Gasto Agua">
	    			</div>

	    		</div>




	    		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">

	    			<div class="form-group">
	    				
	    				<label for="hipoteca">Hipoteca</label>
	    				<input type="number" name="hipoteca"  id="hipoteca" class="form-control" placeholder="P. Compra">

	    			</div>

	    		</div>


				
				<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">

	    			<div class="form-group">
	    				
	    				<label for="alquiler">Gasto alquiler</label>
	    				<input type="number" name="alquiler"  id="alquiler" class="form-control" placeholder="P. Compra">

	    			</div>

	    		</div>


	    		<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">

	    			<div class="form-group">
	    				
	    				<label for="otros">Gasto Otros</label>
	    				<input type="number" name="otros"  id="otros" class="form-control" placeholder="P. Compra">

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
            <div class="col-lg-12 grid-margin">
              <div class="card">
               <div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover" id="detalles">
	    				
	    				<thead style="background-color: #A9D0F5">
	    					<th>Opciones</th>
	    					<th>Luz</th>
	    					<th>Cable</th>
	    					<th>agua</th>
	    					<th>hipoteca</th>
	    					<th>alquiler</th>
	    					<th>otros</th>
	    					<th>Subtotal</th>

	    				</thead>

	    				<tfoot>
	    					<th>TOTAL</th>
	    					<th></th>
	    					<th></th>
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

		luz=parseInt($("#luz").val());
		cable=parseInt($("#cable").val());
		agua=parseInt($("#agua").val());
		hipoteca=parseInt($("#hipoteca").val());
		alquiler=parseInt($("#alquiler").val());
		otros=parseInt($("#otros").val());



		if (luz!="" && cable!="" && agua!="" && agua>0 && hipoteca!="" && alquiler!="" && otros!="")
		{

			subtotal[cont]=(luz+cable+agua+hipoteca+alquiler+otros);
			total=total+subtotal[cont];

			var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="number" name="luz[]" value="'+luz+'"></td><td><input type="number" name="cable[]" value="'+cable+'"></td><td><input type="number" name="agua[]" value="'+agua+'"></td><td><input type="number" name="hipoteca[]" value="'+hipoteca+'"></td><td><input type="number" name="alquiler[]" value="'+alquiler+'"></td><td><input type="number" name="otros[]" value="'+otros+'"></td><td><input type="hidden" name="subtotals[]" value="'+subtotal[cont]+'">'+subtotal[cont]+'</td></tr>';

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
		$("#luz").val("");
		$("#cable").val("");
		$("#agua").val("");
		$("#hipoteca").val("");
		$("#alquiler").val("");
		$("#otros").val("");
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