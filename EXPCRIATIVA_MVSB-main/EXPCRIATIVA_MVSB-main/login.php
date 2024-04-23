<html>
	<head>
      <meta charset="UTF-8">  
	  <title>IE - Instituição de Ensino</title>
	  <link rel="icon" type="image/png" href="imagens/IE_favicon.png" />
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	  <link rel="stylesheet" href="css/customize.css">
	</head>
<body>

<?php
    session_start(); 
    $servername = "localhost";
    $username = "root";
    $password = "PUC@1234";
    $database = "avalia_acesso_db";
    // Cria conexão
    $conn = new mysqli($servername, $username, $password, $database);

    // Verifica conexão 
    if ($conn->connect_error) {
        die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
    }

    $usuario = $conn->real_escape_string($_POST['username']); 
    $senha   = $conn->real_escape_string($_POST['password']); 
    

    // Faz Select na Base de Dados
    $sql = "SELECT * FROM usuarios WHERE  Nome = '$usuario' AND Senha = md5('$senha')";

    if ($result = $conn->query($sql)) {
        if ($result->num_rows == 1) {        
            $row = $result->fetch_assoc();
            $_SESSION ['login'] = $usuario;
            $_SESSION ['senha'] = $senha;
            $_SESSION['nao_autenticado']=false;       
            $_SESSION['recem-cadast']=false;  
            $_SESSION['login_incorreto']=false;               
            echo "Usuário encontrado: " . $row['Nome'];
            if ($senha == 'FDF365'){
                $_SESSION['autadm'] = true;
                header('Location: http://localhost/EXPCRIATIVA_MVSB-MAIN/usuarioadm.php');
            }else{
                $_SESSION['autadm'] = false;
                header('Location: http://localhost/EXPCRIATIVA_MVSB-MAIN/usuario.php');
            }
        }else{
            $_SESSION['nao_autenticado'] = true;
            $_SESSION['recem-cadast']=false;
            $_SESSION['mensagem_header'] = "Login";
            $_SESSION['mensagem']        = "Senha ou usuário incorreto.";
            $_SESSION['login_incorreto']=true;
            $conn->close();  
            header('location: http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php'); 
            exit();
        }
    }
    else {
        $msg = "Erro ao acessar o BD: " . $conn-> error . ".";
        $_SESSION['nao_autenticado'] = true;
        $_SESSION['mensagem_header'] = "Login";
        $_SESSION['mensagem']        = $msg;
        $conn->close();  
        header('location: http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php'); 
    }
?>
	</body>
</html>

