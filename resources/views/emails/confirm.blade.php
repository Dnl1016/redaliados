Hola {{$user->name}}
Has cambiado tu correo electronico. Por favor verifíca la nueva usando el siguiente enlace:

{{route('verify', $user->verification_token)}}