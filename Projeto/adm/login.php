<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Cadastro | IFRN-Lib.</title>
    <link rel="stylesheet" href="../css/estilo2.css" />
    <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap"
      rel="stylesheet"
    />
  </head>
  <body>
    <div class="wrapper">
      <!-- Formulário -->
      <form action="" id="formulario" method="POST" name="formulario">
        <legend>
          IFRN-Lib. | Login
        </legend>
        <div class="input-group2">
          <label for="usuario">Usuário:</label>
          <input
            type="text"
            id="usuario"
            name="usuario"
            placeholder="usuario"
          />
        </div>
        <div class="input-group2">
          <label for="senha">Senha:</label>
          <input type="password" id="senha" placeholder="Insira a senha" />
        </div>
        <div class="footer">
          <a class="caps" href="inicio.php"><button type="button" class="botaoLog" onclick="validar()">
            Entrar
          </button></a>
        </div>
      </form>

      <script src="../js/validar.js">
      </script>
    </div>
  </body>
</html>