<?php
    require('../bdconex.php');
?>

<?php 
    if ($_SESSION['Matricula']) {
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,inicial-scale=1,maximum-scale=1">
        <title>IFRN-Lib. - Detalhes</title>
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body>      
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-leanpub"></span> <span>IFRN-Lib.</span></h2>
        </div>
        <!-- menu -->
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="home.php" class="active"><span class="las la-igloo"></span>
                    <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="home.php"><span class="las la-home"></span>
                    <span>Home</span></a>
                </li>
                <li>
                    <a href="adicionar_item.php"><span class="las la-book"></span>
                    <span>Adicionar item</span></a>
                </li>
                <li>
                    <a href="solicitacoes.php"><span class="las la-list"></span>
                    <span>Empréstimos/Devoluções</span></a>
                </li>
                <li>
                    <a href="visualizar_usuarios.php"><span class="las la-user"></span>
                    <span>Visualizar usuários</span></a>
                </li>
                <li>
                    <a href="registros.php"><span class="las la-clipboard-list"></span>
                    <span>Empréstimos atuais</span></a>
                </li>
                <li>
                    <a href="logout.php"><span class="las la-sign-out-alt"></span>
                    <span>Sair</span></a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                LIB.
            </h2>

            <div class="user-wrapper">
                <!-- img src="img/user.jpg" width="50px" height="50px" alt="usuario" -->
                <div>
                    <small>Bibliotecário</small>
                </div>
            </div>
        </header>

        <main>
            <div class="wrapper">
                <div class="usuarios">
                    <div class="card">
                        <div class="card-body">
                        <!-- Faz a busca -->
                        <div class="card-header">
                            <h3>Detalhes do item</h3>
                        </div>
                            
                        <div class="table-responsive">
                            <div class="row">
                            <div class="span3">
                                <!-- Pega detalhes do usuário do banco de dados -->
                                <div class="module-body">
                                    <?php
                                        $x=$_GET['id'];
                                        $sql="select * from PROJLIB.acervo where ItemId='$x'";
                                        $result=$conn->query($sql);
                                        $row=$result->fetch_assoc();    
                                        $itemid=$row['ItemId'];
                                        $name=$row['Titulo'];
                                        $autor=$row['Autor'];
                                        $genero=$row['Genero'];
                                        $descricao=$row['Descricao'];
                                        $isbn=$row['Isbn'];
                                        $disponibilidade=$row['Disponibilidade'];
                                        $paginas=$row['Paginas'];

                                        echo "<b>ID:</b> ".$itemid."<br><br>";
                                        echo "<b>Título:</b> ".$name."<br><br>";
                                        echo "<b>Autor:</b> ".$autor."<br><br>";
                                        echo "<b>Genero:</b> ".$genero."<br><br>";
                                        echo "<b>Descrição:</b> ".$descricao."<br><br>";
                                        echo "<b>ISBN:</b> ".$isbn."<br><br>";
                                        echo "<b>Disponibilidade:</b> ".$disponibilidade."<br><br>";
                                        echo "<b>Quantidade de páginas:</b> ".$paginas."<br><br>";
                                    
                                        $sql1="select * from PROJLIB.acervo where ItemId='$itemid'";
                                        $result=$conn->query($sql1);    
                                    ?>
                                                                
                                    <a href="home.php" class="btn btn-primary">Voltar</a>                             
                                          
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div> 
        </main>
    </div>

</body>
</html>

<?php 
}
else {
    echo "<script type='text/javascript'>alert('Acesso negado!')</script>";
} ?>