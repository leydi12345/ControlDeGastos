@extends('layouts.admin')
@section('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de gasto variable <a href="gastovariable/create"><button class="btn btn-success"><i class="fas fa-plus"></i> Nuevo</button></a>  
		<br>

	</div>

</div>


<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					
					<th>Id</th>
					<th>Transporte</th>
					<th>Alimento</th>
					<th>Vestimenta</th>
					<th>Utiles</th>
					<th>extras</th>
					<th>Otros</th>
					<th>Sub Total</th>
					<th>Opciones</th>
				</thead>
				@foreach ($variables as $v)
				<tr>
					<td>{{ $v->idgasto_variable}}</td>
					<td>{{ $v->transporte}}</td>
					<td>{{ $v->alimento}}</td>
					<td>{{ $v->vestimenta}}</td>
					<td>{{ $v->utiles}}</td>
					<td>{{ $v->extras}}</td>
					<td>{{ $v->otros}}</td>
					<td>{{ $v->sub_total}}</td>
					<td>
						<a href="{{URL::action('GastovariableController@edit',$v->idgasto_variable)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$v->idgasto_variable}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>

				</tr>
				@include('gasto.gastovariable.modal')
				@endforeach
			</table>
		</div>
			{{$variables->render()}}
	</div>
</div>
@endsection