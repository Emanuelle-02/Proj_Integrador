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
                    <a href="emprestimos.php"><span class="las la-book"></span>
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
                    <small>Usuário</small>
                </div>
            </div>
        </header>

        <main>
            <div class="cards">
                <div class="card-single">
                    <div>
                        <h2>0</h2>
                        <span>Empréstimos atuais</span>
                    </div>
                    <div>
                        <span class="las la-book-open"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="usuarios">
                    <div class="card">
                        <div class="card-header">
                            <h3>Acervo</h3>
                        </div>
                        <div class="card-body">
                            <!-- Faz a busca -->
                            <div class="table-responsive">
                                <div class="span9">
                                    <form class="form-horizontal row-fluid" action="home.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="Search"><b>Pesquisar:</b></label>
                                            <div class="controls">
                                                <input type="text" id="titulo" name="titulo" placeholder="Informe título/autor ou gênero" class="span8" required>
                                                <button type="submit" name="submit"class="btn">Pesquisar</button>
                                            </div>
                                        </div>
                                    </form>
                        <br>
                        <?php
                            if(isset($_POST['submit'])){
                                $s=$_POST['titulo'];
                                $sql="select * from PROJLIB.acervo where ItemId='$s' or Titulo like '%$s%' or Autor like '%$s%' or Genero like '%$s%'";
                            }
                            else
                                $sql="select * from PROJLIB.acervo order by Disponibilidade DESC";
                               
                                $result=$conn->query($sql);
                                $rowcount=mysqli_num_rows($result);

                                if(!($rowcount))
                                    echo "<br><center><h2><b><i>Sem resultados</i></b></h2></center>";
                                else{          
                        ?>
                        <!-- Pega os dados do banco -->
                        <table class="table" id = "tables">
                            <thead>
                                <tr>
                                    <th>Titulo</th>
                                    <th>Autor</th>
                                    <th>Genero</th>
                                    <th>Disponibilidade</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    while($row=$result->fetch_assoc()){
                                        $itemid=$row['ItemId'];
                                        $name=$row['Titulo'];
                                        $autor=$row['Autor'];
                                        $genero=$row['Genero'];
                                        $disponibilidade=$row['Disponibilidade'];
                                ?>
                                <tr>
                                    <td><?php echo $name ?></td>
                                    <td><?php echo $autor ?></td>
                                    <td><?php echo $genero ?></td>
                                    <td>
                                        <b><?php 
                                           if($disponibilidade > 0)
                                              echo "<font color=\"green\">Disponível</font>";
                                            else
                                            	echo "<font color=\"red\">Indísponivel</font>";

                                            ?>         	
                                        </b>
                                    </td>
                                    <td>
                                        <center><a href="detalhes_item.php?id=<?php echo $itemid; ?>" class="btn btn-primary">Detalhes</a>
                                      	    <?php
                                      	        if($disponibilidade > 0)
                                      		        echo "<a href=\"solicitar_emp.php?id=".$itemid."\" class=\"btn btn-success\">Solicitar</a>";
                                            ?>
                                        </center>
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