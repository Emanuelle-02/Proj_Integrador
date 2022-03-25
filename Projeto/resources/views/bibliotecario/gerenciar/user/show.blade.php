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
                    <h5>Lista de Usuários</h5>
                </div>
                
                <div class="col-md-9 text-right m-b-10">
                    <a href="{{route('bibliotecarioDashboard')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
                </div>
            </div>
            <div id="busca-container" class="col-md-10">
                <form action="{{ route('buscar') }}" type="get">
                  <input type="text" name="query" type="buscar" class="form-control" placeholder="Buscar usuário por id/nome ou email"  required>
                  <button class="btn btn-default" type="submit"><i class="fas fa-search"></i> Buscar</button>
                </form>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Criado em</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- puxa os dados do banco -->
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="{{route('userDetalhes', $user->id)}}" class="btn btn-info btn-sm">Detalhes</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- Paginação -->
                    <div class="row justify-content-center">
                        {!! $users->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection