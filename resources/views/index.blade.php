@extends('layout')

@section('content')

<div class="createForm">
	<form method="post" action="/create" class="container pt-3 pb-3">

		@csrf

		<h4>Cadastrar Novo Cliente</h4>
		<div class="form-group">
			<input type="text" name="nome" placeholder="Cliente" required>
		</div>

		<div class="form-group">
			<input type="text" name="telefone" placeholder="Telefone" required>
		</div>

		<div class="form-group">
			<input type="text" name="endereco" placeholder="Endereço" required>
		</div>

		<div class="form-group">
			<input type="text" name="email" placeholder="E-mail" required>
		</div>

		<div class="form-group">
			<input type="text" name="cnpj" placeholder="CNPJ" required>
		</div>

		<input type="submit" name="button" value="Cadastrar" class="btn bg-success" style="color: white">

	</form>
</div>

@endsection

@section('lista')
<div id="lista">
	<table  id="tableClientes" class="container pt-5 pb-5" style="border: 1px solid black">
		<tr>
			<th scope="col">Id</th>
			<th scope="col">Nome</th>
			<th scope="col">Telefone</th>
			<th scope="col">Endereco</th>
			<th scope="col">E-mail</th>
			<th scope="col">CNPJ</th>
			<th scope="col"></th>
		</tr>
	@foreach($clientes as $clientes)
		<tr class="spaceUnder">
			<td style="text-align: center">{{$clientes['id']}}</td>
			<td><a href="{{url("/".$clientes['id']."/edit") }}" class="btn bg-success" style="color: white">{{ mb_strimwidth($clientes['nome'], 0, 20, "...") }}</a></td>
			<td>{{ mb_strimwidth($clientes['telefone'], 0, 20, "...") }}</td>
			<td>{{ mb_strimwidth($clientes['endereco'], 0, 30, "...") }}</td>
			<td>{{ mb_strimwidth($clientes['email'], 0, 30, "...") }}</td>
			<td>{{ mb_strimwidth($clientes['cnpj'], 0, 20, "...") }}</td>
			<td>
			<a href="{{url("/".$clientes['id']."/delete")}}" class="btn btn-danger">Delete</a>
			</td>
		</tr>

	@endforeach
	</table>
</div>
@endsection