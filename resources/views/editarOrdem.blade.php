@extends('layout')

@section('editarOrdem')

<div class="formOrdem">
	<form method="post" action="/{{$ordem->id}}/ordemUpdate" id="formOrdem1" >
		@csrf
		@method('PATCH')
 		<h4>Editar Ordem de Serviço</h4>
			<input type="hidden" name="ordem_id" value="{{$ordem->id}}">
			<input type="text" name="servico" placeholder="Serviço Prestado" value="{{$ordem->servico}}" required>

			<input type="date" name="dataServico" placeholder="Data de Serviço" value="{{$ordem->dataServico}}" required>

			<input type="text" name="valor" placeholder="valor" value="{{$ordem->valor}}" required>

			<select name="pago">
			    <option value="nao" {{($ordem['pago']=='nao'?'selected':'')}}>Não</option>
			    <option value="sim" {{($ordem['pago']=='sim'?'selected':'')}}>Sim</option>
  			</select>

			<textarea name="observacao" placeholder="Descrição do Serviço">{{$ordem->observacao}}</textarea>

		<input type="submit" name="button" value="Atualizar" class="btn bg-success" style="color: white">

	</form>
</div>


@endsection