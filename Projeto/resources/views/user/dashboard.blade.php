@extends('user.layouts.user')
@section('content')
<!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$livrosCount}}</h3>

                <p>Títulos para empréstimo</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer"><i class="fas fa-arrow-circle-down"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        
        <!-- Conteúdo -->
        <head>
            <style>
                .btn-primary {
                    margin-bottom: 10px;
                }
                .form-control {
                  margin-bottom: 10px;
                }

                .btn-secondary{
                  margin-bottom: 10px;
                  color: white;
                  background-color:black;
                }
                .btn-default{
                  margin-bottom: 10px;
                  width: 90px;
                }
                .card{
                  width: 100%;
                  overflow-x: auto;
                }
            </style>
            <script>
              function alerta()
              {
              alert("Livro temporariamente indisponível!");
              }
            </script>
            <script>
              function alerta2()
              {
              alert("Limite");
              }
            </script>

        </head>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    <div class="col-md-3">
                        <h5>Acervo</h5>
                    </div>
                    <div id="busca-container" class="col-md-10">
                        <form action="{{ route('busca') }}" type="get">
                            <input type="text" name="query" type="search" class="form-control" placeholder="Buscar livro por id/título/autor ou gênero"  required>
                            <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i> Buscar</button>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Título</th>
                                    <th>Autor</th>
                                    <th>Genero</th>
                                    <th>Status</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- puxa os dados do banco -->
                                @foreach($livros as $livro)
                                <tr>
                                    <td>{{ $livro->id }}</td>
                                    <td>{{ $livro->titulo }}</td>
                                    <td>{{ $livro->autor }}</td>
                                    <td>{{ $livro->genero }}</td>
                                    <td>
                                        @if($livro->disponibilidade > 0)
                                           <font color="green">Disponível</font>  
                                        @else
                                            <font color="red">Indísponivel</font>
                                        @endif         	
                                        </b>
                                    </td> 
                                    <td>
                                      @if($livro->disponibilidade > 0)
                                        <a href="{{route('livroDetalhe', $livro->id)}}" class="btn btn-default btn-sm"><i class="fa fa-info-circle"></i> info</a>
                                        <form action="{{ route('emprestimo', $livro->id) }}" method="POST">
                                        @csrf
                                          <input type='submit' class="btn btn-info btn-sm" value="Emprestimo" >
                                        </form>
                                        @else
                                        <input type="button" class="btn btn-info btn-sm" onclick="alerta()" value="Emprestimo" />
                                        @endif
                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Paginação -->
                    <div class="row justify-content-center">
                        {!! $livros->links('pagination::bootstrap-4') !!}
                    </div>
                    </div>
                </div>
            </div>
        </div>
@endsection