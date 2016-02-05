<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
	<?php echo form_open('habito_alimentar/atualizar', 'codigo_habito_alimentar="form-habito_alimentar"'); ?>
 
	<input type="hidden" name="codigo_habito_alimentar" value="<?php echo $dados_habito_alimentar[0]->codigo_habito_alimentar; ?>"/>
 
	<label for="descricao">Descrição:</label><br/>
	<input type="text" name="descricao" value="<?php echo $dados_habito_alimentar[0]->descricao; ?>"/>
	<div class="error"><?php echo form_error('descricao'); ?></div>
 
	
 
	<input type="submit" name="atualizar" value="Atualizar" />
 
	<?php echo form_close(); ?>

	<div id="body">
	
		<p><a href="../../habito_alimentar"> Retornar</a></p>
	
	</div>


</body>
</html>