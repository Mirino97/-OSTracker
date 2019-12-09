@extends('layout')
@section('content')

<form method="post" action="/{{ $cliente->id }}/update">
	@method('PATCH')
	@csrf
	<h4>Atualizar Cliente</h4>
	<div class="row">
		<div class="col-4"><input class="w-100 rounded p-2 mb-2" type="text" name="nome" placeholder="Cliente" value="{{ $cliente->nome }}"required></div>
		<div class="col-4"><input class="w-100 rounded p-2 mb-2" type="text" name="telefone" placeholder="Telefone" value="{{ $cliente->telefone }}" required></div>
		<div class="col-4"><input class="w-100 rounded p-2 mb-2" type="text" name="endereco" placeholder="Endereço" value="{{ $cliente->endereco }}" required></div>
	</div>
	<div class="row">
		<div class="col-6"><input class="w-100 rounded p-2 mb-2" type="text" name="email" placeholder="E-mail" value="{{ $cliente->email }}" required></div>
		<div class="col-6"><input class="w-100 rounded p-2 mb-2" type="text" name="cnpj" placeholder="CNPJ" value="{{ $cliente->cnpj }}" required></div>
	</div>
	<div class="row justify-content-center">
		<div class="col-4"><input class="w-100 bg-success border-0 rounded p-2 mb-2" type="submit" name="button" value="Atualizar" class="btn bg-success" style="color: white"></div>
	</div>
</form>

<a href="/{{ $cliente->id }}/equipamento" class="btn btn-warning">Lista de Equipamentos</a>

@endsection
@section('ordens')

<form method="post" action="/{{ $cliente->id }}/ordem/new">
	@csrf
	<h4>Nova Ordem de Serviço</h4>
	<div class="row">
		<input class="w-100 rounded p-2 mb-2" type="hidden" name="clientes_id" value="{{ $cliente->id }}">
		<div class="col-12"><input class="w-100 rounded p-2 mb-2" type="text" name="servico" placeholder="Serviço Prestado" value="" required></div>
	</div>
	<div class="row">
		<div class="col-4"><input class="w-100 rounded p-2 mb-2" type="date" data-date="DD MM YYYY" data-date-format="DD MM YYYY" name="dataServico" placeholder="Data de Serviço" value="{{ date('Y-m-d') }}" required></div>
		<div class="col-4"><input class="w-100 rounded p-2 mb-2" type="text" name="valor" placeholder="valor" value="" required></div>
		<div class="col-2">
			<select class="w-100 rounded p-2 mb-2" name="pago">
				<option value="nao" selected="nao">Não</option>
				<option value="sim">Sim</option>
			</select>
		</div>
		<div class="col-2">
			<select class="w-100 rounded p-2 mb-2" name="estado">
				<option value="pendente" selected="pendente">Pendente</option>
				<option value="em andamento">Em Andamento</option>
				<option value="concluido">Concluído</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-12"><textarea class="w-100 rounded p-2 mb-2" name="observacao" placeholder="Descrição do Serviço"></textarea></div>
		
	</div>
	<div class="row justify-content-center">
		
		<div class="col-4"><input class="w-100 bg-success border-0 rounded p-2 mb-2" type="submit" name="button" value="Adicionar" class="btn bg-success" style="color: white"></div>
	</div>
</form>

@endsection
@section('listaOrdens')
	@if(count($cliente->getOrdens) > 0)

	<table class="w-100">
		<tr class="bg-light">
			<th scope="col" class="p-2 text-center">Serviço</th>
			<th scope="col" class="p-2 text-center">Data</th>
			<th scope="col" class="p-2 text-center">Valor</th>
			<th scope="col" class="p-2 text-center">Pago</th>
			<th scope="col" class="p-2">Observações</th>
			<th scope="col" class="p-1">Estado</th>
			<th scope="col" class="p-1"></th>
		</tr>
		@foreach($cliente->getOrdens as $ordens)
		<tr>
			<td class="p-2"><a href="/{{ $ordens->id }}/ordemEdit" class="w-100 btn bg-success" style="color: white">{{ mb_strimwidth($ordens['servico'], 0, 20, "...") }}</a></td>
			<td class="p-2 text-center">{{ mb_strimwidth($ordens['dataServico'], 0, 20, "...") }}</a></td>
			<td class="p-2 text-center">{{ mb_strimwidth($ordens['valor'], 0, 20, "...") }}</td>
			<td class="p-2 text-center">{{ mb_strimwidth($ordens['pago'], 0, 30, "...") }}</td>
			<td class="p-2">{{ mb_strimwidth($ordens['observacao'], 0, 30, "...") }}</td>
			<td class="p-1">{{ ucfirst($ordens->estado) }}</td>
			<td class="p-1">
				<a href="{{url("/".$ordens['id']."/delete/ordem")}}" class="w-100 btn btn-danger">Delete</a>
			</td>
		</tr>
		@endforeach
	</table>
	</div>
	@else
	<div class="alert alert-info text-center" role="alert">
  		<h2>Não existem ordens cadastradas!</h2>
	</div>
	@endif
@endsection