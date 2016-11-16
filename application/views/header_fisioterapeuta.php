<?php


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

    </head>
    <body id="body-nuvem">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for betterm obile display -->
                <div class="navbar-header">
                    <a href="<?= base_url() ?>welcome"><span class="navbar-brand" href="welcome">CIAF</span></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">CADASTROS FISIO<span class="caret"></span></a>
                            <ul class="dropdown-menu">
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