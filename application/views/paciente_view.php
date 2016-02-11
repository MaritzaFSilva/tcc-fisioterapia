<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo $titulo; ?></title>
        <meta charset="utf-8">
        <link href="<?php echo base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/font-awesome.min.css') ?>" rel="stylesheet">
        <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
        <link href="<?php echo base_url('assets/css/estilo.css') ?>" rel="stylesheet">
        <style type="text/css">
        

        </style>
        
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a href="welcome"><span class="navbar-brand" href="welcome">CIEF</span></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        
                        <li><a href="#">OOI</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Área Restrita <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="substancia_gestacao">Cadastro Substância Gestação</a></li>
                                <li><a href="auxilio_social">Cadastro Auxilio Social</a></li>
                                <li><a href="doenca">Cadastro Doença</a></li>
                                <li><a href="habito_alimentar">Cadastro Habito Alimentar</a></li>
                                <li><a href="grau_parentesco">Cadastro Grau Parentesco</a></li>
                                <li><a href="renda_familiar">Cadastro Rendas</a></li>
                                <li><a href="grau_escolaridade">Cadastro Grau Escolaridade</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="paciente">Cadastro Responsável</a></li>
                                <li><a href="paciente">Cadastro Paciente</a></li>
                            </ul>
                        </li>
                    </ul>    
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="panel panel-default">
            <div class="panel-body">
                <?php echo form_open('paciente/inserir', 'codigo_paciente="form-paciente"'); ?>
                
                <h1>CADASTRO DE PACIENTE</h1>
                <div class="panel panel-default" >
               <div align="center"  class="panel-heading">Dados do Paciente</div>
                <div class="panel-body">
                <label for="nome_paciente">Nome:</label><br/>
                <input class='form-control' type="text" name="nome_paciente" placeholder="Nome Completo do Paciente" value="<?php echo set_value('nome_paciente'); ?>"/>
                <div class="error"><?php echo form_error('nome_paciente'); ?></div></br>

                <label for="sexo">Sexo:</label><br/>
                <input type="checkbox" name="sexo_feminino" value="Bike">Feminino
                <input type="checkbox" name="sexo_masculino" value="Car">Masculino 
                </br></br>

                <label for="iniciais_nome_paciente">Iniciais:</label><br/>
                <input class='form-control' type="text" name="iniciais_nome_paciente" placeholder="Iniciais do Nome do Paciente"value="<?php echo set_value('iniciais_nome_paciente'); ?>"/>
                <div class="error"><?php echo form_error('iniciais_nome_paciente'); ?></div></br>
                
                <label for="nome_responsavel">Nome Responsável:</label>
                <select class='form-control' placeholder="Nome Completo do Responsável" name="combo_responsavel" ></select> </br>

                <label for="nome_mae">Nome Mãe:</label><br/>
                <input class='form-control' type="text" placeholder="Nome Completo da Mãe" name="nome_mae" value="<?php echo set_value('nome_mae'); ?>"/>
                <div class="error"><?php echo form_error('nome_mae'); ?></div></br>

                <table align="center" border="0" style="width:100%" margin: auto> 
                    <tr>
                        <th><label for="nome_mae">Data de Nascimento:</label><br/></th>
                        <th><label for="nome_cidade_natal">Cidade Natal:</label></th>
                        <th><label for="renda">Renda Familiar:</label></th>                     
                    </tr>
                    <tr>
                        <td ><input class='form-control' type="date" name="data_nascimento" value="<?php echo set_value('data_nascimento'); ?>" style="width : 180px;"/>
                        <div class="error"><?php echo form_error('data_nascimento'); ?></div></td>
                        <td><select class='form-control' name="combo_cidade_natal" style="width : 180px;"></select></td>
                        <td><select class='form-control' name="combo_renda" style="width : 180px;"></select></td>
                    </tr>
                </table>
