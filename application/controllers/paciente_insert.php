<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class paciente_insert extends CI_Controller {

    function __construct() {
        parent::__construct();
        /* Carrega o modelo */
        $this->load->model('paciente_insert_model', 'model', TRUE);
    }

    function index() {
        $this->load->helper('form');
        $data_paciente['titulo'] = "CIAF | Paciente";
        $data_paciente["paciente_insert"] = $this->model->listar();
        $this->load->view('paciente_insert_view.php', $data_paciente);
    }

    function inserir() {
        /* Carrega a biblioteca do CodeIgniter Paciente pela validação dos formulários */
        $this->load->library('form_validation');

        /* Define as tags onde a mensagem de erro será exibida na página */
        $this->form_validation->set_error_delimiters('<span>', '</span>');

        /* Define as regras para validação */
        $this->form_validation->set_rules('nome_paciente', 'Nome', 'required|max_length[100]');


        /* Executa a validação e caso houver erro chama a função index do controlador */
        if ($this->form_validation->run() === FALSE) {
            $this->index();
            /* Senão, caso sucesso: */
        } else {
            /* ----------------------------------------INICIO DADOS PACIENTE-------------------------------- */
            /* Recebe os dados do formulário (visão) */
            $data_paciente['nome_paciente'] = ($this->input->post('nome_paciente'));
            $data_paciente['iniciais_nome_paciente'] = ($this->input->post('iniciais_nome_paciente'));
            if ($this->input->post('sexo_feminino') == "feminino") {
                $data_paciente['sexo'] = strtoupper($this->input->post('sexo_feminino'));
            } else {
                $data_paciente['sexo'] = $this->input->post('sexo_masculino');
            }
            $codigoResponsavel = $this->model->pegando_codigo('codigo_responsavel', 'tb_responsavel', 'nome_responsavel', $this->input->post('combo_responsavel'));
            $data_paciente['codigo_responsavel'] = $codigoResponsavel[0];
            $data_paciente['nome_mae'] = ($this->input->post('nome_mae'));
            $data_paciente['data_nascimento'] = ($this->input->post('data_nascimento'));
            $codigoCidadeNatal = $this->model->pegando_codigo('codigo_cidade', 'tb_cidade', 'nome', $this->input->post('combo_cidade_natal'));
            $data_paciente['codigo_cidade'] = $codigoCidadeNatal[0];
            $codigoRenda = $this->model->pegando_codigo('codigo_renda', 'tb_renda_familiar', 'descricao', $this->input->post('combo_renda'));
            $data_paciente['codigo_renda'] = $codigoRenda[0];

            if ($this->input->post('passou_pela_uti') == "sim") {
                $data_paciente['passou_pela_uti'] = 1;
            } else {
                $data_paciente['passou_pela_uti'] = 2;
            }
            $data_responsavel['pq_passou_pela_uti'] = strtoupper($this->input->post('pq_passou_pela_uti'));
            $data_paciente['tipo_parto'] = ($this->input->post('tipo_parto'));
            $data_paciente['idade_gestacional_nascimento'] = ($this->input->post('idade_gestacional_nascimento'));
            $data_paciente['presenca_icterisia_neonatal'] = ($this->input->post('presenca_icterisia_neonatal'));
            $data_paciente['comprimento_nascimento'] = ($this->input->post('comprimento_nascimento'));
            $data_paciente['peso_nascimento'] = ($this->input->post('peso_nascimento'));
            $data_paciente['perimetro_encefalico_nascimento'] = ($this->input->post('perimetro_encefalico_nascimento'));
            $data_paciente['apgar_1_min'] = ($this->input->post('apgar_1_min'));
            $data_paciente['apgar_5_min'] = ($this->input->post('apgar_5_min'));
            $data_paciente['apgar_10_min'] = ($this->input->post('apgar_10_min'));
            $data_paciente['idade_mae_parto'] = ($this->input->post('idade_mae_parto'));
            $data_paciente['numero_gestacoes_mae'] = ($this->input->post('numero_gestacoes_mae'));
            $data_paciente['numero_abortos_mae'] = ($this->input->post('numero_abortos_mae'));
            $data_paciente['data_cadastro'] = ($this->input->post('data_cadastro'));


            //Salvar cookie
            $this->load->helper('cookie');

            $cookie = array(
                'name' => 'data_form_paciente',
                'value' => serialize($data_paciente),
                'expire' => '86500'
            );

            $this->input->set_cookie($cookie);

            ///Pegar cookie
            //$this->load->helper('cookie');
            $cookie = get_cookie('data_form_paciente');
          /*  echo '<pre> xx';
            print_r(unserialize($cookie));
            echo '</pre>';
            */
            ////

            //$this->model->inserir($data_paciente, 'tb_paciente');
            //echo "KSANFLAKSNFKASNFNLKASNFKLASNFLKANSFLKNASFKLNSALKNFLKNASFLKNA".$this->db->insert_id();


            redirect('paciente_habito_alimentar');

            /* Chama a função inserir do modelo */
        }

        function editar($codigo_paciente) {

            /* Aqui vamos definir o título da página de edição */
            $data_paciente['titulo'] = "CIAF | Paciente";

            /* Busca os dados da paciente que será editada */
            $data_paciente['dados_paciente'] = $this->model->editar($codigo_paciente);

            /* Carrega a página de edição com os dados da paciente */
            $this->load->view('paciente_insert_edit', $data_paciente);
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
                    redirect('paciente_insert');
                } else {
                    log_message('error', 'Erro ao atualizar a paciente.');
                }
            }
        }

        function deletar($codigo_paciente) {

            /* Executa a função deletar do modelo passando como parâmetro o id da paciente */
            if ($this->model->deletar($codigo_paciente)) {
                redirect('paciente_insert');
            } else {
                log_message('error', 'Erro ao deletar a paciente.');
            }
        }

    }

}
