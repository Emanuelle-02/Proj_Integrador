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
            <label for="titulo">Título:*</label>
            <input
              type="text"
              id="titulo"
              placeholder="Insira o título"
            />
          </div>
          <div class="input-group">
            <label for="autor">Autor:*</label>
            <input type="autor" id="autor" placeholder="Insira o autor" />
          </div>
          <div class="input-group">
            <label for="genero">Gênero:*</label>
            <input type="genero" id="genero" placeholder="Insira o gênero" />
          </div>
          <div class="input-group">
            <label for="descricao">Descrição:*</label>
            <input
              type="text"
              id="descricao"
              placeholder="Insira a descrição"
            />
          </div>
          <div class="input-group">
            <label for="isbn">ISBN:*</label>
            <input
              type="text"
              id="isbn"
              placeholder="Insira o ISBN"
            />
          </div>
          <div class="input-group">
            <label for="paginas">Número de páginas:*</label>
            <input
              type="number"
              id="paginas"
              placeholder="Insira o número de páginas"
            />
          </div>
          <div class="input-group">
            <label for="quantidade">Quantidade:*</label>
            <input
              type="number"
              id="quantidade"
              placeholder="Quantidade"
            />
          </div>
        <div class="footer">
          <button type="button" class="botao" onclick="validar()">
            Cadastrar
          </button>
          <a href="inicio.php"><button type="button" class="botao">Voltar</button></a>
        </div>
      </form>
    
      <script>
        /* Função Validar */
        function validar() {
          // pegando o valor do nome pelos names
          var titulo = document.getElementById("titulo");
          var autor = document.getElementById("autor");
          var genero = document.getElementById("genero");
          var descricao = document.getElementById("descricao");
          var isbn = document.getElementById("isbn");
          var quantidade = document.getElementById("quantidade");
          var paginas = document.getElementById("paginas");

          if (titulo.value == "") {
            alert("Título não informado");
            titulo.focus();
            return;
          }
          if (autor.value == "") {
            alert("Autor não informado");
            autor.focus();
            return;
          }
          if (genero.value == "") {
            alert("Gênero não informado");
            genero.focus();
            return;
          }
          if (descricao.value == "") {
            alert("Descrição não informada");
            descricao.focus();
            return;
          }
          if (isbn.value == "") {
            alert("ISBN não informado");
            isbn.focus();
            return;
          }
          if (quantidade.value == "") {
            alert("Quantidade não informada");
            quantidade.focus();
            return;
          }
          if (paginas.value == "") {
            alert("Número de páginas não informado");
            paginas.focus();
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