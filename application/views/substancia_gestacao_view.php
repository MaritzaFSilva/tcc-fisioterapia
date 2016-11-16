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
            <div align="center"  class="panel-heading"><h1>SUBSTÂNCIAS DA GESTAÇÃO DA MÃE</h1></div>
            <div class="panel-body">
                <?php echo form_open('substancia_gestacao/inserir', 'codigo_substancia="form-substancia_gestacao"'); ?>
                <div class="col-lg-12" >
                    <label for="nome">Nome:</label><br/>
                    <input class='form-control' type="text" name="nome" value="<?php echo set_value('nome'); ?>"/>
                    <div class="error"><?php echo form_error('nome'); ?></div>
                    </br>
                </div>
                <div class="col-lg-12" >
                    <div class="pull-right">
                        <input class='btn btn-default' type="submit" name="cadastrar" value="Cadastrar" />
                    </div>
                </div>

                <?php echo form_close(); ?>

                <!-- Lista as substancia_gestacao Cadastradas -->
                <div id="grid-substancia_gestacao">
                    <div class="col-lg-12" >
                        </br>
                        <ul>
                            <?php foreach ($substancia_gestacao as $substancia): ?>
                                <li class="list-group-item">
                                    <a title="Deletar" href="<?php echo base_url() . 'substancia_gestacao/deletar/' . $substancia->codigo_substancia; ?>" onclick="return confirm('Confirma a exclusão deste registro?')"><img src="<?php echo base_url(); ?>assets/img/lixo.png"/></a>
                                    <span> - </span>
                                    <a title="Editar" href="<?php echo base_url() . 'substancia_gestacao/editar/' . $substancia->codigo_substancia; ?>"><?php echo $substancia->nome; ?></a>
                                </li>
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
    <!-- --------------------------------- CORPO DA PÁGINA --------------------------------- -->
    <?php include("no_permission.php"); ?>
    <?php
}
?>
</body>

</html>