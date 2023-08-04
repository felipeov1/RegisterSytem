<?php
    if(!empty($_GET['id'])){
    
        include_once('../db/config.php');

        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM usuarios WHERE id=$id";

        $result = $conexao->query($sqlSelect);

        if($result->num_rows > 0){
            while($user_data = mysqli_fetch_assoc($result)){
            $nome = $user_data['nome'];
            $email = $user_data['email'];
            $senha = $user_data['senha'];
            }
        }
        else{
            header('Location: home.php');
        }
    } else{
        header('Location: home.php');
    }

?> 

<!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./estilizacao/edit.css">
    <title>Sistema</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">SISTEMA DE COLABORADORES</a>
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
            <li><a href="home.php"><img src="../img/home.png"> &nbspHOME</a></li>
            <li><a href="colaboradores.php"><img src="../img/colaboradores.png"> &nbspCOLABORADORES</a></li>
            <li><a href=""><img src="../img/cadastro.png"> &nbspCADASTRO</a></li>
        </ul>  
    </nav>
    <div class="box">
        <a href="colaboradores.php">Voltar</a>
        <form action="saveEdit.php" method="POST">
            <fieldset>
                <div class="inputBox">
                    <label for="nome" class="labelInput">Nome completo</label><br><br>
                    <input type="text" name="nome" id="nome" class="inputUser" value="<?php echo $nome ?>" required>
                </div>
                <br><br>
                <div class="inputBox">   
                    <label for="email" class="labelInput">Email</label><br><br>
                    <input type="text" name="email" id="email" class="inputUser" value="<?php echo $email ?>" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="senha" class="labelInput">Senha</label><br><br>
                    <input type="password" name="senha" id="senha" class="inputUser" value="<?php echo $senha ?>" required> 
                </div>
                <br><br>
                <input type="hidden" name="id" value="<?php echo $id ?>">
                <input type="submit" name="update" id="update" value="Atualizar" class="btn-update">
            </fieldset>
        </form>
    </div>
</body>