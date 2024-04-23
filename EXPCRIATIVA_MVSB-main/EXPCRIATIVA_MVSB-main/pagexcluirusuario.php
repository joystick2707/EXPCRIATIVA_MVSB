<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="styleB.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
       .navbar-header{
            width: fit-content;
       }
        .col-md-9{
            position: absolute;
            top:0px;
            left: 900px;
            width:fit-content;
            height:100%;
        }
        .col-ms-4{
            position: absolute;
            top:0px;
            left: 600px;
            width:fit-content;
            height:100%;
        }
        .form-image{
            position: absolute;
            left: 310px;
            top:0px;
            width:60%;
        }
        @media (max-width: 768px) {
      #l1,#l2,#i1,#i2{
        display:none;
      }
      #l3{
        position: relative;
        left:25px;
      }
            .form-image {
                position: absolute;
                width: 80%;
                left: 110px;
                top: 0px;
            }
            #myNavbar{
                color: wheat;
                z-index:999;
                position: absolute;
                top: 0px;
                left:520px;
                
            }
            .navbar-header{
            background-color: #f8f7f7;
            color: #000;
            position: absolute;
            left: 90px;
            width: 500px;
       }
       .navbar-brand{
            color: #f8f7f7;;
       }
       .navbar-inverse{
        height:100px;
       }
       .container-fluid{
            width: fit-content;
       }
            nav{
                width:fit-content;
            }
            .form {
                width: fit-content;
                left: 380px;
                top: 0px;
        }
        .col-md-9 {
            width:fit-content;
        }
        #error-messages{
            position: absolute;
            top:370px;
            left: 0px;
        }
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
} else {
    echo "<script>alert('Você não está logado.')</script>";
  }
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
  if(isset($_SESSION['login'])){
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
}
  // Fecha a conexão
  $conn->close();
?>

<nav class="navbar navbar-inverse" style="color: rgb(212, 218, 223);height:60px;z-index:101;">
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
      <div class="collapse navbar-collapse" id="myNavbar" style="background-color: #f8f7f7;font-size:large;height:30px;">
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
        <?php if(isset($_SESSION['login'])){
          echo '<li id="l1"><img id="i2" src="' . $avatar_path . '"alt="" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;margin-top:10px;position:relative;right:13px;"></li>';
          echo '<li id="l2"><a href="#" style="position:relative;right:40px;color: #000;"> Bem-Vindo, ' . $_SESSION['login'] . '</a></li>';
          echo '<li id="l3"><a style="position:relative;right:29px;top:5px;color: #000;" href="http://localhost/EXPCRIATIVA_MVSB-MAIN/expirarlogin.php" > Sair </a><img id="i1" style="position:relative;right:-26px;top:-35px;width:30px;height:30px;"src="img\logout.JPG"></img></li>';
        }else{
            echo '<li id="l3"><a style="position:relative;right:29px;top:5px;color: #000;" href="http://localhost/EXPCRIATIVA_MVSB-MAIN/expirarlogin.php" > Sair </a></li>';
        }
        
        ?>
        </ul>
      </div>
    </div>
  </nav>
    <div class="container" style="height: 700px; position: absolute;top: 50px;">
        <div class="row">
            <div class="col-md-9 col-ms-4 form-image" style="background-color: #686E6E;width:20%;height:100%;">
                <img id="i3" src="img//logo.png" alt="" style="width: 100px; position: relative;right: 40px;"> <!-- Diminuir o tamanho do logo -->
                <div id="error-messages" style="background-color: rgb(247, 243, 243);"></div> <!-- Div para exibir os erros -->
            </div>
            <div class="col-md-9 col-ms-4 form">
                <form action='http://localhost/EXPCRIATIVA_MVSB-MAIN/excluirusuario.php' enctype="multipart/form-data" method="POST"   id="registration-form" >
                    <div class="form-header">
                        <div class="title">
                            <h1 class="text-center">Excluir Usuário</h1>
                        </div>
                    </div>

                    <div class="input-group">
                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="id">ID do Usuário </label>
                                    <input id="id"  type="text" class="form-control" name="id" placeholder="Digite seu primeiro nome" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">Nome do Usuário </label>
                                    <input id="nome"  type="text" class="form-control" name="nome" placeholder="Digite seu primeiro nome" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Senha de Administrador</label>
                                    <input id="senha" type="password" class="form-control" name="senha" placeholder="Digite sua senha" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirmPassword">Confirme sua Senha de Administrador</label>
                                    <input id="confirmPassword" type="password" class="form-control" name="confirmPassword" placeholder="Digite sua senha novamente" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="continue-button text-center" style="height:26px;position: relative;top: 26px;">
                        <button type="submit" class="btn btn-primary" >Confirmar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>