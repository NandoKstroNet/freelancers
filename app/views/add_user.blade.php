@extends('template')

@section('conteudo')
<div class="hero-unit">
	<h1>Cadastro</h1>
	@if(isset($returns) && $returns == TRUE)
		<p class="alert alert-success">
			Cadastro com sucesso!
		</p>
	@endif
	@if(isset($returns) && $returns == FALSE)
	<p class="alert alert-error">
			É preciso enviar uma imagem! 
		</p>
	@endif
	@if(isset($video))
	<p class="alert alert-error">
			{{$video}} 
		</p>
	@endif
	<p>
		@if(count($errors) > 0)
			Errors encontrados: <br>
			<ul class="alert alert-error">
				@foreach($errors->all() as $e)
					<li>{{$e}}</li>
				@endforeach
			</ul>
		@endif
	</p>
	{{Form::open(array("url" => "user/add", "enctype" => "multipart/form-data"))}}
		<p>
			{{Form::label('nome', 'Nome Completo: ')}}
			{{Form::text('nome')}}
		</p>
		<p>
			{{Form::label('email', 'Email válido: ')}}
			{{Form::email('email')}}
		</p>
		<p>
			{{Form::label('telefone', 'Telefone: ')}}
			{{Form::text('telefone')}}
		</p>
		<p>
			{{Form::label('avatar', 'Faça o upload de seu avatar aqui: ')}}
			{{Form::file('avatar')}}
		</p>
		<p>
			{{Form::label('video', 'Envie um video seu que esteja alocado no youtube, cadastre somente a URL do mesmo: ')}}
			{{Form::text('video')}}
		</p>
		{{Form::submit("Cadastrar", array("class" => "btn btn-success"))}}
	{{Form::close()}}
</div>
@stop
