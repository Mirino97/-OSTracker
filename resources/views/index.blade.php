@extends('layout')

@section('content')
<form method="post" action="/create">
	@csrf
	<h4>Cadastrar Novo Cliente</h4>
	<div class="row">
		<div class="col-4"><input class="w-100 rounded p-2 mb-2" type="text" name="nome" placeholder="Cliente" required autofocus></div>
		<div class="col-4"><input class="w-100 rounded p-2 mb-2" type="text" name="telefone" placeholder="Telefone" required></div>
		<div class="col-4"><input class="w-100 rounded p-2 mb-2" type="text" name="email" placeholder="E-mail" required></div>
	</div>
	<div class="row">
		<div class="col-6"><input class="w-100 rounded p-2 mb-2" type="text" name="endereco" placeholder="Endereço" required></div>
		<div class="col-6"><input class="w-100 rounded p-2 mb-2" type="text" name="cnpj" placeholder="CNPJ" required></div>
	</div>
	<div class="row justify-content-center">
		<div class="col-4"><input class="w-100 bg-success border-0 text-white rounded p-2 mb-2" type="submit" name="button" value="Cadastrar" class="btn bg-success"></div>
	</div>
</form>
@endsection

@section('lista')

<table class="w-100">
	<tr class="bg-light">
		{{-- <th scope="col" class="p-2">Id</th> --}}
		<th scope="col" class="p-2 text-center">Nome</th>
		<th scope="col" class="p-2 text-center">Telefone</th>
		<th scope="col" class="p-2">Endereco</th>
		<th scope="col" class="p-2">E-mail</th>
		{{-- <th scope="col" class="p-2">CNPJ</th> --}}
		<th scope="col" class="p-2"></th>
	</tr>
	@foreach($clientes as $clientes)
	<tr>
		{{-- <td class="p-2 text-center">{{$clientes['id']}}</td> --}}
		<td class="p-2"><a href="{{url("/".$clientes['id']."/edit") }}" class="w-100 btn bg-success" style="color: white">{{ mb_strimwidth($clientes['nome'], 0, 20, "...") }}</a></td>
		<td class="p-2 text-center">{{ mb_strimwidth($clientes['telefone'], 0, 20, "...") }}</td>
		<td class="p-2">{{ mb_strimwidth($clientes['endereco'], 0, 30, "...") }}</td>
		<td class="p-2">{{ mb_strimwidth($clientes['email'], 0, 30, "...") }}</td>
		{{-- <td class="p-2 text-center">{{ mb_strimwidth($clientes['cnpj'], 0, 20, "...") }}</td> --}}
		<td class="p-2">
			<a href="{{url("/".$clientes['id']."/delete")}}" class="w-100 btn btn-danger">Delete</a>
		</td>
	</tr>

	@endforeach
</table>

@endsection