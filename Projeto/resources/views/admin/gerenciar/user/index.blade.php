@extends('admin.layouts.admin')
@section('content')
<head>
    <style>
        .btn-primary {
            margin-bottom: 10px;
        }
    </style>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
</head>
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <h5>Gerenciar Usuários</h5>
                </div>
                <div class="col-md-9 text-right m-b-10">
                    <a href="{{ route('cadastrarUser') }}" class="btn btn-primary"><i class="fa fa-user-plus"></i>Cadastrar novo usuário</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
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
                                <td>{{ $name->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->created_at }}</td>
                                <td>
                                    <a href="{{route('userDetails', $user->id)}}" class="btn btn-secondary btn-sm"><i class="fa fa-chevron-right"></i></a>
                                    <a href="{{route('userEdit', $user->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a>
                                    <form action="{{ route('userDelete', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                                    </form>
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