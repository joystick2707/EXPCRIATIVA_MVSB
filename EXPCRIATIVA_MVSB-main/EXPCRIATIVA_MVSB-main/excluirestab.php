<?php
session_start(); 


$servername = "localhost";
$username = "root";
$password = "PUC@1234";
$database = "avalia_acesso_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("<strong> Falha de conexão: </strong>" . $conn->connect_error);
} else {
    echo $database;
}
   
$nome = $_POST['nome']; 
$senha = $_POST['confirmPassword'];   
$excluido = false; 

if ($senha == $_SESSION['senha']) {
    $sql1 = "SELECT * FROM estabelecimentos WHERE Nome='$nome'";
    $result = $conn->query($sql1);

    if ($result->num_rows == 1) {
        $sql = "DELETE FROM estabelecimentos WHERE Nome='$nome'";
        if ($conn->query($sql) === TRUE) {
            $excluido = true;
        }
    }
}

if ($excluido) {
    echo "<script>alert('Estabelecimento excluído com sucesso.')
    window.location.href='http://localhost/EXPCRIATIVA_MVSB-MAIN/usuarioadm.php'
    </script>";
} else {
    echo "<script>alert('Falha ao excluir estabelecimento: não existe este usuário ou senha de administração incorreta.')
    window.location.href='http://localhost/EXPCRIATIVA_MVSB-MAIN/usuarioadm.php';
    </script>";
}

$conn->close(); 

?>
