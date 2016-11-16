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
            <div align="center"  class="panel-heading"><h1>ALTERAÇÃO CADASTRO DE SUBSTÂNCIA NA GESTAÇÃO</h1></div>
            <div class="panel-body">
                <?php echo form_open('substancia_gestacao/atualizar', 'codigo_substancia="form-substancia_gestacao"'); ?>
                <input type="hidden" name="codigo_substancia" value="<?php echo $dados_substancia[0]->codigo_substancia; ?>"/>
                <div class="col-lg-12" >
                    <label for="nome">Nome:</label><br/>
                    <input class='form-control' type="text" name="nome" value="<?php echo $dados_substancia[0]->nome; ?>"/>
                    <div class="error"><?php echo form_error('nome'); ?></div>
                    </br>
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
                        <p><a class=' btn btn-default glyphicon glyphicon-arrow-left'href="../../substancia_gestacao"></a></p>
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