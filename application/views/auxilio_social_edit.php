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
                        <div align="center"  class="panel-heading"><h1>AUXÍLIO SOCIAL</h1></div>
                        <?php echo form_open('auxilio_social/atualizar', 'codigo_auxilio_social="form-auxilio_social"'); ?>
                        <input type="hidden" name="codigo_auxilio_social" value="<?php echo $dados_auxilio_social[0]->codigo_auxilio_social; ?>"/>

                        <div class="col-lg-12" >
                            <label for="nome">Nome:</label><br/>
                        <input class='form-control' type="text" name="nome" value="<?php echo $dados_auxilio_social[0]->nome; ?>"/>
                        <div class="error"><?php echo form_error('nome'); ?></div>
</div>
                        <div class="col-lg-12" >    
                            <label for="origem">Origem:</label><br/>
                        <input class='form-control' type="text" name="origem" value="<?php echo $dados_auxilio_social[0]->origem; ?>"/>
                        <div class="error"><?php echo form_error('origem'); ?></div>
                        </div>
                        <div class="col-lg-12" >
                    <div class="pull-right">
                        <input class='btn btn-default' type="submit" name="atualizar" value="Atualizar" />
                    </div>
                </div>
                        <?php echo form_close(); ?>


                       <div class="col-lg-12" >
                    <div class="pull-left">
                        <p><a class=' btn btn-default glyphicon glyphicon-arrow-left'href="../../auxilio_social"></a></p>
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