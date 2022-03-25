@extends('admin.layouts.admin')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <h5>Editar usuário</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('userUpdate', $user->id) }}" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" value="{{$user->name}}" name="name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" value="{{$user->email}}" name="email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="matricula">Matricula</label>
                                    <input type="matricula" value="{{$user->matricula}}" name="matricula" maxlength="14" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="telefone" value="{{$user->telefone}}" id="telefone" name="telefone" maxlength="15" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success">Atualizar dados</button>
                    </form>
                    <script>
                        function mascara_telefone(o,f){
                            v_obj=o
                            v_fun=f
                            setTimeout("execmascara()",1)
                        }
                        function execmascara(){
                            v_obj.value=v_fun(v_obj.value)
                        }
                        function mtel(v){
                            v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
                            v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
                            v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
                            return v;
                        }
                        function id( el ){
                            return document.getElementById( el );
                        }
                        window.onload = function(){
                            id('telefone').onkeyup = function(){
                            mascara_telefone( this, mtel );
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
