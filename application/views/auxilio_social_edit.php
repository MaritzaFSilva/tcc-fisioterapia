<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
	<?php echo form_open('auxilio_social/atualizar', 'codigo_auxilio_social="form-auxilio_social"'); ?>
 
	<input type="hidden" name="codigo_auxilio_social" value="<?php echo $dados_auxilio_social[0]->codigo_auxilio_social; ?>"/>
 
	<label for="nome">Nome:</label><br/>
	<input type="text" name="nome" value="<?php echo $dados_auxilio_social[0]->nome; ?>"/>
	<div class="error"><?php echo form_error('nome'); ?></div>
 
	<label for="origem">origem:</label><br/>
	<input type="text" name="origem" value="<?php echo $dados_auxilio_social[0]->origem; ?>"/>
	<div class="error"><?php echo form_error('origem'); ?></div>
 
	<input type="submit" name="atualizar" value="Atualizar" />
 
	<?php echo form_close(); ?>


	<div id="body">
	
		<p><a href="../../auxilio_social"> Retornar</a></p>
	
	</div>


</body>
</html>