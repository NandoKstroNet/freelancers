@extends('template')

@section('conteudo')
<h1>Freelancers cadastrados</h1>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Avatar</th>
            <th>Nome</th>
            <th>Contato</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>
                @if($user->avatar)
                     <img src="{{Request::root()}}/avatars/{{$user->avatar}}" alt="{{$user->nome}}" title="{{$user->nome}}" width="40" height="40" />
                @else
                     <img src="{{Request::root()}}/assets/img/avatar.jpg" alt="{{$user->nome}}" title="{{$user->nome}}" width="40" height="40" />
                @endif
            </td>
            <td>{{$user->nome}}</td>
            <td>{{$user->telefone}}</td>
            <td><a href="{{URL::route('perfil')}}/{{$user->id}}" class="btn btn-primary">Visualizar Perfil</a></td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop