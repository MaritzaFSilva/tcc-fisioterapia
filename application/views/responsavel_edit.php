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
 
		<label for="nome_responsavel">nome_responsavel:</label><br/>
        <input type="text" name="nome_responsavel" value="<?php echo $dados_responsavel[0]->nome_responsavel; ?>"/>
        <div class="error"><?php echo form_error('nome_responsavel'); ?></div>

        <label for="sexo">Sexo:</label><br/>
        <label><input name="sexo" type="checkbox" id="sexo" value="masculino" />Masculino</label>
        <label><input name="sexo" type="checkbox" id="sexo" value="feminino" />Feminino</label> 
        <div class="error"><?php echo form_error('sexo'); ?></div>

        <label for="email">E-Mail:</label><br/>
        <input type="text" name="email" value="<?php echo $dados_responsavel[0]->email; ?>"/>
        <div class="error"><?php echo form_error('email'); ?></div>

        <label for="rua">Rua:</label><br/>
        <input type="text" name="rua" value="<?php echo $dados_responsavel[0]->rua; ?>"/>
        <div class="error"><?php echo form_error('rua'); ?></div>

        <label for="numero">Numero:</label><br/>
        <input type="text" name="numero" value="<?php echo $dados_responsavel[0]->numero; ?>"/>
        <div class="error"><?php echo form_error('numero'); ?></div>

        <label for="complemento">Complemento:</label><br/>
        <input type="text" name="complemento" value="<?php echo $dados_responsavel[0]->complemento; ?>"/>
        <div class="error"><?php echo form_error('complemento'); ?></div>

        <label for="bairro">Bairro:</label><br/>
        <input type="text" name="bairro" value="<?php echo $dados_responsavel[0]->bairro; ?>"/>
        <div class="error"><?php echo form_error('bairro'); ?></div>

        <label for="cep">CEP:</label><br/>
        <input type="text" name="cep" value="<?php echo $dados_responsavel[0]->cep; ?>"/>
        <div class="error"><?php echo form_error('cep'); ?></div>

        <label for="ativo">Ativo:</label><br/>
        <input type="text" name="ativo" value="<?php echo $dados_responsavel[0]->ativo; ?>"/>
        <div class="error"><?php echo form_error('ativo'); ?></div>

		<input type="submit" name="atualizar" value="Atualizar" />
 
	<?php echo form_close(); ?>
</body>
</html>