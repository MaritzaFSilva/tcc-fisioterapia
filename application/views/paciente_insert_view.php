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
?>
<?php
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
            <?php echo form_open('paciente_insert/inserir', 'codigo_paciente="form-paciente"'); ?>

            <div class="panel-body">
                <div class="col-lg-12" ><label for="nome_paciente">Nome:</label><br/>
                    <input class='form-control' type="text" name="nome_paciente" placeholder="Nome Completo do Paciente" value="<?php echo set_value('nome_paciente'); ?>"/>
                    <div class="error"><?php echo form_error('nome_paciente'); ?></div></br>
                </div>    
                <div class="col-lg-3" >
                    <label for="sexo">Sexo:</label><br/>
                    <input type="checkbox" name="sexo_feminino" value="feminino"><label>Feminino</label>
                    <input type="checkbox" name="sexo_masculino" value="masculino"><label>Masculino </label>
                </div>
                <div class="col-lg-9" >
                    <label for="iniciais_nome_paciente">Iniciais:</label><br/>
                    <input class='form-control' type="text" name="iniciais_nome_paciente" placeholder="Iniciais do Nome do Paciente"value="<?php echo set_value('iniciais_nome_paciente'); ?>"/>
                    <div class="error"><?php echo form_error('iniciais_nome_paciente'); ?></div></br>
                </div>
                <div class="col-lg-12" >
                    <label for="nome_responsavel">Nome Responsável:</label>
                    <select class='form-control' placeholder="Nome Completo do Responsável" name="combo_responsavel" >
                        <?php
                        loadCombo('tb_responsavel', 'nome_responsavel')
                        ?></select> </br>
                </div>
                <div class="col-lg-12" >
                    <label for="nome_mae">Nome Mãe:</label><br/>
                    <input class='form-control' type="text" placeholder="Nome Completo da Mãe" name="nome_mae" value="<?php echo set_value('nome_mae'); ?>"/>
                    <div class="error"><?php echo form_error('nome_mae'); ?></div></br>
                </div>
                <div class="col-lg-4">
                    <label for="data_nascimento" >Data de Nascimento:</label>
                    <input class='form-control' type="date" name="data_nascimento" value="<?php echo set_value('data_nascimento'); ?>"/>
                    <div class="error"><?php echo form_error('data_nascimento'); ?></div>
                </div>

                <div class="col-lg-4">
                    <label for="nome_cidade_natal">Cidade Natal:</label>
                    <select class='form-control' name="combo_cidade_natal"">
                        <?php
                        loadCombo('tb_cidade', 'nome');
                        ?>
                    </select>
                </div>
                <div class="col-lg-4" >
                    <label for="renda">Renda Familiar:</label>
                    <select class='form-control' name="combo_renda">
                        <?php
                        loadCombo('tb_renda_familiar', 'descricao');
                        ?></select></br>
                </div>
                <div class="col-lg-2" >
                    <label for="passou_pela_uti">Passou pela UTI?</label><br/>
                    <input type="checkbox" name="passou_pela_uti" value="sim"><label>Sim   </label>
                    <input type="checkbox" name="passou_pela_uti" value="nao"><label>Não</label></br>
                </div>
                <div class="col-lg-10" >
                    <label for="pq_passou_pela_uti">Por que passou pela UTI?</label><br/>
                    <input class='form-control' type="text" name="pq_passou_pela_uti" value="<?php echo set_value('pq_passou_pela_uti'); ?>"/>
                    <div class="error"><?php echo form_error('pq_passou_pela_uti'); ?></div></br>
                </div>

                <div class="col-lg-3" >
                    <label for="tipo_parto">Tipo de Parto:</label><br/>
                    <input class='form-control' type="text" name="tipo_parto" value="<?php echo set_value('tipo_parto'); ?>"/>
                    <div class="error"><?php echo form_error('tipo_parto'); ?></div>
                </div>
                <div class="col-lg-3" >
                    <label for="idade_gestacional_nascimento">Idade Gestacional Nascimento:</label><br/>
                    <input class='form-control' type="text" name="idade_gestacional_nascimento" value="<?php echo set_value('idade_gestacional_nascimento'); ?>"/>
                    <div class="error"><?php echo form_error('idade_gestacional_nascimento'); ?></div>
                </div>
                <div class="col-lg-3" >
                    <label for="presenca_icterisia_neonatal">Presença Icterisia Neonatal:</label><br/>
                    <input class='form-control' type="text" name="presenca_icterisia_neonatal" value="<?php echo set_value('presenca_icterisia_neonatal'); ?>"/>
                    <div class="error"><?php echo form_error('presenca_icterisia_neonatal'); ?></div>
                    </br>
                </div>
                <div class="col-lg-3" >
                    <label for="comprimento_nascimento">Comprimento Nascimento:</label><br/>
                    <input class='form-control' type="text" name="comprimento_nascimento" value="<?php echo set_value('comprimento_nascimento'); ?>"/>
                    <div class="error"><?php echo form_error('comprimento_nascimento'); ?></div>
                    </br>
                </div>
                <div class="col-lg-3" >
                    <label for="peso_nascimento">Peso Nascimento:</label><br/>
                    <input class='form-control' type="text" name="peso_nascimento" value="<?php echo set_value('peso_nascimento'); ?>"/>
                    <div class="error"><?php echo form_error('peso_nascimento'); ?></div>
                    </br>
                </div>
                <div class="col-lg-3" >
                    <label for="perimetro_encefalico_nascimento">Perímetro Encefálico Nascimento:</label><br/>
                    <input class='form-control' type="text" name="perimetro_encefalico_nascimento" value="<?php echo set_value('perimetro_encefalico_nascimento'); ?>"/>
                    <div class="error"><?php echo form_error('perimetro_encefalico_nascimento'); ?></div>
                    </br>
                </div>
                <div class="col-lg-3" >
                    <label for="idade_mae_parto">Idade da mãe no Parto:</label><br/>
                    <input class='form-control' type="text" name="idade_mae_parto" value="<?php echo set_value('idade_mae_parto'); ?>"/>
                    <div class="error"><?php echo form_error('idade_mae_parto'); ?></div>
                    </br>
                </div>
                <div class="col-lg-3" >
                    <label for="numero_gestacoes_mae">Nº de Gestações da Mãe:</label><br/>
                    <input class='form-control' type="text" name="numero_gestacoes_mae" value="<?php echo set_value('numero_gestacoes_mae'); ?>"/>
                    <div class="error"><?php echo form_error('numero_gestacoes_mae'); ?></div>
                    </br>
                </div>
                <div class="col-lg-3" >
                    <label for="numero_abortos_mae">Nº de Abortos da Mãe:</label><br/>
                    <input class='form-control' type="text" name="numero_abortos_mae" value="<?php echo set_value('numero_abortos_mae'); ?>"/>
                    <div class="error"><?php echo form_error('numero_abortos_mae'); ?></div>
                    </br>
                </div>
                <div class="col-lg-2" >
                    <label for="apgar_1_min">Apgar 1 min:</label><br/>
                    <input class='form-control' type="text" name="apgar_1_min" value="<?php echo set_value('apgar_1_min'); ?>"/>
                    <div class="error"><?php echo form_error('apgar_1_min'); ?></div>
                    </br>
                </div>
                <div class="col-lg-2" >
                    <label for="apgar_5_min">Apgar 5 min:</label><br/>
                    <input class='form-control' type="text" name="apgar_5_min" value="<?php echo set_value('apgar_5_min'); ?>"/>
                    <div class="error"><?php echo form_error('apgar_5_min'); ?></div>
                    </br>
                </div>
                <div class="col-lg-2" >
                    <label for="apgar_10_min">Apgar 10 min:</label><br/>
                    <input class='form-control' type="text" name="apgar_10_min" value="<?php echo set_value('apgar_10_min'); ?>"/>
                    <div class="error"><?php echo form_error('apgar_10_min'); ?></div>
                    </br>
                </div>
                <div class="col-lg-3">
                    <label for="data_cadastro" >Data de Cadastro:</label>
                    <input class='form-control' type="date" name="data_cadastro" value="<?php echo set_value('data_cadastro'); ?>"/>
                    <div class="error"><?php echo form_error('data_cadastro'); ?></div>
                </div>

                <div class="col-lg-12" >
                    <input class='btn btn-default' id="b_cad" type="submit" name="cadastrar" value="AVANÇAR" />
                </div>
            </div>
            <?php echo form_close(); ?>

            <?php include("footer.php"); ?>
        </div>
        <?php
    } else if ($user['codigo_privilegio'] == 2) {
        //<!-- --------------------------------------------------------------------------------- -->
        //<!-- ------------------------------- FISIOTERAPEUTA ---------------------------------- -->
        //<!-- --------------------------------------------------------------------------------- -->                
        include("header_fisioterapeuta.php");
        ?>
        <!-- ---------------------------------- CORPO DA PÁGINA -------------------------------- -->


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
        //<!-- --------------------------------- ATENDENTE ------------------------------------- -->
        //<!-- --------------------------------------------------------------------------------- -->                
        include("header_atendente.php");
        ?>
        <!-- ---------------------------------- CORPO DA PÁGINA -------------------------------- -->
        <div class="panel-body">
            <div class="alert alert-info" role="alert">
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>

                <span >ALTERAR AQUI APÓS ESTAR PRONTO</span>
            </div>
        </div>
        <?php
    }
} else {
    //<!-- --------------------------------------------------------------------------------- -->
    //<!-- ---------------------------------- DESLOGADO ------------------------------------ -->
    //<!-- --------------------------------------------------------------------------------- -->
    include("header_deslogado.php")
    ?>
    <!-- ---------------------------------- CORPO DA PÁGINA -------------------------------- -->
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