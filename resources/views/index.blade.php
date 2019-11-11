@extends('layout')

@section('content')
	<form method="post" action="/create" style="width: 90%; height: 90%; border: solid .2em #f7f7f9;">

		@csrf
		<div class="form-row justify-content-center">
			<h4>Cadastrar Novo Cliente</h4>
		</div>
		<div class="form-row justify-content-center">
				<div class="form-group col-md-4">
					<label for="inputNome">Nome</label>
					<input type="text" name="nome" class="form-control" placeholder="Cliente" required>
				</div>

				<div class="form-group">
					<label for="inputTelefone">Telefone</label>
					<input type="text" class="form-control" name="telefone" placeholder="Telefone" required>
				</div>

				<div class="form-group col-md-3">
					<label for="inputEmail">Email</label>
					<input type="text" name="email" class="form-control" placeholder="E-mail" required>
				</div>
		</div>

		<div class="form-row justify-content-center">
			<div class="form-group col-md-5">
				<label for="inputEndereco">Endereço</label>
				<input type="text" name="endereco" class="form-control" placeholder="Endereço" required>
			</div>

			<div class="form-group col-md-4">
				<label for="inputCNPJ">CNPJ</label>
				<input type="text" name="cnpj" class="form-control" placeholder="CNPJ" required>
			</div>
		</div>
		<div class="form-row justify-content-center">
			<input type="submit" name="button" value="Cadastrar" class="btn bg-success" style="color: white">
		</div>


	</form>
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