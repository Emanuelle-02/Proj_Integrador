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
        .card{
          width: 100%;
          overflow-x: auto;
        }
    </style>
</head>
    <!-- Small boxes (Stat box) -->
    <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$usuariosCount}}</h3>

                <p>Usuários cadastrados</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <p class="small-box-footer">Mais informações <i class="fas fa-arrow-circle-down"></i></p>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="card">
              <div class="card-body">
                    <h4>Gerenciar usuários</h4>
              </div>
              <div id="busca-container" class="col-md-10">
                <form action="{{ route('buscarUser') }}" type="get">
                  <input type="text" name="query" type="buscarUser" class="form-control" placeholder="Buscar usuário por id/nome ou email"  required>
                  <button class="btn btn-default" type="submit"><i class="fas fa-search"></i> Buscar</button>
                </form>
              </div>
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
@endsection