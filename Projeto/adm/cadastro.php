<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Cadastro | IFRN-Lib.</title>
    <link rel="stylesheet" href="../estilo2.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <header>
      <h1>IFRN-Lib.</h1>
    </header>
    <nav>
      <ul>
        <li class="sair"><a href="../index.php">Logout</a></li>
      </ul>
    </nav>
    <div class="wrapper">
      <!-- Formulário -->
      <form action="" id="formulario" method="POST" name="formulario">
        <legend>
          Cadastro IFRN-Lib.
        </legend>
        <div class="input-group">
          <label for="nome">Nome:*</label>
          <input
            type="text"
            id="nome"
            name="nome"
            placeholder="Insira o nome"
          />
          <div class="input-group">
            <label for="cpf">Cpf:*</label>
            <input
              type="text"
              id="cpf"
              name="cpf"
              placeholder="Insira o cpf"
              maxlength="14"
              onkeypress="mascaraCpf(this)"
            />
        </div>
        <div class="input-group">
          <label for="matricula">Matricula:*</label>
          <input
            type="number"
            id="matricula"
            placeholder="Insira a matrícula"
          />
        </div>
        <div class="input-group">
          <label for="email">E-mail:*</label>
          <input type="email" id="email" placeholder="Insira o e-mail" />
        </div>
        <div class="input-group">
          <label for="senha">Senha:*</label>
          <input type="password" id="senha" placeholder="Insira a senha" />
        </div>
          <div class="input-group">
            <label for="telefone">Telefone:*</label>
            <input
              type="text"
              id="telefone"
              placeholder="Insira o telefone"
              maxlength="15"
            />
          </div>
        <div class="colunas">
          <div class="input-group">
            <label for="tipo">Tipo:*</label>
            <select name="tipo" id="tipo">
              <option value="">informar...</option>
              <option value="user">Usuário</option>
              <option value="staff">Bibliotecário</option>
            </select>
          </div>
        </div>
        <div class="footer">
          <button type="button" class="botao" onclick="validar()">
            Cadastrar
          </button>
          <a href="inicio.php"><button type="button" class="botao">Voltar</button></a>
        </div>
      </form>
      <script>
        function mascaraCpf(element){
            let cpf = element.value
            if(cpf.length===3||cpf.length===7){
              element.value = cpf + '.'
            }
            else if(cpf.length===11){
              element.value = cpf + '-'
            }
        }  
      </script>
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

      <script>
        function validar() {
          var nome = document.getElementById("nome");
          var cpf = document.getElementById("cpf");
          var matricula = document.getElementById("matricula");
          var email = document.getElementById("email");
          var senha = document.getElementById("senha");
          var telefone = document.getElementById("telefone");
          var tipo = document.getElementById("tipo");

          if (nome.value == "") {
            alert("Nome não informado");
            nome.focus();
            return;
          }
          if (cpf.value == "") {
            alert("Cpf não informado");
            cpf.focus();
            return;
          }
          if (matricula.value == "") {
            alert("Matricula não informada");
            matricula.focus();
            return;
          }
          if (email.value == "") {
            alert("E-mail não informado");
            email.focus();
            return;
          }
          if (senha.value == "") {
            alert("Senha não informada");
            senha.focus();
            return;
          }
          if (telefone.value == "") {
            alert("Telefone não informado");
            telefone.focus();
            return;
          }
          if (tipo.value == "") {
            alert("Tipo de usuário não informado");
            sexo.focus();
            return;
          }
          alert("Formulário enviado!");
          // envia o formulário
          formulario.submit();
        }
      </script>
    </div>
  </body>
</html>