@extends('admin.layouts.admin')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-3">
                    <h5>Cadastrar novo usuário</h5>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('userStore') }}" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nome</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="matricula">Matricula</label>
                                    <input type="matricula" name="matricula" maxlength="15" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="telefone" id="telefone" name="telefone" placeholder="(99)99999-9999" maxlength="15" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="password">Senha</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                                <div class="mt-4">
                                    <label for="role_id" :value="__('Register As')">Categoria</label>
                                    <select id="role_id"  class="block mt-1 w-full"
                                        name="role_id" required>
                                        <option value="#">Selecione uma categoria...</option>
                                        <option value="administrador ">Administrador</option>
                                        <option value="bibliotecario">Bibliotecario</option>
                                        <option value="usuario">Usuario</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success">Cadastrar usuário</button>
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
