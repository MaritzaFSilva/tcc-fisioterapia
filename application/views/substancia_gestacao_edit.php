<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
	<?php echo form_open('substancia_gestacao/atualizar', 'codigo_substancia="form-substancia_gestacao"'); ?>
 
	<input type="hidden" name="codigo_substancia" value="<?php echo $dados_substancia[0]->codigo_substancia; ?>"/>
 
	<label for="nome">Nome:</label><br/>
	<input type="text" name="nome" value="<?php echo $dados_substancia[0]->nome; ?>"/>
	<div class="error"><?php echo form_error('nome'); ?></div>
 
	
 
	<input type="submit" name="atualizar" value="Atualizar" />
 
	<?php echo form_close(); ?>

	<div id="body">
	
		<p><a href="../../substancia_gestacao"> Retornar</a></p>
	
	</div>



</body>
</html>