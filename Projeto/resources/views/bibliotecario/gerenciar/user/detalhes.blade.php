@extends('bibliotecario.layouts.bibliotecario')
@section('content')
<head>
    <style>
        .btn-default {
                margin-bottom: 10px;
                background-color: black;
                color: white;
            }
    </style>
</head>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <h5>Detalhes do usuário</h5>
                </div>
                <div class="col-md-9 text-right m-b-10">
                    <a href="{{route('userShow')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">Nome</label>
                            <pre>{{$user->name}}</pre>
                        </div>
                        <div class="col-md-6">
                            <label for="email">Email</label>
                            <pre>{{$user->email}}</pre>
                        </div>
                        <div class="col-md-6">
                            <label for="matricula">Matricula</label>
                            <pre>{{$user->matricula}}</pre>
                        </div>
                        <div class="col-md-6">
                            <label for="telefone">Telefone</label>
                            <pre>{{$user->telefone}}</pre>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="roles">Categoria:</label>
                                @foreach($user->roles as $role)
                                    <pre>{{$role->display_name}}</pre>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection