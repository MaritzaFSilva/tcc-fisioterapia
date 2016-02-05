<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
    <?php echo form_open('grau_escolaridade/inserir', 'codigo_grau_escolaridade="form-grau_escolaridade"'); ?>
    <h1>GRAU escolaridade</h1>
    <label for="descricao">Descrição:</label><br/>
    <input type="text" name="descricao" value="<?php echo set_value('descricao'); ?>"/>
    <div class="error"><?php echo form_error('descricao'); ?></div>
    <input type="submit" name="cadastrar" value="Cadastrar" />
 
    <?php echo form_close(); ?>

    <!-- Lista as grau_escolaridade Cadastradas -->
    <div id="grid-grau_escolaridade">
        <ul>
        <?php foreach($grau_escolaridade as $grau_escolaridade): ?>
        <li>
            <a title="Deletar" href="<?php echo base_url() . 'grau_escolaridade/deletar/' . $grau_escolaridade->codigo_grau_escolaridade; ?>" onclick="return confirm('Confirma a exclusão deste registro?')"><img src="<?php echo base_url(); ?>assets/img/lixo.png"/></a>
            <span> - </span>
            <a title="Editar" href="<?php echo base_url() . 'grau_escolaridade/editar/' . $grau_escolaridade->codigo_grau_escolaridade; ?>"><?php echo $grau_escolaridade->descricao; ?></a>
          
            
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