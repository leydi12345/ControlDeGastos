@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Ingresos <a href="ingreso/create"><button class="btn btn-success"><i class="fas fa-plus"></i> Nuevo</button></a>  
		<br>

	</div>

</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id</th>
					<th>Fecha registro</th>
					<th>Concepto Ingreso Fijo</th>
					<th>Ingreso Fijo</th>
					<th>Concepto Ingreso Variable</th>
					<th>Ingreso Variable</th>
					<th>Total</th>
					<th>Opciones</th>
				</thead>
				@foreach ($ingresos as $i)
				<tr>
					<td>{{ $i->idingreso}}</td>
					<td>{{ $i->fecha}}</td>
					<td>{{ $i->nombre}}</td>
					<td>{{ $i->ingreso_fijo}}</td>
					<td>{{ $i->concepto}}</td>
					<td>{{ $i->ingreso_variable}}</td>
					<td>{{ $i->total}}</td>

					<td>
						<a href="{{URL::action('IngresoController@edit',$i->idingreso)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$i->idingreso}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>

				</tr>
				@include('ingreso.ingreso.modal')
				@endforeach
			</table>
		</div>
			{{$ingresos->render()}}
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<footer class="footer">
	
	<div class="container_fluid">
		<div class="copyring ml-auto" align="right">
			<h3 style="font-weight: 700;">TOTAL INGRESO :/BS {{number_format($sum,2)}}</h3>
		</div>	

	</div>
</footer>

</div>
</div>
@endsection