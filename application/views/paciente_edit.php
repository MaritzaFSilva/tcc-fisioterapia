<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
	<?php echo form_open('paciente/atualizar', 'codigo_paciente="form-paciente"'); ?>
 
	<input type="hidden" name="codigo_paciente" value="<?php echo $dados_paciente[0]->codigo_paciente; ?>"/>
 
	<label for="nome_paciente">Nome:</label><br/>
	<input type="text" name="nome_paciente" value="<?php echo $dados_paciente[0]->nome_paciente; ?>"/>
	<div class="error"><?php echo form_error('nome_paciente'); ?></div>
 
	<label for="cpf_paciente">CPF:</label><br/>
	<input type="text" name="cpf_paciente" value="<?php echo $dados_paciente[0]->cpf_paciente; ?>"/>
	<div class="error"><?php echo form_error('cpf_paciente'); ?></div>

	<input type="submit" name="atualizar" value="Atualizar" />
 
	<?php echo form_close(); ?>

	<div id="body">
	
		<p><a href="../../paciente"> Retornar</a></p>
	
	</div>


</body>
</html>