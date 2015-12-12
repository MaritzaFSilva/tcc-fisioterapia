<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
    <?php echo form_open('auxilio_social/inserir', 'codigo_auxilio_social="form-auxilio_social"'); ?>
    <h1>AUXÍLIO SOCIAL</h1>
    <label for="nome">Nome:</label><br/>
    <input type="text" name="nome" value="<?php echo set_value('nome'); ?>"/>
    <div class="error"><?php echo form_error('nome'); ?></div>
    <label for="origem">Origem:</label><br/>
    <input type="text" name="origem" value="<?php echo set_value('origem'); ?>"/>
    <div class="error"><?php echo form_error('origem'); ?></div>
    <input type="submit" name="cadastrar" value="Cadastrar" />
 
    <?php echo form_close(); ?>

    <!-- Lista as auxilio_social Cadastradas -->
    <div id="grid-auxilio_social">
        <ul>
        <?php foreach($auxilio_social as $auxilio_social): ?>
        <li>
            <a title="Deletar" href="<?php echo base_url() . 'auxilio_social/deletar/' . $auxilio_social->codigo_auxilio_social; ?>" onclick="return confirm('Confirma a exclusão deste registro?')"><img src="<?php echo base_url(); ?>assets/img/lixo.png"/></a>
            <span> - </span>
            <a title="Editar" href="<?php echo base_url() . 'auxilio_social/editar/' . $auxilio_social->codigo_auxilio_social; ?>"><?php echo $auxilio_social->nome; ?></a>
            <span> - </span>
            <span><?php echo $auxilio_social->origem; ?></span>
            
        </li>
        <?php endforeach ?>
        </ul>
    </div>
    <!-- Fim Lista -->
</body>
</html>