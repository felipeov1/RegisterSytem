<?php
    if(isset($_POST['submit'])){
        include_once('../db/config.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $result = mysqli_query($conexao, "INSERT INTO usuarios(nome,email,senha) 
        VALUES ('$nome', '$email', '$senha')");

        header('Location: colaboradores.php');
    }   

?> 

<!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./estilizacao/cadastro.css">
    <title>Sistema</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MEGAMAX SISTEMAS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="d-flex">
           <a href="sair.php" class="btn btn-danger me-5">Sair</a>
        </div>
    </nav>
    <br>
    <nav id="barra-lateral">
        <ul>
            <li><a href="home.php"><img src="./estilizacao/img/home.png"> &nbspHOME</a></li>
            <li><a href="colaboradores.php"><img src="./estilizacao/img/colaboradores.png"> &nbspEDITAR DADOS</a></li>
            <li><a href="cadastro.php"><img src="./estilizacao/img/cadastro.png"> &nbspCADASTRO</a></li>
        </ul>  
    </nav>
    <div class="title">
        <h1>Cadastro de colaboradores</h1>
    </div>
    <div class="box">
        <form action="cadastro.php" method="POST">
            <fieldset>
                <div class="inputBox">
                    <label for="nome" class="labelInput">Nome completo</label><br><br>
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">   
                    <label for="email" class="labelInput">Email</label><br><br>
                    <input type="text" name="email" id="email" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="senha" class="labelInput">Senha</label><br><br>
                    <input type="password" name="senha" id="senha" class="inputUser" required> 
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit" value="Enviar">
            </fieldset>
        </form>
    </div>
</body>