<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {

    function __construct() {
        parent::__construct();
        /* Carrega o modelo */
    }

    function index() {
        $this->load->helper('form');
        $data['titulo'] = "CIAF";
        $this->load->view('login.php', $data);
    }

    function validaLogin() {
        $login = $this->input->post('login');
        $senha = $this->input->post('senha');

        $this->load->model('avaliador');

        //Validações de Login

        $result = $this->avaliador->verificaLogin($login, $senha);

        if ($result) {
            //Está certo

            $this->session->set_userdata($result);

            $this->load->helper('form');
            $data['titulo'] = "CIAF";
            $this->load->view('welcome_message.php', $data);
        } else {
            $this->load->helper('form');
            $data['titulo'] = "CIAF";
            $data['error'] = true;
            $this->load->view('login.php', $data);
        }
    }

    function logout() {
        $this->session->sess_destroy();
        $this->load->helper('form');
        $data['titulo'] = "CIAF";
        $this->load->view('login.php', $data);
    }

    function getDataSession() {
        return $session->userdata;
    }

}
