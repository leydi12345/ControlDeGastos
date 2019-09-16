@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de gasto fijo <a href="gastofijo/create"><button class="btn btn-success"><i class="fas fa-plus"></i> Nuevo</button></a>  
		<br>

	</div>

</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id</th>
					<th>Fecha Registro</th>
					<th>Luz</th>
					<th>Cable</th>
					<th>Agua</th>
					<th>Hipoteca</th>
					<th>Alquiler</th>
					<th>Otros</th>
					<th>Sub Total</th>
					<th>Opciones</th>
				</thead>
				@foreach ($gastos as $g)
				<tr>
					<td>{{ $g->idgasto_fijo}}</td>
					<td>{{ $g->fecha}}</td>
					<td>{{ $g->luz}}</td>
					<td>{{ $g->cable}}</td>
					<td>{{ $g->agua}}</td>
					<td>{{ $g->hipoteca}}</td>
					<td>{{ $g->alquiler}}</td>
					<td>{{ $g->otros}}</td>
					<td>{{ $g->sub_total}}</td>
					<td>
						<a href="{{URL::action('GastofijoController@edit',$g->idgasto_fijo)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$g->idgasto_fijo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>

				</tr>
				@include('gasto.gastofijo.modal')
				@endforeach
			</table>
		</div>
			{{$gastos->render()}}
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
<footer class="footer">
	
	<div class="container_fluid">
		<div class="copyring ml-auto" align="right">
			<h3 style="font-weight: 700;">TOTAL GASTO FIJO :/BS {{number_format($sum,2)}}</h3>
		</div>	

	</div>
</footer>

</div>
</div>


@endsection