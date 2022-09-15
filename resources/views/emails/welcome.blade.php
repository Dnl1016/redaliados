Hola {{$usuario->name}}
Gracias por crear una cuenta. Por favor verifícala usando el siguiente enlace:

{{route('verify', $usuario->verification_token)}}