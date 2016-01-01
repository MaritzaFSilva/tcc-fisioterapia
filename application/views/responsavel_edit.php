<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
	<?php echo form_open('responsavel/atualizar', 'cpf_responsavel="form-responsavel"'); ?>
 
		<input type="hidden" name="cpf_responsavel" value="<?php echo $dados_responsavel[0]->cpf_responsavel; ?>"/>
 
		<label for="nome_responsavel">Nome Responsável:</label><br/>
        <input type="text" name="nome_responsavel" value="<?php echo $dados_responsavel[0]->nome_responsavel; ?>"/>
        <div class="error"><?php echo form_error('nome_responsavel'); ?></div>

        <label for="cpf_responsavel">cpf_responsavel:</label><br/>
        <input type="text" name="cpf_responsavel" value="<?php echo $dados_responsavel[0]->cpf_responsavel; ?>"/>
        <div class="error"><?php echo form_error('cpf_responsavel'); ?></div>
        
		<input type="submit" name="atualizar" value="Atualizar" />
 
	<?php echo form_close(); ?>
</body>
</html>