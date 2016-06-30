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
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a href="welcome"><span class="navbar-brand" href="welcome">CIEF</span></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                        <li><a href="#">OOI</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Área Restrita <span class="caret"></span></a>
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
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo form_open('responsavel/inserir', 'codigo_responsavel="form-responsavel"'); ?>
                <h1>CADASTRO DE RESPONSÁVEL</h1>
                <label for="nome_responsavel">Nome:</label><br/>
                <input class='form-control' type="text" name="nome_responsavel" value="<?php echo set_value('nome_responsavel'); ?>"/>
                <div class="error"><?php echo form_error('nome_responsavel'); ?></div>
                <label for="cpf_responsavel">CPF:</label><br/>
                <input class='form-control' type="text" name="cpf_responsavel" value="<?php echo set_value('cpf_responsavel'); ?>"/>
                <div class="error"><?php echo form_error('cpf_responsavel'); ?></div>
                <input class='btn btn-default' type="submit" name="cadastrar" value="b_cadastrar" />

                <?php echo form_close(); ?>

                <!-- Lista as responsavel Cadastradas -->
                <div id="grid-responsavel">
                    <ul>
                        <?php foreach ($responsavel as $responsavel): ?>
                            <li>
                                <a title="Deletar" href="<?php echo base_url() . 'responsavel/deletar/' . $responsavel->codigo_responsavel; ?>" onclick="return confirm('Confirma a exclusão deste registro?')"><img src="<?php echo base_url(); ?>assets/img/lixo.png"/></a>
                                <span> - </span>
                                <a title="Editar" href="<?php echo base_url() . 'responsavel/editar/' . $responsavel->codigo_responsavel; ?>"><?php echo $responsavel->nome_responsavel; ?></a>
                                <span> - </span>
                                <span><?php echo $responsavel->cpf_responsavel; ?></span>

                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <!-- Fim Lista -->
                <div id="body">
                    <p><a class='btn btn-default'href="welcome">b_retornar</a></p>
                </div>
            </div>
            <div class="panel-footer">
                Aline Sieczko e Maritza Silva &copy 2015
            </div>
        </div>
    </body>

</html>