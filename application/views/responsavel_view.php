<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
    <?php echo form_open('responsavel/inserir', 'cpf_responsavel="form-responsavel"'); ?>
        <h1>DOENÇAS</h1>
        <label for="nome_responsavel">nome_responsavel:</label><br/>
        <input type="text" name="nome_responsavel" value="<?php echo set_value('nome_responsavel'); ?>"/>
        <div class="error"><?php echo form_error('nome_responsavel'); ?></div>

        <label for="sexo">Sexo:</label><br/>
        <label><input name="sexo" type="checkbox" id="sexo" value="masculino" />Masculino</label>
        <label><input name="sexo" type="checkbox" id="sexo" value="feminino" />Feminino</label> 
        <div class="error"><?php echo form_error('sexo'); ?></div>

        <label for="email">E-Mail:</label><br/>
        <input type="text" name="email" value="<?php echo set_value('email'); ?>"/>
        <div class="error"><?php echo form_error('email'); ?></div>

        <label for="rua">Rua:</label><br/>
        <input type="text" name="rua" value="<?php echo set_value('rua'); ?>"/>
        <div class="error"><?php echo form_error('rua'); ?></div>

        <label for="numero">Numero:</label><br/>
        <input type="text" name="numero" value="<?php echo set_value('numero'); ?>"/>
        <div class="error"><?php echo form_error('numero'); ?></div>

        <label for="complemento">Complemento:</label><br/>
        <input type="text" name="complemento" value="<?php echo set_value('complemento'); ?>"/>
        <div class="error"><?php echo form_error('complemento'); ?></div>

        <label for="bairro">Bairro:</label><br/>
        <input type="text" name="bairro" value="<?php echo set_value('bairro'); ?>"/>
        <div class="error"><?php echo form_error('bairro'); ?></div>

        <label for="cep">CEP:</label><br/>
        <input type="text" name="cep" value="<?php echo set_value('cep'); ?>"/>
        <div class="error"><?php echo form_error('cep'); ?></div>

        <label for="ativo">Ativo:</label><br/>
        <input type="text" name="ativo" value="<?php echo set_value('ativo'); ?>"/>
        <div class="error"><?php echo form_error('ativo'); ?></div>

        <input type="submit" name="cadastrar" value="Cadastrar" />
 
    <?php echo form_close(); ?>

    <!-- Lista as responsavel Cadastradas -->
    <div id="grid-responsavel">
        <ul>
        <?php foreach($responsavel as $responsavel): ?>
        <li>
            <a title="Deletar" href="<?php echo base_url() . 'responsavel/deletar/' . $responsavel->cpf_responsavel; ?>" onclick="return confirm('Confirma a exclusão deste registro?')"><img src="<?php echo base_url(); ?>assets/img/lixo.png"/></a>
            <span> - </span>
            <a title="Editar" href="<?php echo base_url() . 'responsavel/editar/' . $responsavel->cpf_responsavel; ?>"><?php echo $responsavel->nome_responsavel; ?></a>
            <span> - </span>
            <span><?php echo $responsavel->sexo; ?></span>
            <span> - </span>
            <span><?php echo $responsavel->observacao; ?></span>
            
        </li>
        <?php endforeach ?>
        </ul>
    </div>
    <!-- Fim Lista -->
</body>
</html>