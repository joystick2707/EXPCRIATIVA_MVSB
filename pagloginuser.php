<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Avalia Acesso</title>
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="login.component.css">
<style>
    .toggle-password {
        cursor: pointer;
    }
    a{
        color: black;
    }
</style>
</head>
<body>
    <?php
    session_start();
    $_SESSION['recem-cadast']=false;
    $_SESSION['nao_autenticado']=true;

    if (isset($_SESSION['mensagem'])) {
        $message = $_SESSION['mensagem'];
        echo "<script>alert('$message');</script>";
        $_SESSION['recem-cadast']==false;
        unset($_SESSION['mensagem']);
    }
    else{
    if ((isset($_SESSION['login_incorreto']) && $_SESSION['login_incorreto']==false) && isset($_SESSION['nao_autenticado']) && $_SESSION['nao_autenticado'] ) {
        unset($_SESSION['mensagem']);
        if($_SESSION['naoadm']==true){
            echo "<script>alert('Sem permissao de administrador: Voltou para tela de login.')</script>";
            unset($_SESSION['naoadm']);
        }else{
        echo "<script>alert('Fim da sessao: Voltou para tela de login.')</script>";}
        session_destroy();
        session_start();
        unset($_SESSION['mensagem']);
    }
    else if((isset($_SESSION['login_incorreto']) && $_SESSION['login_incorreto']==true) ){
        unset($_SESSION['mensagem']);
        session_destroy();
        echo "<script>alert('Login ou senha incorreto.')</script>";
        session_start();
        unset($_SESSION['mensagem']);
    }}
     
    $_SESSION['nao_autenticado'] = true;
    ?>
<div class="img js-fullheight" style="background-image:url(assets/bd6.jpg);width:device-width;height:1000px;">
    <div style="width:device-width;height:1000px; background-color: rgba(124, 118, 118, 0.521);">
        <section class="ftco-section" style="position: relative; z-index: 1;">
            <div class="container">
                    
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center mb-5">
                        <img id="i3" style="width: 110px;height: 90px;" src="img//logo.png" alt="" >
                        <h2 class="heading-section" style="font-size: xx-large;">Bem-Vindo ao Avalia Acesso!</h2>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-4">
                        <div class="login-wrap p-0">
                            <h3 class="mb-4 text-center">Possui conta?</h3>
                            <form action="http://localhost/EXPCRIATIVA_MVSB-MAIN/login.php" method="POST" id="loginForm" class="signin-form" onsubmit="return login()">
                                <div class="form-group">
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password"  name="password" class="form-control" placeholder="Password">
                                    <span class="fa fa-fw fa-eye field-icon toggle-password" onclick="togglePasswordVisibility()"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary submit px-3" >Sign In</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50">
                                        <label class="checkbox-wrap checkbox-primary">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#" style="color: #fff">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                            <p style= "color:#ffff" class=" text-center"> Não possui conta? </p>
                            <div class="social d-flex text-center">
                                <a href="http://localhost/EXPCRIATIVA_MVSB-MAIN/pagcadastrousuario.php" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Cadastre-se</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script>
    function login() {
        var username = document.getElementById('username').value;
        var password = document.getElementById('password-field').value;

        if (!username || !password) {
            alert("Por favor, preencha todos os campos.");
            return false;
        }

        console.log("Username: " + username);
        console.log("Password: " + password);
        return true;
    }

    function togglePasswordVisibility() {
        var passwordField = document.getElementById('password-field');
        var fieldType = passwordField.getAttribute('type');

        if (fieldType === 'password') {
            passwordField.setAttribute('type', 'text');
        } else {
            passwordField.setAttribute('type', 'password');
        }
    }
</script>
</body>
</html>
