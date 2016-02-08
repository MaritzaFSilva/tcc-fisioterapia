<?php
    include ("funcoes.php");

    $doenca = array();
    $query = "";
        $con = conectar(); 
        $query = "SELECT * FROM doenca";
        $doenca = Select($query);
        desconectar($con);
    
?>
<html lang="pt-BR">
<head>
    <title><?php echo $titulo; ?></title>
    <meta charset="UTF-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
</head>
<body>
    <?php echo form_open('paciente/inserir', 'codigo_paciente="form-paciente"'); ?>
    <h1>DOENÇAS</h1>
    <label for="nome_paciente">Nome:</label><br/>
    <input type="text" name="nome_paciente" value="<?php echo set_value('nome_paciente'); ?>"/>
    <div class="error"><?php echo form_error('nome_paciente'); ?></div>
    <label for="cpf_paciente">CPF:</label><br/>
    <input type="text" name="cpf_paciente" value="<?php echo set_value('cpf_paciente'); ?>"/>
    <div class="error"><?php echo form_error('cpf_paciente'); ?></div>
    <input type="submit" name="cadastrar" value="Cadastrar" />

    <select name="cb_usuario" onChange="this.form.submit()" style="width : 180px;"> 
                    <?php loadCombo("doenca", "nome"); ?>
                </select>   
 
    <?php echo form_close(); ?>

    <!-- Lista as paciente Cadastradas -->
    <div id="grid-paciente">
        <ul>
        <?php foreach($paciente as $paciente): ?>
        <li>
            <a title="Deletar" href="<?php echo base_url() . 'paciente/deletar/' . $paciente->codigo_paciente; ?>" onclick="return confirm('Confirma a exclusão deste registro?')"><img src="<?php echo base_url(); ?>assets/img/lixo.png"/></a>
            <span> - </span>
            <a title="Editar" href="<?php echo base_url() . 'paciente/editar/' . $paciente->codigo_paciente; ?>"><?php echo $paciente->nome_paciente; ?></a>
            <span> - </span>
            <span><?php echo $paciente->cpf_paciente; ?></span>
            
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