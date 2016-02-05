<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
    <?php echo form_open('habito_alimentar/inserir', 'codigo_habito_alimentar="form-habito_alimentar"'); ?>
    <h1>HÁBITO ALIMENTAR</h1>
    <label for="descricao">Descrição:</label><br/>
    <input type="text" name="descricao" value="<?php echo set_value('descricao'); ?>"/>
    <div class="error"><?php echo form_error('descricao'); ?></div>
    <input type="submit" name="cadastrar" value="Cadastrar" />
 
    <?php echo form_close(); ?>

    <!-- Lista as habito_alimentar Cadastradas -->
    <div id="grid-habito_alimentar">
        <ul>
        <?php foreach($habito_alimentar as $habito_alimentar): ?>
        <li>
            <a title="Deletar" href="<?php echo base_url() . 'habito_alimentar/deletar/' . $habito_alimentar->codigo_habito_alimentar; ?>" onclick="return confirm('Confirma a exclusão deste registro?')"><img src="<?php echo base_url(); ?>assets/img/lixo.png"/></a>
            <span> - </span>
            <a title="Editar" href="<?php echo base_url() . 'habito_alimentar/editar/' . $habito_alimentar->codigo_habito_alimentar; ?>"><?php echo $habito_alimentar->descricao; ?></a>
          
            
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