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
        <title>IFRN-Lib. - Página inicial</title>
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
                    <a href="adicionar_usuario.php"><span class="las la-users"></span>
                    <span>Adicionar usuário</span></a>
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
                    <small>Administrador</small>
                </div>
            </div>
        </header>

        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h2>4</h2>
                        <span>Usuários cadastrados</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>0</h1>
                        <span>Empréstimos atuais</span>
                    </div>
                    <div>
                        <span class="las la-clipboard-list"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="usuarios">
                    <div class="card">
                        <div class="card-header">
                            <h3>Manter usuários</h3>
                        </div>
                        <div class="card-body">
                        <!-- Faz a busca -->
                            <div class="table-responsive">
                            <div class="span9">
                            <form class="form-horizontal row-fluid" action="home.php" method="post">
                                <div class="control-group">
                                    <label class="control-label" for="Search"><b>Pesquisar usuário:</b></label>
                                    <div class="controls">
                                        <input type="text" id="titulo" name="titulo" placeholder="Informe matricula/nome ou categoria" class="span8" required>
                                        <button type="submit" name="submit"class="btn">Pesquisar</button>
                                    </div>
                                </div>
                            </form>
                        <br>
                        <?php
                            if(isset($_POST['submit'])){
                                $s=$_POST['titulo'];
                                $sql="select * from PROJLIB.usuario where Matricula='$s' or Nome like '%$s%' or Categoria like '%$s%'";
                            }
                            else
                                $sql="select * from PROJLIB.usuario where Matricula<>'ADMIN'";
                                $result=$conn->query($sql);
                                $rowcount=mysqli_num_rows($result);

                                if(!($rowcount))
                                    echo "<br><center><h2><b><i>Sem resultados</i></b></h2></center>";
                                else{
                        ?>
                        
                        <table class="table" id = "tables" width="100%">
                            <thead>
                                <tr>
                                    <th>Matricula</th>
                                    <th>Nome</th>
                                    <th>Email</th>
                                    <th>Categoria</th>                                      
                                    <th>Configurações</th>
                                </tr>
                            </thead>
                            <!-- Pega os dados do banco -->
                            <tbody>
                            <?php      
                                while($row=$result->fetch_assoc()){
                                    $email=$row['EmailId'];
                                    $nome=$row['Nome'];
                                    $matricula=$row['Matricula'];
                                    $categoria=$row['Categoria'];
                            ?>
                            
                            <tr>
                                <td><?php echo $matricula ?></td>
                                <td><?php echo $nome ?></td>
                                <td><?php echo $email ?></td>    
                                <td><?php echo $categoria ?></td>                                      
                                <td>
                                    <button class="op detalhes"><a href="detalhes_usuario.php?id=<?php echo $matricula; ?>"class="las la-angle-right"></a></button>
                                    <button class="op editar"><a href="<?php echo $matricula; ?>"class="las la-user-edit"></a></button>
                                    <button class="op remover"><a href="<?php echo $matricula; ?>"class="las la-trash-alt"></a></button>
                                </td>
                            </tr>
                            <?php }} ?>
                            </tbody>
                            </table>
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