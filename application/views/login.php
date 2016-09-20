<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $titulo; ?></title>
        <meta charset="utf-8">
    
        <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
        <link href="<?php echo base_url('assets/css/estilo.css') ?>" rel="stylesheet">

    </head>
    <body id="body-crianca">
        <div ></div>
        <!-- ------------------------------------- MENU DA PÁGINA ------------------------------------- -->
        <?php
        if (isset($user['codigo_privilegio'])) {
            ?>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a href="../welcome"><span class="navbar-brand" href="welcome"><?php echo $user['nome']; ?></span></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="<?= base_url() ?>login/logout">Logout</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CADASTROS<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="substancia_gestacao">Cadastro Substância Gestação</a></li>
                                    <li><a href="auxilio_social">Cadastro Auxilio Social</a></li>
                                    <li><a href="doenca">Cadastro Doença</a></li>
                                    <li><a href="habito_alimentar">Cadastro Habito Alimentar</a></li>
                                    <li><a href="grau_parentesco">Cadastro Grau Parentesco</a></li>
                                    <li><a href="renda_familiar">Cadastro Rendas</a></li>
                                    <li><a href="grau_escolaridade">Cadastro Grau Escolaridade</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="responsavel">Cadastro Responsável</a></li>
                                    <li><a href="paciente">Cadastro Paciente</a></li>
                                </ul>
                            </li>
                        </ul>    
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <?php
        } else {
            ?><nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a href="<?= base_url() ?>welcome"><span class="navbar-brand" href="welcome">CIAF</span></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling 
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href="//base_url() ?>login">Área Restrita</a></li>

                        </ul>    
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <?php
        }
        ?>
        <div id="login" class="panel panel-default">

            <h2 align="center" class="form-signin-heading"> 
                <img src="<?php echo base_url(); ?>assets/img/autenticar.png"/> 
                &nbsp;&nbsp;Autenticação
            </h2>

            <div id="panel-login" class="panel-body">
                <form method="POST" action="<?= base_url() ?>login/validaLogin">     


                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input class='form-control' type="text" name="login" placeholder="Login"/>
                    </div>
               
                    <div style="margin-bottom: 25px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input class='form-control' type="password" name="senha" placeholder="Senha"/>
                    </div>
                    <input align="center" class="btn btn-lg btn-danger btn-block" type="submit" name="atualizar" value="Entrar" />

                    <?php
                    if (isset($error) && $error) {
                        echo '<div class="alert alert-danger" role="alert">'
                        ?>
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span><?php
                        echo "Login/Senha Inválido";
                    }
                    ?>
            </div>                                     
        </form>
        <div class="panel-footer">
            Aline Sieczko e Maritza Silva &copy 2016
        </div>
    </div>
</body>

</html>