</br>

             <label for="passou_pela_uti">Passou pela UTI?</label><br/>
                <input type="checkbox" name="passou_pela_uti_sim" value="Bike"><label>Sim   </label>
                <input type="checkbox" name="passou_pela_uti_nao" value="Car"><label>Não</label></br>

                <label for="pq_passou_pela_uti">Por que passou pela UTI?</label><br/>
                <input class='form-control' type="text" name="pq_passou_pela_uti" value="<?php echo set_value('pq_passou_pela_uti'); ?>"/>
                <div class="error"><?php echo form_error('pq_passou_pela_uti'); ?></div>

                

                </div>
            </div>
        </br>
         <div class="panel panel-default" >
                <div align="center" class="panel-heading">Habitos Alimentares da Mãe</div>
                <div class="panel-body">
                    <label for="nome_habito">Nome:</label><br/>
                    <select class='form-control' name="combo_habito" ></select> </br>

                    <label for="frequencia_semanal_habito">Frequência Semanal:</label><br/>
                    <input class='form-control' type="text" name="frequencia_habito" value="<?php echo set_value('frequencia_semanal_habito'); ?>"/>
                    <div class="error"><?php echo form_error('frequencia_semanal_habito'); ?></div></br>

                    <label for="observacao_habito">Observação:</label><br/>
                    <input class='form-control' type="text" name="observacao_habito" value="<?php echo set_value('observacao_habito'); ?>"/>
                    <div class="error"><?php echo form_error('observacao_habito'); ?></div></br>

                    <label for="data_cadastro_habito">Data de Cadastro:</label>
                    <input class='form-control' type="date" name="data_cadastro_habito" value="<?php echo set_value('data_cadastro_habito'); ?>" style="width : 20%;"/>
                    <div class="error"><?php echo form_error('data_cadastro_habito'); ?></div>

                </div>
            </div>
        </br>
         <div class="panel panel-default" >
                <div align="center" class="panel-heading">Substâncias na Gestação ingeridas pela Mãe</div>
                <div class="panel-body">
                    <label for="nome_substancia">Nome:</label><br/>
                    <select class='form-control' name="combo_substancia" ></select> </br>

                    <label for="frequencia_semanal_substancia">Frequência Semanal:</label><br/>
                    <input class='form-control' type="text" name="frequencia_substancia" value="<?php echo set_value('frequencia_semanal_substancia'); ?>"/>
                    <div class="error"><?php echo form_error('frequencia_semanal_substancia'); ?></div></br>

                    <label for="observacao_substancia">Observação:</label><br/>
                    <input class='form-control' type="text" name="observacao_substancia" value="<?php echo set_value('observacao_substancia'); ?>"/>
                    <div class="error"><?php echo form_error('observacao_substancia'); ?></div></br>

                    <label for="data_cadastro_substancia">Data de Cadastro:</label>
                    <input class='form-control' type="date" name="data_cadastro_substancia" value="<?php echo set_value('data_cadastro_substancia'); ?>" style="width : 20%;"/>
                    <div class="error"><?php echo form_error('data_cadastro_substancia'); ?></div>

                </div>
            </div>
        </br>
        <div class="panel panel-default" >
                <div align="center" class="panel-heading">Doenças vindas da Mãe</div>
                <div class="panel-body">
                    <label for="nome_doenca">Nome:</label><br/>
                    <select class='form-control' name="combo_doenca" ></select> </br>

                    <label for="observacao_doenca">Observação:</label><br/>
                    <input class='form-control' type="text" name="observacao_doenca" value="<?php echo set_value('observacao_doenca'); ?>"/>
                    <div class="error"><?php echo form_error('observacao_doenca'); ?></div></br>

                    <label for="data_cadastro_doenca">Data de Cadastro:</label>
                    <input class='form-control' type="date" name="data_cadastro_doenca" value="<?php echo set_value('data_cadastro_doenca'); ?>" style="width : 20%;"/>
                    <div class="error"><?php echo form_error('data_cadastro_doenca'); ?></div>

                </div>
            </div>
        </br>
            <div class="panel panel-default" >
      <div align="center"  class="panel-heading">Auxílio Social</div>
                <div class="panel-body">
                    <label for="nome_auxilio_social">Nome:</label><br/>
                    <select class='form-control' name="combo_auxilio_social" ></select> </br>

                 <table align="center" border="0" style="width:100%" margin: auto> 
                    <tr>
                        <th><label for="data_inicio_auxilio">Data de Início do Auxilio:</label></th>
                        <th><label for="data_inicio_auxilio">Data de Termino do Auxilio:</label></th>
                        <th><label for="data_inicio_auxilio">Data de Cadastro:</label></th>                     
                    </tr>
                    <tr>
                        <td ><input class='form-control' type="date" name="data_inicio_auxilio" value="<?php echo set_value('data_inicio_auxilio'); ?>" style="width : 80%;"/>
                        <div class="error"><?php echo form_error('data_inicio_auxilio'); ?></div></td>
                        <td ><input class='form-control' type="date" name="data_termino_auxilio" value="<?php echo set_value('data_termino_auxilio'); ?>" style="width : 80%;"/>
                        <div class="error"><?php echo form_error('data_termino_auxilio'); ?></div></td>
                        <td ><input class='form-control' type="date" name="data_cadastro_auxilio" value="<?php echo set_value('data_cadastro_auxilio'); ?>" style="width : 80%;"/>
                        <div class="error"><?php echo form_error('data_cadastro_auxilio'); ?></div></td>
                    </tr>
                </table>
            </br>

                <label for="valor">Valor:</label><br/>
                <input class='form-control' type="text" name="valor" value="<?php echo set_value('valor'); ?>"/>
                <div class="error"><?php echo form_error('valor'); ?></div></br>

                <label for="observacao_auxilio">Observação:</label><br/>
                <input class='form-control' type="text" name="observacao_auxilio" value="<?php echo set_value('observacao_auxilio'); ?>"/>
                <div class="error"><?php echo form_error('observacao_auxilio'); ?></div>

               

                </div>
            </div>
                </br>
            

  <input class='btn btn-default' type="submit" name="cadastrar" value="Cadastrar" />
                          
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
                    <p><a class='btn btn-default'href="welcome"> Retornar</a></p>
                </div>
            </div>
            <div class="panel-footer">
                Aline Sieczko e Maritza Silva &copy 2015
            </div>
        </div>
    </body>

</html>