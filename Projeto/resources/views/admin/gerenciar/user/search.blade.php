@extends('admin.layouts.admin')
@section('content')
<head>
    <style>
        .btn-primary {
          margin-bottom: 10px;
        }
        .form-control {
          margin-bottom: 10px;
        }
        .btn-default{
          margin-bottom: 10px;
          color: white;
          background-color:black;
        }
    </style>
</head>
<div class="row justify-content-center">
          <div class="col-md-10">
          <div class="row">
                <div class="col-md-3">
                    <h5>Resultado da busca</h5>
                </div>
                <div class="col-md-9 text-right m-b-10">
                    <a href="{{route('adminDashboard')}}" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
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
                </div>
            </div>
        </div>
@endsection