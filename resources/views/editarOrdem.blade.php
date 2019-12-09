@extends('layout')
@section('editarOrdem')
<form method="post" action="/{{$ordem->id}}/ordemUpdate">
	@csrf
	@method('PATCH')
	<h4>Editar Ordem de Serviço</h4>
	<input class="w-100 rounded p-2 mb-2" type="hidden" name="ordem_id" value="{{$ordem->id}}">
	<div class="row">
		<div class="col-12"><input class="w-100 rounded p-2 mb-2" type="text" name="servico" placeholder="Serviço Prestado" value="{{$ordem->servico}}" required></div>
	</div>
	<div class="row">
		<div class="col-4"><input class="w-100 rounded p-2 mb-2" type="date" name="dataServico" placeholder="Data de Serviço" value="{{$ordem->dataServico}}" required></div>
		<div class="col-4"><input class="w-100 rounded p-2 mb-2" type="text" name="valor" placeholder="valor" value="{{$ordem->valor}}" required></div>
		<div class="col-2">
			<select class="w-100 rounded p-2 mb-2" name="pago">
				<option value="nao" {{($ordem['pago']=='nao'?'selected':'')}}>Não</option>
				<option value="sim" {{($ordem['pago']=='sim'?'selected':'')}}>Sim</option>
			</select>
		</div>
		<div class="col-2">
			<select class="w-100 rounded p-2 mb-2" name="estado">
				<option value="pendente" {{($ordem['estado']=='pendente'?'selected':'')}}>Pendente</option>
				<option value="em andamento" {{($ordem['estado']=='em andamento'?'selected':'')}}>Em Andamento</option>
				<option value="concluido" {{($ordem['estado']=='concluido'?'selected':'')}}>Concluído</option>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="col-12"><textarea class="w-100 rounded p-2 mb-2" name="observacao" placeholder="Descrição do Serviço">{{$ordem->observacao}}</textarea></div>
	</div>
	<div class="row justify-content-center">
		<div class="col-4"><input class="w-100 bg-success border-0 rounded p-2 mb-2" type="submit" name="button" value="Atualizar" class="btn bg-success" style="color: white"></div>
	</div>
</form>
@endsection