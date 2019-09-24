@extends ('layouts.admin')
@section ('contenido')


<!DOCTYPE html>
<html>
<head>
	<title>mensaje recibido</title>
</head>
<body>

	<p>Recibiste un mensaje de: {{ $contacto['nombre'] }} - {{ $contacto['email'] }} </p>
	<p><strong>ASunto</strong>{{ $contacto['asunto'] }}</p>
	<p><strong>Contenido</strong>{{ $contacto['mensaje'] }}</p>
	{{var_dump($contacto)}}


	

</body>
</html>


@endsection