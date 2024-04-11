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
} else {
    echo $database;
}

$id = $_POST['id'];    
$nome = $_POST['nome']; 
$senha = $_POST['confirmPassword'];   
$excluido = false; // Variável para controlar se o usuário foi excluído com sucesso

if ($senha == $_SESSION['senha']) {
    $sql1 = "SELECT * FROM usuarios WHERE ID='$id' AND Nome='$nome'";
    $result = $conn->query($sql1);

    if ($result->num_rows == 1) {
        $sql = "DELETE FROM usuarios WHERE ID='$id' AND Nome='$nome'";
        if ($conn->query($sql) === TRUE) {
            $excluido = true;
        }
    }
}

if ($excluido) {
    echo "<script>alert('Usuário excluído com sucesso.')
    window.location.href='http://localhost/EXPCRIATIVA_MVSB-MAIN/usuarioadm.php'
    </script>";
} else {
    echo "<script>alert('Falha ao excluir usuário: não existe este usuário ou senha de administração incorreta.')
    window.location.href='http://localhost/EXPCRIATIVA_MVSB-MAIN/usuarioadm.php';
    </script>";
}

$conn->close();  // Encerra conexão com o BD

?>
