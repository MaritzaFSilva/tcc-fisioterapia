<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
    <?php echo form_open('doenca/inserir', 'codigo_doenca="form-doenca"'); ?>
    <h1>DOENÇAS</h1>
    <label for="nome">Nome:</label><br/>
    <input type="text" name="nome" value="<?php echo set_value('nome'); ?>"/>
    <div class="error"><?php echo form_error('nome'); ?></div>
    <label for="orientacao">Orientacao:</label><br/>
    <input type="text" name="orientacao" value="<?php echo set_value('orientacao'); ?>"/>
    <div class="error"><?php echo form_error('orientacao'); ?></div>
    <label for="observacao">Observações:</label><br/>
    <input type="textarea" name="observacao" value="<?php echo set_value('observacao'); ?>"/>
    <div class="error"><?php echo form_error('observacao'); ?></div>
    <input type="submit" name="cadastrar" value="Cadastrar" />
 
    <?php echo form_close(); ?>

    <!-- Lista as doenca Cadastradas -->
    <div id="grid-doenca">
        <ul>
        <?php foreach($doenca as $doenca): ?>
        <li>
            <a title="Deletar" href="<?php echo base_url() . 'doenca/deletar/' . $doenca->codigo_doenca; ?>" onclick="return confirm('Confirma a exclusão deste registro?')"><img src="<?php echo base_url(); ?>assets/img/lixo.png"/></a>
            <span> - </span>
            <a title="Editar" href="<?php echo base_url() . 'doenca/editar/' . $doenca->codigo_doenca; ?>"><?php echo $doenca->nome; ?></a>
            <span> - </span>
            <span><?php echo $doenca->orientacao; ?></span>
            <span> - </span>
            <span><?php echo $doenca->observacao; ?></span>
            
        </li>
        <?php endforeach ?>
        </ul>
    </div>
    <!-- Fim Lista -->

    
    <div id="body">
    
        <p><a href="welcome"> Retornar</a></p>
    
    </div>



</body>
</html>