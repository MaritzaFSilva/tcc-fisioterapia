<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>AAAA<?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
    <?php echo form_open('substancia_gestacao_mae/inserir', 'codigo_substancia="form-substancia_gestacao_mae"'); ?>
    <h1>SUBSTÂNCIAS DA GESTAÇÃO DA MÃE</h1>
    <label for="nome">Nome:</label><br/>
    <input type="text" name="nome" value="<?php echo set_value('nome'); ?>"/>
    <div class="error"><?php echo form_error('nome'); ?></div>
    <input type="submit" name="cadastrar" value="Cadastrar" />
 
    <?php echo form_close(); ?>

    <!-- Lista as substancia_gestacao_mae Cadastradas -->
    <div id="grid-substancia_gestacao_mae">
        <ul>
        <?php foreach($substancia_gestacao_mae as $substancia): ?>
        <li>
            <a title="Deletar" href="<?php echo base_url() . 'substancia_gestacao_mae/deletar/' . $substancia->codigo_substancia; ?>" onclick="return confirm('Confirma a exclusão deste registro?')"><img src="<?php echo base_url(); ?>assets/img/lixo.png"/></a>
            <span> - </span>
            <a title="Editar" href="<?php echo base_url() . 'substancia_gestacao_mae/editar/' . $substancia->codigo_substancia; ?>"><?php echo $substancia->nome; ?></a>
          
            
        </li>
        <?php endforeach ?>
        </ul>
    </div>
    <!-- Fim Lista -->
</body>
</html>