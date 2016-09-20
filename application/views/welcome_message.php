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
    <body id="body-crianca">
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
            <?php
        }
        ?>
        <!-- ------------------------------------- CORPO DA PÁGINA ------------------------------------- -->
        <div class="panel panel-default">
            <div class="panel-body">
                <p align="center">INSTITUTO FEDERAL DO PARANÁ - CAMPUS PARANAGUÁ</p>
                <p align="center"><B>PROJETO DE TCC</B></p>
                <p align="center"> CIAF - CONTROLE DE INFORMAÇÕES NA ÁREA DE FISIOTERAPIA</p>
                <p align="justify" >A fisioterapia é uma área bastante abrangente. Este trabalho foca na pediatria, mais especificamente no desenvolvimento motor normal em bebes de 0 a 12 meses. Todo bebê apresenta um desenvolvimento motor particular, que durante seus primeiros anos de vida irá evoluir, propiciando ao bebê uma melhora na manipulação de objetos, no caminhar e na interação com o meio. Mesmo com estas particularidades, pode-se mapear alguns requisitos que mostram o retardo ou a evolução do desenvolvimento. Quando algum retardo é encontrado, algumas medidas são mensuradas por parte da fisioterapia visando corrigir o atraso encontrado. Até o momento, os registros das informações, bem como, a analise das mesmas se dá por meio de planilhas eletronias e fichas em papel. Trazendo uma série de problemas, que refletem na duplicidade de dados, dificuldade de armazenamento,  analise e obtenção de estatisticas que poderiam gerar investimento de politicas públicas para a área de saúde. Diante desta problematica, este projeto desenvolve um banco de dados que trabalha em conjunto com um sistema web, para a automatização do processo. Este fornecerá ao fisisoterapeuta uma forma de evitar os problemas atuais. O sistema web tem como principais funcionalidades: o cadastro dos pacientes e responsaveis, o cadastro de questões utilizadas nas consultas, o controle de permissão e a emissão de relatórios. O projeto mudará a forma como as consultas serão feitas, permitindo uma melhor analise de cada bebê e trazendo a tecnologia para postos de saúdes.</p>

                <p align="center"><B>ORIENTADOR:</B> WAGNER R. WEINERT</p>
                <p align="center"><B>COORIENTADOR:</B> DIEGO STIEHL</p>
                       <p align="center"><B>ALUNAS:</B> ALINE BORA SIECZKO E MARITZA FERNANDA DOS S. SILVA</p>
            </div>
            <!-- ------------------------------------- RODAPÉ DA PÁGINA ------------------------------------- -->
            <div class="panel-footer">Aline Sieczko e Maritza Silva &copy 2016</div>
        </div>
    </body>
</html>