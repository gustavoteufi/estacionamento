<?php

require_once('./crud/crudUsuario.php');
$usuario = new Usuarios('estacionamento', 'localhost', 'postgres', '0511');
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastrar</title>
  <link rel="icon" href="../assets/images/icon/parking (1).png">
  <link rel="stylesheet" href="assets/css/style_login.css">

</head>

<body>

  <?php

  if (isset($_POST['nome'])) {

    $nome = addslashes($_POST['nome']);

    $cpf = addslashes($_POST['cpf']);

    $email = addslashes($_POST['email']);

    $senha = addslashes($_POST['senha']);
    $acesso = addslashes($_POST['acesso']);


    if (!empty($nome) && !empty($cpf)  && !empty($email) && !empty($senha) && !empty($acesso))
    {
      if($usuario->msgErro == "")
      {

     
      if (!$usuario->cadastrarusuariologin($nome, $cpf, $email, $senha,  $acesso,))

       {
            // echo "email ja cadastrado";
            echo '<div class="msg-err">Usuario ja cadastrado</div>';
    }
    else

{
  echo '<div class="msg-sucess">Usuario cadastrado com sucesso</div>';
}
  
  
 
  }
  else
  {
    echo "Erro : . $usuario->msgErro";
  }
  }
}else{
  // echo '<div class="msg-err">Preencha todos os campos</div>';
}
  ?>

  <script>
    function mascara_cpf() {
      var cpf = document.getElementById('cpf')
      if (cpf.value.length == 3 || cpf.value.length == 7) {
        cpf.value += "."
      } else if (cpf.value.length == 11) {
        cpf.value += "-"
      }
    }
  </script>
  <div class="login-page">
    <div class="form">
      <form class="login-form" method="POST">

        <div class="input-group">
          <label class="label">Nome completo</label>
          <input autocomplete="off" name="nome" id="nome" class="input" type="text">
          <div></div>
        </div>

        <div class="input-group">
          <label class="label">Usuario</label>
          <input autocomplete="off" name="email" id="email" class="input" type="email">
          <div></div>
        </div>
        <div class="input-group">
          <label class="label">CPF</label>
          <input autocomplete="off" name="cpf" id="cpf" class="input" type="text" autocomplete="off" maxlength="14" onkeyup="mascara_cpf()">
          <div></div>
        </div>
        <div class="input-group">
          <label class="label">Senha</label>
          <input autocomplete="off" name="senha" id="senha" class="input" type="password">
          <div></div>
        </div>

        <div class="input-group">
          <br>
          <label class="label_acesso">Acesso</label>
          <br>
          <br>
          <select name="acesso" id="acesso">
            <option value="" hidden>Selecione</option>
            <option value="Admin">Admin</option>
            <option value="Funcionario">Funcionario</option>
          </select>
          <div></div>
        </div>
        <button class="btn"> Enviar
        </button>

      </form>
      <a href="../index.php">
        <button>
          <span>Voltar</span>
        </button>
      </a>
    </div>
  </div>






</body>

</html>