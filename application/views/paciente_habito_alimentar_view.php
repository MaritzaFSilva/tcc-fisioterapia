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
        $opt = "<option value='" . $aux['codigo_habito_alimentar'] . "'> " . $valor . "</option>";
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
<html lang="en">
    <head>
        <title>CIAF</title>
        <meta charset="utf-8">
        <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
        <link href="<?php echo base_url('assets/css/estilo.css') ?>" rel="stylesheet">
        <script type='text/javascript'>function enviar() {
                
                var arrHabitos = [];
                var i = 0;

                $('#table-habitos tr').each(function () {
                    var objHabito = new Object();

                    objHabito.codigo_habito_alimentar = ($(this).find('.col-cod')).attr('id');
                    objHabito.observacao = ($(this).find('.col-obs')).html();
                    objHabito.frequencia_semanal = ($(this).find('.col-frequencia')).html();
                    objHabito.data_cadastro = ($(this).find('.col-data')).html();

                    arrHabitos[i] = objHabito;
                    i++;

                });

                
                $.ajax({
                    url: '<?= base_url('paciente_habito_alimentar/inserir') ?>', // colocar minha url
                    type: 'POST',
                    data: 'obj=' + JSON.stringify(arrHabitos)

                }).done(function (data) {
                    alert();
                    for (d in data){
                        console.log("d: "+d);
                    }
                });
                

                return true;

            }
        </script>
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
                    <div align="center"  class="panel-heading"><h1>CADASTRO DE PACIENTE</h1></div>
                    <div id="content-form">
                        <div class="panel-body form-habito">
                            <div class="row">
                                <div class="pull-right">
                                    <div class="col-lg-12" >
                                        <button class="btn-default btn btn-add-panel glyphicon glyphicon-plus"> Adicionar</button> 
                                    </div>
                                </div>
                                <?php /* echo form_open('paciente/inserir', 'codigo_paciente="form-paciente"'); */ ?>                 
                                <form method="post" id="form-habito-alimentar">
                                    <div class="col-lg-12" >
                                        <label for="combo_habito">Hábito Alimentar:</label>
                                        <select class='form-control' name="combo_habito" id="combo-habito" >
                                            <?php
                                            loadCombo('tb_habito_alimentar', 'descricao')
                                            ?></select> </br>
                                    </div>
                                    <div class="col-lg-6" >
                                        <label for="observacao">Observação:</label><br/>
                                        <input class='form-control' type="text" name="observacao" id="input-observacao" value="<?php echo set_value('observacao'); ?>"/>
                                        <div class="error"><?php echo form_error('observacao'); ?></div></br>
                                    </div>
                                    <div class="col-lg-3" >
                                        <label for="frequencia_semanal">Frequência Semanal:</label><br/>
                                        <input class='form-control' type="text" name="frequencia_semanal"  id="input-frequencia" value="<?php echo set_value('frequencia_semanal'); ?>"/>
                                        <div class="error"><?php echo form_error('frequencia_semanal'); ?></div></br>
                                    </div>
                                    <div class="col-lg-3" >
                                        <label for="data_cadastro">Data Cadastro:</label><br/>
                                        <input id="input-data-cadastro" class='form-control' type="text" name="data_cadastro" value="<?php echo set_value('data_cadastro'); ?>"/>
                                        <div class="error"><?php echo form_error('data_cadastro'); ?></div></br>
                                    </div>

                                    <table class="table table-striped" id="table-habitos">
                                        <thead>
                                            <tr>
                                                <th>Hábito Alimentar</th>
                                                <th>Observação</th>
                                                <th>Frequência</th>
                                                <th>Data Cadastro</th>
                                                <th>Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>

                                    <div class="col-lg-12" >
                                        <button class='btn btn-default' id="b_cad" onclick="enviar()" type="button" name="cadastrar" value="AVANÇAR" >AVANÇAR</button>
                                    </div>

                            </div>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <label>
                            Aline Sieczko e Maritza Silva &copy 2016

                        </label>
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

<script type="text/javascript">
    $('.btn-add-panel').click(function () {

        //$('#table-habitos').append('<tr><td>' + $('#combo-habito').val() + '</td><td>' + $('#input-observacao').val() + '</td><td><button class="btn btn-xs btn-default">Remover</button></td></tr>');


        $('#table-habitos').append('<tr><td class="col-cod" id="' + $('#combo-habito').val() + '">'
                + $('#combo-habito option:selected').text() + '</td><td class="col-obs">'
                + $('#input-observacao').val() + '</td><td class="col-frequencia">'
                + $('#input-frequencia').val() + '</td><td class="col-data">'
                + $('#input-data-cadastro').val()
                + '</td><td><a class="btn btn-xs btn-default" onclick="RemoveTableRow(this)">Remover</a></td></tr>');

    });

    //Remove row 
    (function ($) {

        RemoveTableRow = function (handler) {
            var tr = $(handler).closest('tr');

            tr.fadeOut(400, function () {
                tr.remove();
            });

            return false;
        };
    })(jQuery);



</script>

</html>