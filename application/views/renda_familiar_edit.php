<?php
/* VISUALIZAR DADOS DA SESSÃO
  echo"<pre>";
  print_r($this->session->userdata());
  echo"</pre>"; */
$user = $this->session->userdata();
//echo $privilegio;

defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title>CIAF</title>
        <meta charset="utf-8">
        <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
        <link href="<?php echo base_url('assets/css/estilo.css') ?>" rel="stylesheet">

    </head>
    <body>

        <?php
        //<!-- --------------------------------------------------------------------------------- -->
        //<!-- ------------------------------------ LOGADO ------------------------------------- -->
        //<!-- --------------------------------------------------------------------------------- -->
        if (isset($user['codigo_privilegio'])) {
            if ($user['codigo_privilegio'] == 1) {
                //<!-- --------------------------------------------------------------------------------- -->
                //<!-- -------------------------------- ADMINISTRADOR ---------------------------------- -->
                //<!-- --------------------------------------------------------------------------------- -->
                ?>
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a href="<?= base_url() ?>welcome"><span class="navbar-brand" href="welcome">CIAF</span></a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CADASTROS<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= base_url() ?>substancia_gestacao">Cadastro Substância Gestação</a></li>
                                        <li><a href="<?= base_url() ?>auxilio_social">Cadastro Auxilio Social</a></li>
                                        <li><a href="<?= base_url() ?>doenca">Cadastro Doença</a></li>
                                        <li><a href="<?= base_url() ?>habito_alimentar">Cadastro Habito Alimentar</a></li>
                                        <li><a href="<?= base_url() ?>grau_parentesco">Cadastro Grau Parentesco</a></li>
                                        <li><a href="<?= base_url() ?>renda_familiar">Cadastro Rendas</a></li>
                                        <li><a href="<?= base_url() ?>grau_escolaridade">Cadastro Grau Escolaridade</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="<?= base_url() ?>responsavel">Cadastro Responsável</a></li>
                                        <li><a href="<?= base_url() ?>paciente">Cadastro Paciente</a></li>
                                    </ul>
                                </li>
                            </ul> 

                            <ul class="nav navbar-nav navbar-right">
                                <li><span class="navbar-brand" ><?php echo $user['login']; ?></span></li>
                                <li><a href="<?= base_url() ?>login/logout">Logout</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>

                <!-- ------------------------------------- CORPO DA PÁGINA ------------------------------------- -->

                <div class="panel panel-default">
                    <div align="center"  class="panel-heading"><h1>ALTERAÇÃO CADASTRO DE RENDA FAMILIAR</h1></div>
                    <div class="panel-body">
                        <?php echo form_open('renda_familiar/atualizar', 'codigo_renda="form-renda_familiar"'); ?>
                        
                        <input type="hidden" name="codigo_renda" value="<?php echo $dados_renda[0]->codigo_renda; ?>"/>

                        <label for="descricao">Descrição:</label><br/>
                        <input class='form-control' type="text" name="descricao" value="<?php echo $dados_renda[0]->descricao; ?>"/>
                        <div class="error"><?php echo form_error('descricao'); ?></div>



                        <input class='btn btn-default'type="submit" name="atualizar" value="b_atualizar" />

                        <?php echo form_close(); ?>

                        <div id="body">
                            <p><a class='btn btn-default' href="../../renda_familiar">b_retornar</a></p>
                        </div>
                    </div>
                    <div class="panel-footer">
                        Aline Sieczko e Maritza Silva &copy 2016
                    </div>
                </div>
                <?php
            } else if ($user['codigo_privilegio'] == 2) {
                //<!-- --------------------------------------------------------------------------------- -->
                //<!-- ---------------------------------- ATENDENTE ------------------------------------ -->
                //<!-- --------------------------------------------------------------------------------- -->                
                ?>
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a href="<?= base_url() ?>welcome"><span class="navbar-brand" href="welcome">CIAF</span></a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CADASTROS<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= base_url() ?>responsavel">Cadastro Responsável</a></li>
                                        <li><a href="<?= base_url() ?>paciente">Cadastro Paciente</a></li>
                                    </ul>
                                </li>
                            </ul> 

                            <ul class="nav navbar-nav navbar-right">
                                <li><span class="navbar-brand" ><?php echo $user['login']; ?></span></li>
                                <li><a href="<?= base_url() ?>login/logout">Logout</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>

                <div class="panel-body">
                    <div class="alert alert-danger" role="alert">
                        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                        <span class="sr-only">Error:</span>

                        <span >VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA</span>
                    </div>
                </div>
                <?php
            }
        } else {
            //<!-- --------------------------------------------------------------------------------- -->
            //<!-- ---------------------------------- DESLOGADO ------------------------------------ -->
            //<!-- --------------------------------------------------------------------------------- -->
            ?><nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a href="<?= base_url() ?>welcome"><span class="navbar-brand" href="welcome">CIAF</span></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="<?= base_url() ?>login">Login</a></li>

                        </ul>    
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <div class="panel-body">
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>

                    <span >VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA</span>
                </div>
            </div>

        </div>
        <?php
    }
    ?>
</body>
</html>