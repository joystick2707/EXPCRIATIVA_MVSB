<!DOCTYPE html>
<html lang="en">
<head>
  <title>Pag Usuario - Avalia Acesso</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="styleB.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    .navbar-header{
            width: 400px;
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
      #l1,#l2,#i1{
        display:none;
      }
      #l3{
        position: relative;
        left:25px;
      }
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


if ($_SESSION['nao_autenticado'] == 0 && $_SESSION['autadm']==true){
  echo "<script>alert('Voce está logado como administrador.')</script>";

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
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background-color: #f8f7f7;color: #000;">Info - Site<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#"style="background-color: #f8f7f7;color: #000;">Page 1-1</a></li>
              <li><a href="#"style="background-color: #f8f7f7;color: #000;">Page 1-2</a></li>
              <li><a href="#"style="background-color: #f8f7f7;color: #000;">Page 1-3</a></li>
            </ul>
          </li>
          <li><a href="#"style="background-color: #f8f7f7;color: #000;">Info - Avalia Acesso</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
        <?php
          echo '<li id="l1"><img src="' . $avatar_path . '" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;margin-top:10px;position:relative;right:13px;"></li>';
          echo '<li id="l2"><a href="#" style="position:relative;right:40px;color: #000;"> Bem-Vindo, ' . $_SESSION['login'] . '</a></li>';
          echo '<li id="l3" onclick="window.location.href= \'http://localhost/EXPCRIATIVA_MVSB-MAIN/expirarlogin.php\' "><a style="position:relative;right:29px;top:5px;color: #000;" href="http://localhost/EXPCRIATIVA_MVSB-MAIN/expirarlogin.php" > Sair </a><img id="i1" style="position:relative;right:-26px;top:-35px;width:30px;height:30px;"src="img\logout.JPG"></img></li>';
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
        <img src="config.JPG" id="img12" class="logo1" alt="..." style="width: 70%;height: 70%; position: relative;left: 18px;">
        <div class="card-body">
          <button class="card-button" onclick="window.location.href = 'http://localhost/EXPCRIATIVA_MVSB-MAIN/editaperfil.php' ">Editar perfil</button>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="card">
        <img src="avaliaC.JPG" class="logo1" alt="..." style="width: 70%;height: 70%; position: relative;left: 18px;">
        <div class="card-body">
          <button class="card-button" onclick="window.location.href = 'http://localhost/EXPCRIATIVA_MVSB-MAIN/pagavaliaestab.php' ">Avaliar Estabelecimento</button>
        </div>
      </div>
    </div>
    <div class="col-md-6  col-lg-3">
      <div class="card" >
        <img src="list.png" class="logo1" alt="..." style="width: 70%;height: 60%; position: relative;left: 28px;">
        <div class="card-body">
          <button class="card-button" onclick="window.location.href = 'http://localhost/EXPCRIATIVA_MVSB-MAIN/listaestab.php' ">Verificar Lista de Avaliações</button>
        </div>
      </div>
    </div>
    <div class="col-md-6  col-lg-3">
      <div class="card" >
        <img src="img/clean.JPG" class="logo1" alt="..." style="width: 70%;height: 60%; position: relative;left: 28px;">
        <div class="card-body">
          <button class="card-button" onclick="window.location.href = 'http://localhost/EXPCRIATIVA_MVSB-MAIN/pagexcluirestab.php' ">Limpar Lista (Excluir Avaliações)</button>
        </div>
      </div>
    </div>
    <div class="col-md-6  col-lg-3">
      <div class="card" >
        <img src="img/userlist.JPG" class="logo1" alt="..." style="width: 70%;height: 60%; position: relative;left: 28px;">
        <div class="card-body">
          <button class="card-button" onclick="window.location.href = 'http://localhost/EXPCRIATIVA_MVSB-MAIN/listausuario.php' ">Verificar Lista de Usuários</button>
        </div>
      </div>
    </div>
    <div class="col-md-6  col-lg-3">
      <div class="card" >
        <img src="img/exc.JPG" class="logo1" alt="..." style="width: 70%;height: 60%; position: relative;left: 28px;">
        <div class="card-body">
          <button class="card-button" onclick="window.location.href = 'http://localhost/EXPCRIATIVA_MVSB-MAIN/pagexcluirusuario.php' ">Excluir Usuários</button>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
<?php
} else {
  echo "<script>alert('Não tem permissão.Volte para a tela de login.')</script>";
  $_SESSION['naoadm']=true;
  header('Location:http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php');
}
?>
</body>
</html>
