<?php
/* VISUALIZAR DADOS DA SESSÃO
  echo"<pre>";
  print_r($this->session->userdata());
  echo"</pre>"; */
$user = $this->session->userdata();
//echo $privilegio;

defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>

<body id="body-crianca">
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


            <?php
        } else if ($user['codigo_privilegio'] == 2) {
            //<!-- --------------------------------------------------------------------------------- -->
            //<!-- ------------------------------- FISIOTERAPEUTA ---------------------------------- -->
            //<!-- --------------------------------------------------------------------------------- -->                
            include("header_fisioterapeuta.php");
            ?>

            <?php
        } else if ($user['codigo_privilegio'] == 3) {
            //<!-- --------------------------------------------------------------------------------- -->
            //<!-- --------------------------------- ATENDENTE ------------------------------------- -->
            //<!-- --------------------------------------------------------------------------------- -->                
            include("header_atendente.php");
            ?>

            <?php
        }
    } else {
        //<!-- --------------------------------------------------------------------------------- -->
        //<!-- ---------------------------------- DESLOGADO ------------------------------------ -->
        //<!-- --------------------------------------------------------------------------------- -->
        include("header_deslogado.php");
    }
    ?>
    <!-- ------------------------------------- CORPO DA PÁGINA ------------------------------------- -->
    <div class="panel panel-default">
        <div class="panel-body">
            <p align="center">INSTITUTO FEDERAL DO PARANÁ - CAMPUS PARANAGUÁ</p>
            <p align="center"><B>PROJETO DE TCC</B></p>
            <p align="center"> CIAF - CONTROLE DE INFORMAÇÕES NA ÁREA DE FISIOTERAPIA</p>
            <p align="justify" >A fisioterapia é uma área bastante abrangente. Este trabalho foca na pediatria, mais especificamente no desenvolvimento motor normal em bebes de 0 a 12 meses. Todo bebê apresenta um desenvolvimento motor particular, que durante seus primeiros anos de vida irá evoluir, propiciando ao bebê uma melhora na manipulação de objetos, no caminhar e na interação com o meio. Mesmo com estas particularidades, pode-se mapear alguns requisitos que mostram o retardo ou a evolução do desenvolvimento. Quando algum retardo é encontrado, algumas medidas são mensuradas por parte da fisioterapia visando corrigir o atraso encontrado. Até o momento, os registros das informações, bem como, a analise das mesmas se dá por meio de planilhas eletronias e fichas em papel. Trazendo uma série de problemas, que refletem na duplicidade de dados, dificuldade de armazenamento,  analise e obtenção de estatisticas que poderiam gerar investimento de politicas públicas para a área de saúde. Diante desta problematica, este projeto desenvolve um banco de dados que trabalha em conjunto com um sistema web, para a automatização do processo. Este fornecerá ao fisisoterapeuta uma forma de evitar os problemas atuais. O sistema web tem como principais funcionalidades: o cadastro dos pacientes e responsaveis, o cadastro de questões utilizadas nas consultas, o controle de permissão e a emissão de relatórios. O projeto mudará a forma como as consultas serão feitas, permitindo uma melhor analise de cada bebê e trazendo a tecnologia para postos de saúdes.</p>

            <p align="center"><B>ORIENTADOR:</B> WAGNER R. WEINERT | <B> COORIENTADOR:</B> DIEGO STIEHL</p>
            <p align="center"><B>ALUNAS:</B> ALINE BORA SIECZKO E MARITZA FERNANDA DOS S. SILVA</p>
        </div>
        <!-- ------------------------------------- RODAPÉ DA PÁGINA ------------------------------------- -->
        <div class="panel-footer">Aline Sieczko e Maritza Silva &copy 2016</div>
    </div>
</body>
</html>