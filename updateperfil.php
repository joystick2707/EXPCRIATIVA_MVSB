<?php
session_start();

// Verifica se o usuário está autenticado
if (!isset($_SESSION['login'])) {
    header('Location: http://localhost/EXPCRIATIVA_MVSB-MAIN/pagloginuser.php');
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $servername = "localhost";
    $username = "root";
    $password = "PUC@1234";
    $database = "avalia_acesso_db";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $foto = $_POST['foto'];

    $nome_usu = $_SESSION['login'];
    $senha_usu = $_SESSION['senha'];
    $sql = "UPDATE usuarios SET Nome='$nome', Senha=MD5('$senha'), Foto='img/" . $foto . "' WHERE Nome='$nome_usu' AND Senha=MD5('$senha_usu')";
    $result = $conn->query($sql);
    
    if ($result) {
        $_SESSION['login']=$nome;
        $_SESSION['senha']=$senha;
        header('Location:http://localhost/EXPCRIATIVA_MVSB-MAIN/usuario.php');
    } else {
        echo "Erro ao atualizar os dados: " . $conn->error;
    }

    $conn->close();
} else {
    echo "Método não permitido.";
    header('Location:http://localhost/EXPCRIATIVA_MVSB-MAIN/usuario.php');
}
?>
