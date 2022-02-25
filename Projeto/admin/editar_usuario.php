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
        <title>IFRN-Lib. - Adicionar usuário</title>
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
                        <div class="card-body">
                            <!-- Faz a busca -->
                            <div class="card-header">
                                <h3>Editar item</h3>
                            </div>
                            <div class="table-responsive">
                                <div class="span9">
                                    <div class="module-body">
                                    <?php
                                        $mat=$_GET['id'];
                                        $sql="select * from PROJLIB.usuario where Matricula='$mat'";
                                        $result=$conn->query($sql);
                                        $row=$result->fetch_assoc();    
                                        
                                        $nome=$row['Nome'];
                                        $matricula=$row['Matricula'];
                                        $categoria=$row['Categoria'];
                                        $email=$row['EmailId'];
                                        $telefone=$row['Telefone'];
                                    ?>
                                
                                <br>
                                        <!-- Formulário de edição -->
                                        <form class="form-horizontal row-fluid" action="editarItem.php?id=<?php echo $itemid ?>" method="post">
                                            <div class="control-group">
                                                <b>
                                                <label class="control-label" for="Nome"><b>Nome:*</b></label>
                                                <div class="controls">
                                                    <input type="text" id="Nome" name="Nome" value= "<?php echo $nome?>" class="span8" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <b>
                                                <label class="control-label" for="Email"><b>Email:*</b></label>
                                                <div class="controls">
                                                    <input type="text" id="Email" name="Email" value= "<?php echo $email?>" class="span8" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <b>
                                                <label class="control-label" for="Matricula"><b>Matricula:*</b></label>
                                                <div class="controls">
                                                    <input type="text" id="Matricula" name="Matricula" value= "<?php echo $matricula?>" class="span8" required>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <b>
                                                <label class="control-label" for="Telefone"><b>Telefone:*</b></label>
                                                <div class="controls">
                                                    <input type="text" id="Telefone" name="Telefone" value= "<?php echo $telefone?>" class="span8" required>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="control-group">
                                                <div class="controls">
                                                    <a href="home.php" class="btn btn-primary">Salvar alterações</a> 
                                                </div>
                                        </form>
                                        <script>
                                            function mascara_telefone(o,f){
                                            v_obj=o
                                            v_fun=f
                                            setTimeout("execmascara()",1)
                                            }
                                            function execmascara(){
                                            v_obj.value=v_fun(v_obj.value)
                                            }
                                            function mtel(v){
                                            v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
                                            v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
                                            v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
                                            return v;
                                            }
                                            function id( el ){
                                            return document.getElementById( el );
                                            }
                                            window.onload = function(){
                                            id('Telefone').onkeyup = function(){
                                                mascara_telefone( this, mtel );
                                            }
                                            }
                                        </script>
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