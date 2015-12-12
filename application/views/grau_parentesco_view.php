<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
    <?php echo form_open('grau_parentesco/inserir', 'codigo_grau_parentesco="form-grau_parentesco"'); ?>
    <h1>GRAU PARENTESCO</h1>
    <label for="nome">Nome:</label><br/>
    <input type="text" name="nome" value="<?php echo set_value('nome'); ?>"/>
    <div class="error"><?php echo form_error('nome'); ?></div>
    <input type="submit" name="cadastrar" value="Cadastrar" />
 
    <?php echo form_close(); ?>

    <!-- Lista as grau_parentesco Cadastradas -->
    <div id="grid-grau_parentesco">
        <ul>
        <?php foreach($grau_parentesco as $grau_parentesco): ?>
        <li>
            <a title="Deletar" href="<?php echo base_url() . 'grau_parentesco/deletar/' . $grau_parentesco->codigo_grau_parentesco; ?>" onclick="return confirm('Confirma a exclusão deste registro?')"><img src="<?php echo base_url(); ?>assets/img/lixo.png"/></a>
            <span> - </span>
            <a title="Editar" href="<?php echo base_url() . 'grau_parentesco/editar/' . $grau_parentesco->codigo_grau_parentesco; ?>"><?php echo $grau_parentesco->nome; ?></a>
          
            
        </li>
        <?php endforeach ?>
        </ul>
    </div>
    <!-- Fim Lista -->
</body>
</html>