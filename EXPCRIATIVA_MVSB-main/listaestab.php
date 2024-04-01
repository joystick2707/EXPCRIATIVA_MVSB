<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="styleB.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .table{
            width:fit-content;
            position: absolute;
            top:70px;      
        }
       .navbar-header{
            width: fit-content;
       }
        .col-md-9{
            position: absolute;
            top:0px;
            left: 700px;
            width:1500px;
            height:500px;
        }
        .col-ms-4{
            position: absolute;
            top:50px;
            left: 500px;
            width:750px;
            height:700px;
        }
        .form-image{
            position: absolute;
            left: 210px;
            top:0px;
            width:60%;
        }
        .table-white {
        background-color: white;
        color: black;
    }
    
    .table-title {
        background-color: #000000; /* Cor preta */
        color: white; /* Texto branco */
        font-size: 18px; /* Tamanho da fonte */
        text-align: center; /* Alinhamento centralizado */
        padding: 10px; /* Espaçamento interno */
    }
        @media screen and (max-width: 768px) {
            .form-image {
                position: absolute;
                width: 80%;
                left: 210px;
                top: 10px;
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
            width: 800px;
       }
       .container{
        width: 800px;
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

            width:400px;
        }
        #error-messages{
            position: absolute;
            top:370px;
            left: 0px;
        }
        .col-ms-4{

            width:400px;
            top:70px;
        }
        body{
            width:800px;
        }
        .inputform{
            position: relative;
                width: 80%;
                left: -220px;
                top: 30px;
        }
    }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse" style="color: rgb(212, 218, 223);">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" style="background-color:#000;  position: absolute;right: 0px;"  data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>                        
            </button>
            <img src="logo.png" id="logo11" alt="Logo" style="width: 50px;"></img>
            <a class="navbar-brand" href="#" style="color:#000 ;font-size: x-large;"> Bem-Vindo ao Avalia Acesso!</a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar" style="background-color: #f8f7f7;font-size: large;">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#" style="background-color: #f8f7f7;color: #000;">Home</a></li>
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
              <li><a href="#" style="color: #000;"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="#" style="color: #000;"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
          </div>
        </div>
      </nav>

    <div class="container" style="height: 700px; position: absolute;top: 50px;">
   

        <div class="row">
            <div class="col-md-9 col-ms-4 form-image" style="background-color: #686E6E;width:20%;height:70%;">
                <img id="i3" src="img//logo.png" alt="" style="width: 100px; position: relative;top:-170px;right: 140px;"> <!-- Diminuir o tamanho do logo -->
            </div>       
        </div>
        <div class="inputform" style="background-color:#C4B5B5;width:250px;height:300px;position:relative;top:150px;left:50px;">
        <div class="form-header">
            <h1>Filtrar Lista</h1>  
        </div>
        <input style=" position: relative;top:30px;left: 25px;" type="text" id="filtro-nome" placeholder="Filtrar por Nome" onkeyup="filtrarTabela()"> </div>
        </div>
       
    <div class="col-md-9 col-ms-4 form">
            <?php
    $servername = "localhost";
    $username = "root";
    $password = "PUC@1234";
    $database = "avalia_acesso_db";

// Crie a conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verifique a conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Query SQL para selecionar os dados da tabela
$sql = "SELECT ID, Nome, Endereco, Descricao, CNPJ, NotaGeral FROM estabelecimentos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output dos dados em formato de tabela HTML
    echo '<table class="table table-bordered table-white">';
echo '<thead>';
echo '<tr>';
echo '<th colspan="4" class="table-title">Lista de Avaliações</th>'; // Título da tabela
echo '</tr>';
echo '<tr>';
echo '<th>Nome</th>';
echo '<th>Endereco</th>';
echo '<th>Descrição</th>';
echo '<th>NotaGeral</th>';
echo '</tr>';
echo '</thead>';
echo '<tbody id="estabelecimentos-list">'; 
    
    // Output dos dados de cada linha
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['Nome'] . '</td>';
        echo '<td>' . $row['Endereco'] . '</td>';
        echo '<td>' . $row['Descricao'] . '</td>';
        echo '<td>' . mostrarEstrelas($row['NotaGeral']) . '</td>';
        echo '</tr>';
    }
    
    echo '</tbody>';
    echo '</table>';
} else {
    echo "0 resultados";
}

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

$conn->close();
?>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
         function filtrarTabela() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("filtro-nome");
            filter = input.value.toUpperCase();
            table = document.getElementById("estabelecimentos-list");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0]; // A coluna de Nome é a primeira (índice 0)
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</body>

</html>
