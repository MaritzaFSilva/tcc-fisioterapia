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
        <!-- ------------------------------------- CORPO DA PÁGINA ----------------------------- -->

        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo form_open('responsavel/atualizar', 'codigo_responsavel="form-responsavel"'); ?>
                <h1>ALTERAÇÃO CADASTRO RESPONSÁVEL</h1>
                <input type="hidden" name="codigo_responsavel" value="<?php echo $dados_responsavel[0]->codigo_responsavel; ?>"/>

                <div class="col-lg-9" >
                    <label for="nome_responsavel">Nome:</label><br/>
                    <input class='form-control' type="text" name="nome_responsavel" value="<?php echo $dados_responsavel[0]->nome_responsavel; ?>"/>
                    <div class="error has-error"><?php echo form_error('nome_responsavel'); ?></div>
                </div>

                <div class="col-lg-3" >  
                    <label for="cpf_responsavel">CPF:</label><br/>
                    <input class='form-control' type="text" name="cpf_responsavel" value="<?php echo $dados_responsavel[0]->cpf_responsavel; ?>"/>
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
                    <input class='form-control' type="text" name="email" value="<?php echo $dados_responsavel[0]->email; ?>"/>
                    <div class="error"><?php echo form_error('email'); ?></div></br>
                </div>
                <div class="col-lg-2" >
                    <label for="cep">CEP:</label><br/>
                    <input class='form-control' type="text" name="cep" value="<?php echo $dados_responsavel[0]->cep; ?>"/>
                    <div class="error"><?php echo form_error('cep'); ?></div></br>
                </div> 
                <div class="col-lg-9" >
                    <label for="rua">Rua:</label><br/>
                    <input class='form-control' type="text" name="rua" value="<?php echo $dados_responsavel[0]->rua; ?>"/>
                    <div class="error"><?php echo form_error('rua'); ?></div></br>
                </div>
                <div class="col-lg-3" >
                    <label for="numero">Nº:</label><br/>
                    <input class='form-control' type="text" name="numero" value="<?php echo $dados_responsavel[0]->numero; ?>"/>
                    <div class="error"><?php echo form_error('numero'); ?></div></br>
                </div> 
                <div class="col-lg-6" >
                    <label for="bairro">Bairro:</label><br/>
                    <input class='form-control' type="text" name="bairro" value="<?php echo $dados_responsavel[0]->bairro; ?>"/>
                    <div class="error"><?php echo form_error('bairro'); ?></div></br>
                </div> 
                <div class="col-lg-6" >
                    <label for="complemento">Complemento:</label><br/>
                    <input class='form-control' type="text" name="complemento" value="<?php echo $dados_responsavel[0]->complemento; ?>"/>
                    <div class="error"><?php echo form_error('complemento'); ?></div></br>
                </div> 

                <div class="col-lg-12" >
                    <div class="pull-right">
                        <input class='btn btn-default' type="submit" name="atualizar" value="Atualizar" />
                    </div>
                </div>

                <?php echo form_close(); ?>
                <!-- Fim Lista -->
                <div class="col-lg-12" >
                    <div class="pull-left">
                        <p><a class=' btn btn-default glyphicon glyphicon-arrow-left'href="../../responsavel"></a></p>
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
        <?php include("no_permission.php"); ?>
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
    <!-- ----------------------------------- CORPO DA PÁGINA ------------------------------- -->
    <?php include("no_permission.php"); ?>
    <?php
}
?>
</body>

</html>