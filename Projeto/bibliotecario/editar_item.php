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
        <title>IFRN-Lib. - editar item</title>
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
            <div class="recent-grid">
                <div class="usuarios">
                    <div class="card">
                        <div class="card-body">
                            <!-- Faz a busca -->
                            <div class="card-header">
                                <h3>Editar item</h3>
                            </div>
                            <div class="table-responsive">
                                <div class="span9">
                                    <div class="module-body">
                                    <?php
                                    $itemid = $_GET['id'];
                                    $sql = "select * from PROJLIB.acervo where ItemId='$itemid'";
                                    $result=$conn->query($sql);
                                    $row=$result->fetch_assoc();
                                    $name=$row['Titulo'];
                                    $autor=$row['Autor'];
                                    $genero=$row['Genero'];
                                    $descricao=$row['Descricao'];
                                    $isbn=$row['Isbn'];
                                    $disponibilidade=$row['Disponibilidade'];
                                    $paginas=$row['Paginas'];
                                ?>
                                
                                <br>
                                        <!-- Formulário de edição -->
                                        <form class="form-horizontal row-fluid" action="editarItem.php?id=<?php echo $itemid ?>" method="post">
                                            <div class="control-group">
                                                <b>
                                                <label class="control-label" for="Titulo">Título:</label></b>
                                                <div class="controls">
                                                    <input type="text" id="Titulo" name="Titulo" value= "<?php echo $name?>" class="span8" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <b>
                                                <label class="control-label" for="Autor">Autor:</label></b>
                                                <div class="controls">
                                                    <input type="text" id="Autor" name="Autor" value= "<?php echo $autor?>" class="span8" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <b>
                                                <label class="control-label" for="Genero">Genero:</label></b>
                                                <div class="controls">
                                                    <input type="text" id="Genero" name="Genero" value= "<?php echo $genero?>" class="span8" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <b>
                                                <label class="control-label" for="Descricao">Descrição:</label></b>
                                                <div class="controls">
                                                    <input type="text" id="Descricao" name="Descricao" value= "<?php echo $descricao?>" class="span8" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <b>
                                                <label class="control-label" for="Isbn">ISBN:</label></b>
                                                <div class="controls">
                                                    <input type="text" id="Isbn" name="Isbn" value= "<?php echo $isbn?>" class="span8" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <b>
                                                <label class="control-label" for="Disponibilidade">Disponibilidade(qtd):</label></b>
                                                <div class="controls">
                                                    <input type="text" id="Disponibilidade" name="Disponibilidade" value= "<?php echo $disponibilidade?>" class="span8" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <b>
                                                <label class="control-label" for="Paginas">Quantidade de páginas:</label></b>
                                                <div class="controls">
                                                    <input type="text" id="Paginas" name="Paginas" value= "<?php echo $paginas?>" class="span8" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <a href="home.php" class="btn btn-primary">Salvar alterações</a> 
                                                </div>
                                            </div>
                                        </form>            
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