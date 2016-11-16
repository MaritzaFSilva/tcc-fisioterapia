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
//<!-- --------------------------------------------------------------------------------- -->
//<!-- ------------------------------------ LOGADO ------------------------------------- -->
//<!-- --------------------------------------------------------------------------------- -->
if (isset($user['codigo_privilegio'])) {
    if ($user['codigo_privilegio'] == 1) {
        //<!-- --------------------------------------------------------------------------------- -->
        //<!-- -------------------------------- ADMINISTRADOR ---------------------------------- -->
        //<!-- --------------------------------------------------------------------------------- -->
        include("header_admin.php");
        ?>
        <!-- ---------------------------------- CORPO DA PÁGINA -------------------------------- -->

        <div class="panel panel-default">
            <div align="center"  class="panel-heading"><h1>CADASTRO DE PACIENTE</h1></div>
            <div class="panel-body">
                <div class="col-lg-12">
                    <p><a class='btn btn-default' id="body" href="paciente_insert">Inserir</a></br></p></br>
                </div>
                <div id="grid-paciente">
                    <div class="col-lg-12" >
                        </br>
                        <ul>
                            <?php foreach ($paciente as $paciente): ?>
                                <div class="col-lg-12">
                                    <li class="list-group-item">
                                        <a title="Deletar" href="<?php echo base_url() . 'paciente/deletar/' . $paciente->codigo_paciente; ?>" onclick="return confirm('Confirma a exclusão deste registro?')"><img src="<?php echo base_url(); ?>assets/img/lixo.png"/></a>
                                        <span> - </span>
                                        <a title="Editar" href="<?php echo base_url() . 'paciente/editar/' . $paciente->codigo_paciente; ?>">
                                            <?php echo $paciente->nome_paciente; ?></a>
                                        <span> - </span>
                                        <span><?php echo $paciente->data_nascimento; ?></span>
                                        <span> - </span>
                                        <span><?php echo $paciente->nome_mae; ?></span>

                                    </li>
                                </div>
                            <?php endforeach ?>
                        </ul>
                    </div>
                </div>

                <!-- Fim Lista -->
                <div id="body">
                    <div class="pull-left">
                        </br>
                        <div class="col-lg-12" >
                            <p><a class='btn btn-default glyphicon glyphicon-arrow-left'href="welcome"></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php include("footer.php"); ?>
        </div>
        <?php
    } else if ($user['codigo_privilegio'] == 2) {
        //<!-- --------------------------------------------------------------------------------- -->
        //<!-- -------------------------------- FISIOTERAPEUTA --------------------------------- -->
        //<!-- --------------------------------------------------------------------------------- -->
        include("header_fisioterapeuta.php");
        ?>
        <!-- ---------------------------------- CORPO DA PÁGINA ------------=------------------- -->
           <div class="panel-body">
            <div class="alert alert-info" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>

                <span >ALTERAR AQUI APÓS ESTAR PRONTO</span>
            </div>
        </div>
        
        <?php
    } else if ($user['codigo_privilegio'] == 3) {
        //<!-- --------------------------------------------------------------------------------- -->
        //<!-- ---------------------------------- ATENDENTE ------------------------------------ -->
        //<!-- --------------------------------------------------------------------------------- -->
        include("header_atendente.php");
        ?>
        <!-- ---------------------------------- CORPO DA PÁGINA ------------=------------------- -->
        <?php include("no_permission.php"); ?>
        <?php
    }
} else {
    //<!-- --------------------------------------------------------------------------------- -->
    //<!-- ---------------------------------- DESLOGADO ------------------------------------ -->
    //<!-- --------------------------------------------------------------------------------- -->
    include("header_deslogado.php");
    ?>
    <!-- --------------------------------- CORPO DA PÁGINA --------------------------------- -->
    <?php include("no_permission.php"); ?>
    <?php
}
?>
</body>

</html>