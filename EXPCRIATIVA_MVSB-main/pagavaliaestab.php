<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Avalia Estab</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="styleB.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .radio {
            cursor: pointer;
            height: 25px;
            width: 25px;
            background-color: #eee;
            border-radius: 50%;
            position: relative;
        }

        .radio::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: #fff;
            display: none;
        }
        .radio-inline{
            text-align: center;
        }

        .radio::after {
            content: attr(data-label); /* Mostrar o texto (numeração) definido no atributo data-label */
            position: absolute;
            top: -20px; /* Posicionar acima do radio button */
            left: 50%;
            transform: translateX(-50%);
            font-weight: bold; /* Negrito */
            display: block;
        }

        .radio input[type="radio"]:checked+.radio::before {
            display: block;
        }

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
        @media screen and (max-width: 768px) {
            .form-image {
                position: absolute;
                width: 40%;
                left: 50px;
                top: 0px;
            }
            #l1,#l2,#i1{
        display:none;
      }
      #l3{
        position: relative;
        left:35px;
        top:-35px;
      }
            #myNavbar{
                color: wheat;
                z-index:999;
                position: absolute;
                top: 40px;
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
       .container-fluid{
            width: 510px;
       }
            nav{
                width:fit-content;
            }
            .form {
                width: fit-content;
                left: 240px;
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

<nav class="navbar navbar-inverse" style="color: rgb(212, 218, 223);height:50px;z-index:101;">
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
          echo '<li id="l3" onclick="window.location.href= \'http://localhost/EXPCRIATIVA_MVSB-MAIN/expirarlogin.php\' "><a style="position:relative;right:29px;top:35px;color: #000;" href="http://localhost/EXPCRIATIVA_MVSB-MAIN/expirarlogin.php" > Sair </a><img id="i1" style="position:relative;right:-6px;top:-35px;width:30px;height:30px;"src="img\logout.JPG"></img></li>';
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
            <div class="col-md-9 col-ms-4 form ">
            <form action="http://localhost/EXPCRIATIVA_MVSB-MAIN/adicionalista.php" method="POST" id="registration-form">
    <div class="form-header">
        <div class="title">
            <h1 class="text-center">Cadastre seu Estabelecimento</h1>
        </div>
    </div>

    <div class="input-group">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input id="nome" type="text" class="form-control" name="nome" placeholder="Digite o nome..." required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="endereco">Endereço</label>
                    <input id="endereco" type="text" class="form-control" name="endereco" placeholder="Digite Endereço..." required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="cnpj">CNPJ</label>
                    <input id="cnpj" type="text" class="form-control" name="cnpj" placeholder="Digite CNPJ...." required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input id="descricao" type="text" class="form-control" name="descricao" placeholder="Descrição..." required>
                </div>
            </div>
        </div>
        <div class="form-header">
            <h1 style="font-size:x-large;">Nota Geral do Estabelecimento</h1>
    </div>
        <div class="form-group" style="position:relative;left:70px;">
                            <label class="radio-inline"><input class='radio' type="radio" name="notageral" value="1" required data-label="1"> </label>
                            <label class="radio-inline"><input class='radio' type="radio" name="notageral" value="2" data-label="2"> </label>
                            <label class="radio-inline"><input class='radio' type="radio" name="notageral" value="3" data-label="3"> </label>
                            <label class="radio-inline"><input class='radio' type="radio" name="notageral" value="4" data-label="4"> </label>
                            <label class="radio-inline"><input class='radio' type="radio" name="notageral" value="5" data-label="5"> </label>
                            <strong style="width:10px;position:absolute;left:180px;bottom:-20px;">muito bom </strong>
                            <strong style="width:10px;position:absolute;left:-50px;bottom:-20px;">muito ruim </strong>
                        </div>
        <button type="submit" class="btn btn-primary" style="position: relative;top: 20px;">Confirmar</button>
    </div>
</form>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function validateForm() {
            document.getElementById("error-messages").innerHTML = "";
            var email = document.getElementById("nome").value;
            var number = document.getElementById("endereco").value;
            var password = document.getElementById("cnpj").value;
            var confirmPassword = document.getElementById("descricao").value;
            var firstName = document.getElementById("notageral").value;

            var emailPattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            var numberPattern = /^\(\d{2}\) \d{4}-\d{4}$/;

            var errors = [];

            if (!emailPattern.test(email)) {
                errors.push("Por favor, insira um email válido.");
            }

            if (!numberPattern.test(number)) {
                errors.push("Por favor, insira um número de celular válido no formato: (xx) xxxx-xxxx");
            }

            if (password !== confirmPassword) {
                errors.push("As senhas digitadas não coincidem.");
            }

            if (!/^[a-zA-Z]+$/.test(firstName)) {
                errors.push("Por favor, insira um primeiro nome válido (apenas letras).");
            }

            if (!/^[a-zA-Z]+$/.test(lastName)) {
                errors.push("Por favor, insira um sobrenome válido (apenas letras).");
            }

            if (errors.length > 0) {
                let i3 = document.getElementById("i3");
                i3.style.position = "relative";
                i3.style.bottom = "150px";
                i3.style.left = "0px";
        
                // Criar uma lista não ordenada (<ul>) para os erros
                let errorList = "<ul>";
                errors.forEach(error => {
                    // Adicionar cada erro como um item de lista (<li>)
                    errorList += "<li>" + error + "</li>";
                });
                errorList += "</ul>";

                // Definir o conteúdo da div "error-messages" como a lista de erros
                document.getElementById("error-messages").innerHTML = "<p style='text-align:center;'>Os seguintes campos estão incorretos:</p>" + errorList;
                document.getElementById("error-messages").style.position = "absolute";
                document.getElementById("error-messages").style.right = "600px;";
            } else {
                document.getElementById("error-messages").innerHTML = "";
                alert('Cadastrado com sucesso!');
            }
        }
    </script>
<?php
} else {
  echo "<script>alert('Não tem permissão.Volte para a tela de login.')</script>";
  header('Location:http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php');
}
?>
</body>
</html>
