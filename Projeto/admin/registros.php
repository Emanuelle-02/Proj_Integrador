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
        <title>IFRN-Lib. - Empréstimos atuais</title>
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
            <div class="recent-grid">
                <div class="usuarios">
                    <div class="card">
                        <div class="card-header">
                            <h3>Registro de empréstimos atuais</h3>
                        </div>
                        <div class="card-body">
                            <!-- Faz a busca -->
                            <div class="table-responsive">
                                <div class="span9">
                                    <form class="form-horizontal row-fluid" action="home.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="Search"><b>Pesquisar:</b></label>
                                            <div class="controls">
                                                <input type="text" id="titulo" name="titulo" placeholder="Informe matrícula/Titulo ou Id do livro." class="span8" required>
                                                <button type="submit" name="submit"class="btn">Pesquisar</button>
                                            </div>
                                        </div>
                                    </form>
                                    <br>
                                
                                    <table class="table" id = "tables" width="100%">
                                        <thead>
                                            <tr>
                                            <th>Matricula</th>  
                                                <th>idItem</th>
                                                <th>Título</th>
                                                <th>Data empréstimo</th>
                                                <th>Data devolução</th>
                                            </tr>
                                        </thead>
                                        
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