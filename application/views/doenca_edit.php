<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
	<?php echo form_open('doenca/atualizar', 'codigo_doenca="form-doenca"'); ?>
 
	<input type="hidden" name="codigo_doenca" value="<?php echo $dados_doenca[0]->codigo_doenca; ?>"/>
 
	<label for="nome">Nome:</label><br/>
	<input type="text" name="nome" value="<?php echo $dados_doenca[0]->nome; ?>"/>
	<div class="error"><?php echo form_error('nome'); ?></div>
 
	<label for="orientacao">Orientação:</label><br/>
	<input type="text" name="orientacao" value="<?php echo $dados_doenca[0]->orientacao; ?>"/>
	<div class="error"><?php echo form_error('orientacao'); ?></div>
 
 	<label for="observacao">Observação:</label><br/>
	<input type="textarea" name="observacao" value="<?php echo $dados_doenca[0]->observacao; ?>"/>
	<div class="error"><?php echo form_error('observacao'); ?></div>

	<input type="submit" name="atualizar" value="Atualizar" />
 
	<?php echo form_close(); ?>

	<div id="body">
	
		<p><a href="../../doenca"> Retornar</a></p>
	
	</div>


</body>
</html>