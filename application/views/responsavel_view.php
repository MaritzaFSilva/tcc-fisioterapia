<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function loadCombo($tabela, $campo) {
    $conexao = mysql_connect("localhost", "fisioterapia", "12345");
    mysql_select_db("DMN_Producao");


    $cont = 0; // contador de controle do laço 
    $valores = array(); // vetor que recebe todos os dados da consulta
    $query = "SELECT * FROM " . $tabela . " ORDER BY " . $campo . "";
    $consulta = mysql_query($query) or die(mysql_error()); // Executa a query no banco
    //Faz um looping (laço) e cria um vetor com os dados da consulta
    while ($valores[$cont] = mysql_fetch_array($consulta)) {
        $cont = $cont + 1; // incrementa o contador
    }

    $total = (count($valores) - 1);
    $cont = 0;

    echo "<option></option>";
    while ($cont < $total) {
        $aux = $valores[$cont];
        $valor = $aux[$campo];
        $opt = "<option> " . $valor . "</option>";
        echo $opt;
        $cont ++;
    }
    mysql_close($con);
}
?>
<?php
/* VISUALIZAR DADOS DA SESSÃO
  echo"<pre>";
  print_r($this->session->userdata());
  echo"</pre>"; */
$user = $this->session->userdata();
//echo $privilegio;

defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>CIAF</title>
        <meta charset="utf-8">
        <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
        <link href="<?php echo base_url('assets/css/estilo.css') ?>" rel="stylesheet">

    </head>
    <body>

        <?php
        //<!-- --------------------------------------------------------------------------------- -->
        //<!-- ------------------------------------ LOGADO ------------------------------------- -->
        //<!-- --------------------------------------------------------------------------------- -->
        if (isset($user['codigo_privilegio'])) {
            if ($user['codigo_privilegio'] == 1) {
                //<!-- --------------------------------------------------------------------------------- -->
                //<!-- -------------------------------- ADMINISTRADOR ---------------------------------- -->
                //<!-- --------------------------------------------------------------------------------- -->
                ?>
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <a href="<?= base_url() ?>welcome"><span class="navbar-brand" href="welcome">CIAF</span></a>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CADASTROS<span class="caret"></span></a>
                                    <ul class="dropdown-menu"> 
                                        <li><a href="<?= base_url() ?>substancia_gestacao">Cadastro Substância Gestação</a></li>
                                        <li><a href="<?= base_url() ?>auxilio_social">Cadastro Auxilio Social</a></li>
                                        <li><a href="<?= base_url() ?>doenca">Cadastro Doença</a></li>
                                        <li><a href="<?= base_url() ?>habito_alimentar">Cadastro Habito Alimentar</a></li>
                                        <li><a href="<?= base_url() ?>grau_parentesco">Cadastro Grau Parentesco</a></li>
                                        <li><a href="<?= base_url() ?>renda_familiar">Cadastro Rendas</a></li>
                                        <li><a href="<?= base_url() ?>grau_escolaridade">Cadastro Grau Escolaridade</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="<?= base_url() ?>responsavel">Cadastro Responsável</a></li>
                                        <li><a href="<?= base_url() ?>paciente">Cadastro Paciente</a></li>
                                    </ul>
                                </li>
                            </ul> 

                            <ul class="nav navbar-nav navbar-right">
                                <li><span class="navbar-brand" ><?php echo $user['login']; ?></span></li>
                                <li><a href="<?= base_url() ?>login/logout">Logout</a></li>
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>

                <!-- ------------------------------------- CORPO DA PÁGINA ------------------------------------- -->
                <div class="panel panel-default">
                    <div align="center"  class="panel-heading"><h1>CADASTRO DE RESPONSÁVEL</h1></div>
                    <div class="panel-body">
                        <?php echo form_open('responsavel/inserir', 'codigo_responsavel="form-responsavel"'); ?>
                        <div class="col-lg-9" >
                            <label for="nome_responsavel">Nome:</label><br/>
                            <input class='form-control' type="text" name="nome_responsavel" value="<?php echo set_value('nome_responsavel'); ?>"/>
                            <div class="error has-error">

                                <?php echo form_error('nome_responsavel'); ?>
                            </div>
                        </div>
                        <div class="col-lg-3" >  
                            <label for="cpf_responsavel">CPF:</label><br/>
                            <input class='form-control' type="text" name="cpf_responsavel" value="<?php echo set_value('cpf_responsavel'); ?>"/>
                            <div class="error"><?php echo form_error('cpf_responsavel'); ?></div></br>
                        </div>                                        
                        <div class="col-lg-3" >
                            <label for="sexo">Sexo:</label></br>
                            <input type="checkbox" name="sexo_feminino" value="feminino"><label>Feminino</label>
                            <input type="checkbox" name="sexo_masculino" value="masculino"><label>Masculino </label></br>
                        </div>
                        <div class="col-lg-3">
                            <label for="nome_cidade">Cidade Natal:</label>
                            <select class='form-control' name="combo_cidade">
                                <?php
                                loadCombo('tb_cidade', 'nome');
                                ?>
                            </select>
                        </div>
                        <div class="col-lg-3" >
                            <label for="codigo_grau_parentesco">Grau de Escolaridadde:</label>
                            <select class='form-control' name="codigo_grau_parentesco" >
                                <?php
                                loadCombo('tb_grau_parentesco', 'descricao')
                                ?></select> </br>
                        </div>
                        <div class="col-lg-3" >
                            <label for="codigo_grau_escolaridade">Grau de Escolaridadde:</label>
                            <select class='form-control' name="codigo_grau_escolaridade" >
                                <?php
                                loadCombo('tb_escolaridade', 'descricao')
                                ?></select> </br>
                        </div>
                        <div class="col-lg-10" >
                            <label for="email">E-Mail:</label><br/>
                            <input class='form-control' type="text" name="email" value="<?php echo set_value('email'); ?>"/>
                            <div class="error"><?php echo form_error('email'); ?></div></br>
                        </div>
                        <div class="col-lg-2" >
                            <label for="cep">CEP:</label><br/>
                            <input class='form-control' type="text" name="cep" value="<?php echo set_value('cep'); ?>"/>
                            <div class="error"><?php echo form_error('cep'); ?></div></br>
                        </div> 
                        <div class="col-lg-9" >
                            <label for="rua">Rua:</label><br/>
                            <input class='form-control' type="text" name="rua" value="<?php echo set_value('rua'); ?>"/>
                            <div class="error"><?php echo form_error('rua'); ?></div></br>
                        </div>
                        <div class="col-lg-3" >
                            <label for="numero">Nº:</label><br/>
                            <input class='form-control' type="text" name="numero" value="<?php echo set_value('numero'); ?>"/>
                            <div class="error"><?php echo form_error('numero'); ?></div></br>
                        </div> 
                        <div class="col-lg-6" >
                            <label for="bairro">Bairro:</label><br/>
                            <input class='form-control' type="text" name="bairro" value="<?php echo set_value('bairro'); ?>"/>
                            <div class="error"><?php echo form_error('bairro'); ?></div></br>
                        </div> 
                        <div class="col-lg-6" >
                            <label for="complemento">Complemento:</label><br/>
                            <input class='form-control' type="text" name="complemento" value="<?php echo set_value('complemento'); ?>"/>
                            <div class="error"><?php echo form_error('complemento'); ?></div></br>
                        </div> 


                        <div class="col-lg-12" >
                            <input class='btn btn-default' id="b_cad" type="submit" name="cadastrar" value="AVANÇAR" />
                        </div>
                    </div> <!-- panel body-->
                    <?php echo form_close(); ?>

                    <!-- Lista as responsavel Cadastradas -->
                    <div id="grid-responsavel">
                        <ul>
                            <?php foreach ($responsavel as $responsavel): ?>
                                <li>
                                    <a title="Deletar" href="<?php echo base_url() . 'responsavel/deletar/' . $responsavel->codigo_responsavel; ?>" onclick="return confirm('Confirma a exclusão deste registro?')"><img src="<?php echo base_url(); ?>assets/img/lixo.png"/></a>
                                    <span> - </span>
                                    <a title="Editar" href="<?php echo base_url() . 'responsavel/editar/' . $responsavel->codigo_responsavel; ?>"><?php echo $responsavel->nome_responsavel; ?></a>
                                    <span> - </span>
                                    <span><?php echo $responsavel->cpf_responsavel; ?></span>

                                </li>
                            <?php endforeach ?>
                        </ul>
                    </div>
                    <!-- Fim Lista -->
                    <div class="col-lg-12" >
                        <p><a class='btn btn-default' id="b_cad" href="welcome">RETORNAR</a></br></p></br>
                    </div>
                    </br></br></br> <!--ARRUMAR AQUUI ASSIM QUE POSSIVEL-->

                    <div class="panel-footer">
                        Aline Sieczko e Maritza Silva &copy 2016
                    </div>

                </div>

            </div>
            <?php
        } else if ($user['codigo_privilegio'] == 2) {
            //<!-- --------------------------------------------------------------------------------- -->
            //<!-- ---------------------------------- ATENDENTE ------------------------------------ -->
            //<!-- --------------------------------------------------------------------------------- -->                
            ?>
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <a href="<?= base_url() ?>welcome"><span class="navbar-brand" href="welcome">CIAF</span></a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CADASTROS<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= base_url() ?>responsavel">Cadastro Responsável</a></li>
                                    <li><a href="<?= base_url() ?>paciente">Cadastro Paciente</a></li>
                                </ul>
                            </li>
                        </ul> 

                        <ul class="nav navbar-nav navbar-right">
                            <li><span class="navbar-brand" ><?php echo $user['login']; ?></span></li>
                            <li><a href="<?= base_url() ?>login/logout">Logout</a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
            <div class="panel-body">
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>

                    <span >VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA</span>
                </div>
            </div>
            <?php
        }
    } else {
        //<!-- --------------------------------------------------------------------------------- -->
        //<!-- ---------------------------------- DESLOGADO ------------------------------------ -->
        //<!-- --------------------------------------------------------------------------------- -->
        ?><nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a href="<?= base_url() ?>welcome"><span class="navbar-brand" href="welcome">CIAF</span></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?= base_url() ?>login">Login</a></li>

                    </ul>    
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="panel-body">
            <div class="alert alert-danger" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>

                <span >VOCÊ NÃO TEM PERMISSÃO PARA ACESSAR ESTA PÁGINA</span>
            </div>
        </div>

    </div>
    <?php
}
?>
</body>

</html>