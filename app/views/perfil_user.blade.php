@extends('template')

@section('conteudo')
<h1>Perfil</h1>
			<div class="row_fluid">
				<div class="span4">
					<img src="{{Request::root()}}/avatars/{{$user->avatar}}" 
					alt="{{$user->nome}}" title="{{$user->nome}}" width="250" height="200" />
				</div>
				<div class="span6">
					<table class="table table-striped">
						<tbody>
							<tr>
								<td><strong>Nome: </strong> {{$user->nome}}</td>
							</tr>
							<tr>
								<td><strong>Email: </strong> {{$user->email}}</td>
							</tr>
							<tr>
								<td><strong>Telefone: </strong> {{$user->telefone}}</td>
							</tr>
							<tr>
								<td>
									<iframe width="100%" height="230" src="//www.youtube.com/embed/{{$user->video}}" frameborder="0" allowfullscreen></iframe>
								</td>
							</tr>
						</tbody>
					</table>
					<a href="{{URL::route('home')}}" class="btn btn-inverse">Voltar</a>
				</div>
			</div>
@stop