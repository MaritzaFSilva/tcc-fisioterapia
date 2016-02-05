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
        <label for="nome_responsavel">Nome Responsável:</label><br/>
        <input type="text" name="nome_responsavel" value="<?php echo set_value('nome_responsavel'); ?>"/>
        <div class="error"><?php echo form_error('nome_responsavel'); ?></div>

        <label for="cpf_responsavel">cpf:</label><br/>
        <input type="text" name="cpf_responsavel" value="<?php echo set_value('cpf_responsavel'); ?>"/>        
        <div class="error"><?php echo form_error('cpf_responsavel'); ?></div>     

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
            <span><?php echo $responsavel->cpf_responsavel; ?></span>
            
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