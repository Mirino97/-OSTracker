@extends('layout')

@section('content')
<div class="createForm">
	<form method="post" action="/{{ $cliente->id }}/update" class="container pt-3 pb-3">
		@method('PATCH')
		@csrf

		<h4>Atualizar Cliente</h4>
		<div class="form-group">
			<input type="text" name="nome" placeholder="Cliente" value="{{ $cliente->nome }}"required>
		</div>

		<div class="form-group">
			<input type="text" name="telefone" placeholder="Telefone" value="{{ $cliente->telefone }}" required>
		</div>

		<div class="form-group">
			<input type="text" name="endereco" placeholder="Endereço" value="{{ $cliente->endereco }}" required>
		</div>

		<div class="form-group">
			<input type="text" name="email" placeholder="E-mail" value="{{ $cliente->email }}" required>
		</div>

		<div class="form-group">
			<input type="text" name="cnpj" placeholder="CNPJ" value="{{ $cliente->cnpj }}" required>
		</div>

		<input type="submit" name="button" value="Atualizar" class="btn bg-success" style="color: white">

	</form>
</div>
@endsection

@section('ordens')
<div class="formOrdem">
	<form method="post" action="/{{ $cliente->id }}/ordem/new" id="formOrdem1" >
		@csrf

		<h4>Nova Ordem de Serviço</h4>
			<input type="hidden" name="clientes_id" value="{{ $cliente->id }}">
			<input type="text" name="servico" placeholder="Serviço Prestado" value="" required>

			<input type="date" name="dataServico" placeholder="Data de Serviço" value="" required>

			<input type="text" name="valor" placeholder="valor" value="" required>

			<select name="pago">
			    <option value="nao" selected="nao">Não</option>
			    <option value="sim">Sim</option>
  			</select>

			<textarea name="observacao" placeholder="Descrição do Serviço"></textarea>

		<input type="submit" name="button" value="Atualizar" class="btn bg-success" style="color: white">

	</form>
</div>
@endsection

@section('listaOrdens')

@if(count($cliente->ordens) > 0)
<div id="lista">
	<table  id="tableClientes" class="container pt-5 pb-5" style="border: 1px solid black">
		<tr>
			<th scope="col">Serviço</th>
			<th scope="col">Data</th>
			<th scope="col">Valor</th>
			<th scope="col">Pago</th>
			<th scope="col">Observações</th>
			<th scope="col"></th>
		</tr>
	@foreach($cliente->ordens as $ordens)
		<tr class="spaceUnder">
			<td><a href="/{{ $ordens->id }}/ordemEdit" class="btn bg-success" style="color: white">{{ mb_strimwidth($ordens['servico'], 0, 20, "...") }}</a></td>
			<td>{{ mb_strimwidth($ordens['dataServico'], 0, 20, "...") }}</a></td>
			<td>{{ mb_strimwidth($ordens['valor'], 0, 20, "...") }}</td>
			<td>{{ mb_strimwidth($ordens['pago'], 0, 30, "...") }}</td>
			<td>{{ mb_strimwidth($ordens['observacao'], 0, 30, "...") }}</td>
			<td>
			<a href="{{url("/".$ordens['id']."/delete/ordem")}}" class="btn btn-danger">Delete</a>
			</td>
		</tr>
	@endforeach
	</table>
</div>

@else
	<h1>NÃO EXISTEM ORDEMS PARA DISPLAYAR</h1>
@endif
@endsection