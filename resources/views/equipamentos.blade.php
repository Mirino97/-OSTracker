@extends('layout')

@section('content')
<form method="post" action="/{{ $cliente->id }}/novoEquipamento">
	@csrf
	<h4>Cadastrar Novo Equipamento</h4>
	<input type="hidden" name="clientes_id" value="{{ $cliente->id }}">
	<input type="text" name="nome" placeholder="nome">
	<input type="text" name="usuario" placeholder="usuário">
	<input type="text" name="processador" placeholder="processador">
	<input type="text" name="ram" placeholder="ram">
	<input type="text" name="hd" placeholder="hd">
	<input type="text" name="ethernet" placeholder="ethernet">
	<input type="text" name="ip" placeholder="ip">
	<input type="text" name="ipfixo" placeholder="ipfixo">
	<input type="text" name="programas" placeholder="programas">
	<input type="submit" name="submit">

</form>
@endsection
@section('lista')
<table class="w-100">
	<tr class="bg-light">
		<th scope="col" class="p-2 text-center">Nome</th>
		<th scope="col" class="p-2 text-center">Usuário</th>
		<th scope="col" class="p-2">IP</th>
		<th scope="col" class="p-2">Ethernet</th>
		<th scope="col" class="p-2"></th>
	</tr>
	@foreach($equipamentos as $equipamento)
	<tr>
		<td class="p-2"><a href="" class="w-100 btn bg-success" style="color: white">{{ mb_strimwidth($equipamento['nome'], 0, 20, "...") }}</a></td>
		<td class="p-2 text-center">{{ mb_strimwidth($equipamento['usuario'], 0, 20, "...") }}</td>
		<td class="p-2">{{ $equipamento->ip }}</td>
		<td class="p-2">{{ $equipamento->ethernet }}</td>
		<td class="p-2">
			<a href="" class="w-100 btn btn-danger">Delete</a>
		</td>
	</tr>

	@endforeach
</table>

@endsection