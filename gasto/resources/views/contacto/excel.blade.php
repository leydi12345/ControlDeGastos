<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Distrito</title>

</head>
<body>


    <div>
        <table class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
				
					<th>Id</th>
					<th>Nombre</th>
					<th>Descripcion</th>
				</tr>
				</thead>
				<tbody>
				@foreach ($distritos as $di)

				<tr>  
					<td>{{ $di->iddistrito}}</td>
					<td>{{ $di->nombre}}</td>
					<td>{{ $di->descripcion}}</td>
				</tr>
				
				@endforeach

				</tbody>

	</table>
</div>


</body>
</html>