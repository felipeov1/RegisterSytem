<?php
    session_start();
    include_once('../db/config.php');

    if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true))
    {
        unset($_SESSION['email']);
        unset($_SESSION['senha']);
        header('Location: ../login/login.php');
    } 
    $email = $_SESSION['email'];
    $senha = $_SESSION['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha'";

    $result = $conexao->query($sql);
                           
    $dados_usuario = mysqli_fetch_assoc($result);

    $logado = $_SESSION['nome'] = $dados_usuario['nome'];
    
    if(!empty($_GET['search'])){

        $data = $_GET['search'];
        $sql = "SELECT * FROM usuarios WHERE id LIKE '%$data%' or nome LIKE '%$data%' or email LIKE '%$data%' ORDER BY id DESC";
    
    }else{
        $sql = "SELECT * FROM usuarios ORDER BY id DESC";
    }
    $result = $conexao->query($sql);
?>

    <!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./estilizacao/home.css">
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
        <div class="log-message"><?php echo "<h6>Bem vindo, $logado</h6>";?></div><a href="sair.php" class="btn btn-danger me-5">Sair</a>
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
    <h1>Colaboradores Cadastrados</h1>
    <div class="box-search">
        <input type="search" class="from control w-25" placeholder="Pesquisar" id="pesquisar">
        <button onclick="searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </div>
    <div class="m-5">
        <table class="table text-white table-bg">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Senha</th>
                </tr>
            </thead>
            <tbody>
            <?php
                while($user_data = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>" .$user_data['id']."</td>";
                    echo "<td>" .$user_data['nome']."</td>";
                    echo "<td>" .$user_data['email']."</td>";
                    echo "<td>" .$user_data['senha']."</td>";
                }
            ?> 
            </tbody>
            
        </table>
    </div>
    <script src="./searchInhome.js"></script>
</body>
    
</body>
</html>
