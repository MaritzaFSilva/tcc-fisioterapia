<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
	<?php echo form_open('grau_parentesco/atualizar', 'codigo_grau_parentesco="form-grau_parentesco"'); ?>
 
	<input type="hidden" name="codigo_grau_parentesco" value="<?php echo $dados_grau[0]->codigo_grau_parentesco; ?>"/>
 
	<label for="nome">Nome:</label><br/>
	<input type="text" name="nome" value="<?php echo $dados_grau[0]->nome; ?>"/>
	<div class="error"><?php echo form_error('nome'); ?></div>
 
	
 
	<input type="submit" name="atualizar" value="Atualizar" />
 
	<?php echo form_close(); ?>
</body>
</html>