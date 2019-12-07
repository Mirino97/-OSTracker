@extends('layout')

@section('content')
<form method="post" action="/{{ $equipamento->id }}/equipamentoUpdate">
	@csrf
	@method('PATCH')
	<h4>Cadastrar Novo Equipamento</h4>
	<input type="hidden" name="equipamento_id" value="{{ $equipamento->id }}">
	<input type="text" name="nome" placeholder="nome" value="{{ $equipamento->nome }}">
	<input type="text" name="usuario" placeholder="usuário" value="{{ $equipamento->usuario }}">
	<input type="text" name="processador" placeholder="processador" value="{{ $equipamento->processador }}">
	<input type="text" name="ram" placeholder="ram" value="{{ $equipamento->ram }}">
	<input type="text" name="hd" placeholder="hd" value="{{ $equipamento->hd }}">
	<select name="ethernet">
		<option value="cabo" {{($equipamento['ethernet']=='cabo'?'selected':'')}}>Cabo</option>
		<option value="wifi" {{($equipamento['ethernet']=='wifi'?'selected':'')}}>Wi-Fi</option>
	</select>
	<input type="text" name="ip" placeholder="ip">
	<select name="ipfixo">
		<option value="nao" {{($equipamento['ipfixo']=='nao'?'selected':'')}}>Não</option>
		<option value="sim" {{($equipamento['ipfixo']=='sim'?'selected':'')}}>Sim</option>
	</select>
	<input type="text" name="programas" placeholder="programas">
	<input type="submit" name="submit">

</form>

@endsection