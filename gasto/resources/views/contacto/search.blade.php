{!! Form::open(array('url'=>'contacto','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!} <!--creacion de un formulario para envios de datos-->

 <div class="form-group"> <!--comando para crear los elementos del formulario-->

 	
	<div class="input-group">
     <input type="text" class="form-control" name="searchText" placeholder="Buscar..." value="{{$searchText}}">

     <span class="input-group-btn" class="border border-secondary"> <!--para que el boton se ponga ala lado derecho-->
     	<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
     </span>
   </div>
</div>

{{Form::close()}}


