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
                                <li><a href="paciente">Cadastro Responsável</a></li>
                                <li><a href="paciente">Cadastro Paciente</a></li>
                            </ul>
                        </li>
                    </ul>    
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="panel panel-default">
            <div class="panel-body">
	<?php echo form_open('paciente/atualizar', 'codigo_paciente="form-paciente"'); ?>
 <h1>ALTERAÇÃO CADASTRO PACIENTE</h1>
	<input type="hidden" name="codigo_paciente" value="<?php echo $dados_paciente[0]->codigo_paciente; ?>"/>
 
	<label for="nome_paciente">Nome:</label><br/>
	<input class='form-control' type="text" name="nome_paciente" value="<?php echo $dados_paciente[0]->nome_paciente; ?>"/>
	<div class="error"><?php echo form_error('nome_paciente'); ?></div>
 
	<label for="cpf_paciente">CPF:</label><br/>
	<input class='form-control' type="text" name="cpf_paciente" value="<?php echo $dados_paciente[0]->cpf_paciente; ?>"/>
	<div class="error"><?php echo form_error('cpf_paciente'); ?></div>

	<input type="submit" name="atualizar" value="b_atualizar" />
 
	<?php echo form_close(); ?>

	 			<div id="body">
                    <p><a class='btn btn-default' href="../../paciente">b_retornar</a></p>
                </div>
            </div>
            <div class="panel-footer">
                Aline Sieczko e Maritza Silva &copy 2015
            </div>
        </div>
    </body>

</html>