<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
	<?php echo form_open('renda_familiar/atualizar', 'codigo_renda="form-renda_familiar"'); ?>
 
	<input type="hidden" name="codigo_renda" value="<?php echo $dados_renda[0]->codigo_renda; ?>"/>
 
	<label for="descricao">Descrição:</label><br/>
	<input type="text" name="descricao" value="<?php echo $dados_renda[0]->descricao; ?>"/>
	<div class="error"><?php echo form_error('descricao'); ?></div>
 
	
 
	<input type="submit" name="atualizar" value="Atualizar" />
 
	<?php echo form_close(); ?>
</body>
</html>