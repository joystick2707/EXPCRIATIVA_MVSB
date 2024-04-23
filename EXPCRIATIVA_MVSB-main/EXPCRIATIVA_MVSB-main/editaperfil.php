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
      #l1,#l2,#i1{
        display:none;}
      #logo11{
        position:relative;
        left: 50px;
      }
      #l3{
        position: relative;
        left:35px;
        top:-15px;
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

  $servername = "localhost";
  $username = "root";
  $password = "PUC@1234";
  $database = "avalia_acesso_db";

  $conn = new mysqli($servername, $username, $password, $database);

  if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
  }

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
          echo '<li id="l1"><img src="' . $avatar_path . '" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;margin-top:10px;position:relative;right:13px;"></li>';
          echo '<li id="l2"><a href="#" style="position:relative;right:40px;color: #000;"> Bem-Vindo, ' . $_SESSION['login'] . '</a></li>';
          echo '<li id="l3" onclick="window.location.href= \'http://localhost/EXPCRIATIVA_MVSB-MAIN/expirarlogin.php\' "><a style="position:relative;right:29px;top:5px;color: #000;" href="http://localhost/EXPCRIATIVA_MVSB-MAIN/expirarlogin.php" > Sair </a><img id="i1" style="position:relative;right:-26px;top:-35px;width:30px;height:30px;"src="img\logout.JPG"></img></li>';
        ?>
        </ul>
      </div>
    </div>
  </nav>
  <?php


if (!isset($_SESSION['login'])) {
    header('Location: http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php');
    exit();
}


$servername = "localhost";
$username = "root";
$password = "PUC@1234";
$database = "avalia_acesso_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}


$nome_usuario = $_SESSION['login'];
$senha_u = $_SESSION['senha'];
$sql = "SELECT * FROM usuarios WHERE Nome='$nome_usuario' AND Senha = md5('$senha_u')";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Exibe os dados do usuário em uma tabela estilizada
    echo "<table style='border-collapse: separate; border-spacing: 20px; border: 2px solid #333; border-radius: 20px; width: 60%; margin: 50px auto; background-color: #f0f0f0;'>";
    echo "<tr><th colspan='2' style='background-color: #333; color: #fff; padding: 15px; border-top-left-radius: 20px; border-top-right-radius: 20px;'>Dados do Usuário Atual</th></tr>";
    echo "<tr>";
    echo "<td style='padding: 15px; width: 100px; font-size: larger;'>Nome Atual:</td>";
    echo "<td style='padding: 10px; font-size: larger;'>" . $row['Nome'] . " </td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td style='padding: 15px; width: 100px; font-size: larger;'>Senha Atual:</td>";
    echo "<td style='padding: 10px; font-size: larger;'>";
    echo "<input type='password' id='senha1' value='" . htmlspecialchars($senha_u) . "'>";
    echo "<button onclick='mostrarSenha()'>Mostrar Senha</button>";
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td style='padding: 15px; width: 100px; font-size: larger;'>Foto Atual:</td>";
    echo "<td style='padding: 10px; font-size: larger;'><img src=".$row['Foto']."></img> </td>";
    echo "</tr>";
    echo "<tr>";
    echo "</table>";   
    echo "<form action='http://localhost/EXPCRIATIVA_MVSB-MAIN/updateperfil.php' method='POST'>";
    echo "<table style='border-collapse: separate; border-spacing: 20px; border: 2px solid #333; border-radius: 20px; width: 60%; margin: 20px auto; background-color: #f0f0f0;'>";
    echo "<tr><th colspan='2' style='background-color: #333; color: #fff; padding: 15px; border-top-left-radius: 20px; border-top-right-radius: 20px;'>Editar Dados do Usuário</th></tr>";
    echo "<tr><td style='padding: 10px;'>Novo Nome:</td><td style='padding: 10px;'><input type='text' name='nome' style='width: 100%; padding: 5px; border-radius: 10px; border: 1px solid #333;'></td></tr>";
    echo "<tr><td style='padding: 10px;'>Nova Senha:</td><td style='padding: 10px;'><input type='password' id='senha' name='senha' style='width: 85%; padding: 5px; border-radius: 10px; border: 1px solid #333;'><button type='button' onclick='toggleSenha()' style='margin-left: 5px; padding: 5px 10px; background-color: #333; color: #fff; border: none; border-radius: 10px; cursor: pointer;'>Mostrar</button></td></tr>";
    echo "<tr><td style='padding: 10px;'>Nova Foto:</td><td style='padding: 10px;'><input type='file' name='foto' style='width: 100%; padding: 5px; border-radius: 10px; border: 1px solid #333;'></input></td></tr>";
    echo "<tr><td colspan='2' style='text-align: center;'><input type='submit' value='Salvar' style='padding: 10px 20px; background-color: #333; color: #fff; border: none; border-radius: 10px; cursor: pointer;'></td></tr>";
    echo "</table>";
    echo "</form>";
} else {
    echo "Usuário não encontrado.";
}
$conn->close();
} else {
    echo "<script>alert('Não tem permissão.Volte para a tela de login.')</script>";
    header('Location:http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php');
  }
?>

<script>
function toggleSenha() {
    var senhaInput = document.getElementById('senha');
    if (senhaInput.type === "password") {
        senhaInput.type = "text";
    } else {
        senhaInput.type = "password";
    }
}
function mostrarSenha() {
        var senhaInput = document.getElementById('senha1');
        if (senhaInput.type === 'password') {
            senhaInput.type = 'text';
        } else {
            senhaInput.type = 'password';
        }
    }
</script>

