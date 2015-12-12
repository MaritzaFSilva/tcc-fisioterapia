<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
    <?php echo form_open('renda_familiar/inserir', 'codigo_renda="form-renda_familiar"'); ?>
    <h1>RENDA FAMILIAR</h1>
    <label for="descricao">Descrição:</label><br/>
    <input type="text" name="descricao" value="<?php echo set_value('descricao'); ?>"/>
    <div class="error"><?php echo form_error('descricao'); ?></div>
    <input type="submit" name="cadastrar" value="Cadastrar" />
 
    <?php echo form_close(); ?>

    <!-- Lista as renda_familiar Cadastradas -->
    <div id="grid-renda_familiar">
        <ul>
        <?php foreach($renda_familiar as $renda): ?>
        <li>
            <a title="Deletar" href="<?php echo base_url() . 'renda_familiar/deletar/' . $renda->codigo_renda; ?>" onclick="return confirm('Confirma a exclusão deste registro?')"><img src="<?php echo base_url(); ?>assets/img/lixo.png"/></a>
            <span> - </span>
            <a title="Editar" href="<?php echo base_url() . 'renda_familiar/editar/' . $renda->codigo_renda; ?>"><?php echo $renda->descricao; ?></a>
          
            
        </li>
        <?php endforeach ?>
        </ul>
    </div>
    <!-- Fim Lista -->
</body>
</html>