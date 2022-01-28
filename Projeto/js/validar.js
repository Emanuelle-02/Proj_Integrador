function validar() {
    // pegando o valor do nome pelos names
    var usuario = document.getElementById("usuario");
    var senha = document.getElementById("senha");

    // verificar se o nome está vazio
    if (usuario.value == "") {
      alert("Usuário não informado");

      // Deixa o input com o focus
      usuario.focus();
      // retorna a função e não olha as outras linhas
      return;
    }
    if (senha.value == "") {
      alert("Senha não informada");
      senha.focus();
      return;
    }
    // envia o formulário
    //formulario.submit();
  }