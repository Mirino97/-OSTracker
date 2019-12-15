@extends('layout')

@section('content')
 <img src="/uploads/avatars/{{ $user->avatar }}">
 <form enctype="multipart/form-data" action="/perfil" method="POST">
 	@csrf
 	<label>Nova foto de Perfil</label>
 	<input type="file" name="avatar">
 	<input type="submit">
 </form>
@endsection