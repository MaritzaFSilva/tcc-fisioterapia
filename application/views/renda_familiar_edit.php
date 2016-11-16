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
        <!-- -------------------------------- CORPO DA PÁGINA ---------------------------------- -->

        <div class="panel panel-default">
            <div align="center"  class="panel-heading"><h1>ALTERAÇÃO CADASTRO DE RENDA FAMILIAR</h1></div>
            <div class="panel-body">
                <?php echo form_open('renda_familiar/atualizar', 'codigo_renda="form-renda_familiar"'); ?>

                <input type="hidden" name="codigo_renda" value="<?php echo $dados_renda[0]->codigo_renda; ?>"/>
                <div class="col-lg-12" >
                    <label for="descricao">Descrição:</label><br/>
                    <input class='form-control' type="text" name="descricao" value="<?php echo $dados_renda[0]->descricao; ?>"/>
                    <div class="error"><?php echo form_error('descricao'); ?></div>
                    </br>
                </div>


                <div class="col-lg-12" >
                    <div class="pull-right">
                        <input class='btn btn-default' type="submit" name="atualizar" value="Atualizar" />
                    </div>
                </div>
                <?php echo form_close(); ?>

                <div class="col-lg-12" >
                    <div class="pull-left">
                        <p><a class=' btn btn-default glyphicon glyphicon-arrow-left'href="../../renda_familiar"></a></p>
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