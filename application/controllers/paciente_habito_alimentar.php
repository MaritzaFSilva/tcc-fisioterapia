<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class paciente_habito_alimentar extends CI_Controller {

    function __construct() {
        parent::__construct();
        /* Carrega o modelo */
        $this->load->model('paciente_habito_alimentar_model', 'model', TRUE);
    }

    function index() {
        $this->load->helper('form');
        $data_paciente['titulo'] = "CIAF | Paciente";
        $data_paciente["paciente_habito_alimentar"] = $this->model->listar();

//        echo $this->db->insert_id();
        $this->load->view('paciente_habito_alimentar_view.php', $data_paciente);
    }

    function inserir() {

        echo $_POST['obj'];
        //$data_habito = json_decode($_POST['obj'], true);

        header('Content-Type: text/html; charset=utf-8'); // para formatar corretamente os acentos

        $arr = json_decode($_POST['obj'], true);



        /* Carrega a biblioteca do CodeIgniter Paciente pela validação dos formulários */
        $this->load->library('form_validation');

        /* Define as tags onde a mensagem de erro será exibida na página */
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        /* Define as regras para validação */
        $this->form_validation->set_rules('observacao', 'Observacao', 'required|max_length[100]');


        /* Executa a validação e caso houver erro chama a função index do controlador */
        if ($this->form_validation->run() === FALSE) {
            $this->index();
            /* Senão, caso sucesso: */
        } else {
            $this->load->helper('cookie');
            $cookie = get_cookie('data_form_paciente');
            echo '<pre> xx';
            print_r(unserialize($cookie));
            echo '</pre>';


//            //Salvar cookie
//            $this->load->helper('cookie');
//
//            $cookie = array(
//                'name' => 'data_form_paciente',
//                'value' => serialize($arr),
//                'expire' => '86500'
//            );
//
//            $this->input->set_cookie($cookie);
//
//            ///Pegar cookie
//            //$this->load->helper('cookie');
//            $cookie = get_cookie('data_form_paciente');
//            echo '<pre>-x-';
//            print_r(unserialize($cookie));
//            echo '</pre>';
//            
//              print_r($arr);
//            ////
//            //$this->model->inserir($data_paciente, 'tb_paciente');
//            //redirect('paciente_habito_alimentar',$data_paciente);
        }

        function editar($codigo_paciente) {

            /* Aqui vamos definir o título da página de edição */
            $data_paciente['titulo'] = "CIAF | Paciente";

            /* Busca os dados da paciente que será editada */
            $data_paciente['dados_paciente'] = $this->model->editar($codigo_paciente);

            /* Carrega a página de edição com os dados da paciente */
            $this->load->view('paciente_habito_alimentar_edit', $data_paciente);
        }

        function atualizar() {

            /* Carrega a biblioteca do CodeIgniter Paciente pela validação dos formulários */
            $this->load->library('form_validation');

            /* Define as tags onde a mensagem de erro será exibida na página */
            $this->form_validation->set_error_delimiters('<span>', '</span>');

            /* Aqui estou definindo as regras de validação do formulário, assim como 
              na função inserir do controlador, porém estou mudando a forma de escrita */
            $validations = array(
                array(
                    'field' => 'nome_paciente',
                    'label' => 'Nome',
                    'rules' => 'trim|required|max_length[100]'
                ),
            );
            $this->form_validation->set_rules($validations);

            /* Executa a validação e caso houver erro chama a função editar do controlador novamente */
            if ($this->form_validation->run() === FALSE) {
                $this->editar($this->input->post('codigo_paciente'));
            } else {
                /* Senão obtém os dados do formulário */
                $data_paciente['codigo_paciente'] = $this->input->post('codigo_paciente');
                $data_paciente['nome_paciente'] = strtoupper($this->input->post('nome_paciente'));


                /* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
                if ($this->model->atualizar($data_paciente)) {
                    redirect('paciente_habito_alimentar');
                } else {
                    log_message('error', 'Erro ao atualizar a paciente.');
                }
            }
        }

        function deletar($codigo_paciente) {

            /* Executa a função deletar do modelo passando como parâmetro o id da paciente */
            if ($this->model->deletar($codigo_paciente)) {
                redirect('paciente_habito_alimentar');
            } else {
                log_message('error', 'Erro ao deletar a paciente.');
            }
        }

    }

}
