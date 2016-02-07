<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
	<?php echo form_open('responsavel/atualizar', 'codigo_responsavel="form-responsavel"'); ?>
 
	<input type="hidden" name="codigo_responsavel" value="<?php echo $dados_responsavel[0]->codigo_responsavel; ?>"/>
 
	<label for="nome_responsavel">Nome:</label><br/>
	<input type="text" name="nome_responsavel" value="<?php echo $dados_responsavel[0]->nome_responsavel; ?>"/>
	<div class="error"><?php echo form_error('nome_responsavel'); ?></div>
 
	<label for="cpf_responsavel">CPF:</label><br/>
	<input type="text" name="cpf_responsavel" value="<?php echo $dados_responsavel[0]->cpf_responsavel; ?>"/>
	<div class="error"><?php echo form_error('cpf_responsavel'); ?></div>

	<input type="submit" name="atualizar" value="Atualizar" />
 
	<?php echo form_close(); ?>

	<div id="body">
	
		<p><a href="../../responsavel"> Retornar</a></p>
	
	</div>


</body>
</html>