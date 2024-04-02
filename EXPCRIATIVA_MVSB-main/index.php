<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="styleB.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
     .navbar-header{
            width: 500px;
       }
    .card-container {
      display: flex;
      flex-wrap: wrap;
    }
    body{
      background-color: rgb(65,126,126);
    }
 
 .card-button{
  background-color: rgb(150, 150, 143);
 }
    @media (max-width: 768px) {
      #logo11{
        position:relative;
        left: 50px;
      }
      .navbar-header{
            background-color: #f8f7f7;
            color: #000;
            position: absolute;
            left: 30px;
            width: 500px;
       }
      .navbar-brand,#myNavbar{
  background-color: #f8f7f7;
  font-size: large;
  position: relative;
  left: 20px; 
  width:400px;
}
    }
      a{
        color: #000;
      }
      a.dropdown-toggle{
        color: #000;
      }
      #text{
        color: #000;
      }

      
  </style>
</head>

<body>
<?php
session_start();
function mostrarEstrelas($nota) {
    $estrelas = "";
    $nota_inteira = intval($nota); 
    // Adiciona estrelas cheias
    for ($i = 0; $i < $nota_inteira; $i++) {
        $estrelas .= "&#9733;";
    }
    if ($nota - $nota_inteira > 0.5) {
        $estrelas .= "&#9733;";
    }
    return $estrelas;
}


if ($_SESSION['nao_autenticado'] == 0){
  echo "<script>alert('Voce está logado.')</script>";

  // Conexão com o banco de dados
  $servername = "localhost";
  $username = "root";
  $password = "PUC@1234";
  $database = "avalia_acesso_db";

  $conn = new mysqli($servername, $username, $password, $database);

  // Verifica conexão
  if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
  }

  // Consulta SQL para obter o caminho da imagem do usuário
  $nome_usuario = $_SESSION['login'];
  $senha_u = $_SESSION['senha'];
  $sql = "SELECT Foto FROM usuarios WHERE Nome='$nome_usuario' AND Senha = md5('$senha_u')";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $avatar_path = $row['Foto'];
  } else {
    // Se não houver caminho de imagem no banco de dados, use um padrão
    $avatar_path = 'caminho/para/imagem_padrao.jpg';
  }

  // Fecha a conexão
  $conn->close();
?>

<nav class="navbar navbar-inverse" style="color: rgb(212, 218, 223);">
    <div class="container-fluid">
      <div class="navbar-header" style="width: 600px;">
        <button type="button" class="navbar-toggle" style="background-color:#000;  position: absolute;right: 0px;"  data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
        </button>
        <a class="navbar-brand" href="#" style="color:#000 ;font-size: x-large;"> Bem-Vindo ao Avalia Acesso!</a>
        <img src="logo.png" id="logo11" alt="Logo" style="width: 50px;"></img>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar" style="background-color: #f8f7f7;font-size: large;">
        <ul class="nav navbar-nav">
          
          <li class="active"><a href="http://localhost/EXPCRIATIVA_MVSB-MAIN/index.php" style="background-color: #f8f7f7;color: #000;">Home</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background-color: #f8f7f7;color: #000;">Page 1 <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#"style="background-color: #f8f7f7;color: #000;">Page 1-1</a></li>
              <li><a href="#"style="background-color: #f8f7f7;color: #000;">Page 1-2</a></li>
              <li><a href="#"style="background-color: #f8f7f7;color: #000;">Page 1-3</a></li>
            </ul>
          </li>
          <li><a href="#"style="background-color: #f8f7f7;color: #000;">Page 2</a></li>
          <li><a href="#"style="background-color: #f8f7f7;color: #000;">Page 3</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php
          echo '<li><img src="' . $avatar_path . '" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;margin-top:10px;"></li>';
          echo '<li><a href="#" style="color: #000;"> Bem-Vindo, ' . $_SESSION['login'] . '</a></li>';
        ?>
        </ul>
      </div>
    </div>
  </nav>
  
<div class="container">
  <div class="row"> 
  <div class="card-container">
    <div class="col-md-6  col-ms-4 col-lg-3">
      <div class="card">
        <img src="chief.jpg" id="img12" class="logo1" alt="..." style="width: 70%;height: 70%; position: relative;left: 18px;">
        <div class="card-body">
          <button class="card-button" >Logar como Administrador</button>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="card">
        <img src="user.png" class="logo1" alt="..." style="width: 70%;height: 70%; position: relative;left: 18px;">
        <div class="card-body">
          <button class="card-button" onclick="window.location.href = 'http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.html';">Logar como Usuário</button>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="card">
        <img src="signup.jpg" class="logo1" alt="..." style="width: 70%;height: 70%; position: relative;left: 18px;">
        <div class="card-body">
          <button class="card-button" onclick="window.location.href = 'http://localhost/EXPCRIATIVA_MVSB-MAIN/pagcadastrousuario.html';">Cadastrar como Usuário</button>
        </div>
      </div>
    </div>
    <div class="col-md-6  col-lg-3">
      <div class="card" >
        <img src="list.png" class="logo1" alt="..." style="width: 70%;height: 60%; position: relative;left: 28px;">
        <div class="card-body">
          <button class="card-button">Verificar Lista de Avaliações</button>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
<?php
} else {
  echo "<script>alert('Não tem permissão.Volte para a tela de login.')</script>";
  header('Location:http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.html');
}
?>
</body>
</html>
