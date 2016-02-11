<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class doenca extends CI_Controller {
 
	function __construct() {
	    parent::__construct();  
	    /* Carrega o modelo */
	    $this->load->model('doenca_model', 'model', TRUE);
	}
 
    function index() 
    {
        $this->load->helper('form');
        $data['titulo'] = "CIAF | Doenças";
        $data["doenca"] = $this->model->listar();
        $this->load->view('doenca_view.php', $data);
    }

    function inserir() {
 
		/* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
		$this->load->library('form_validation');
	 
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Define as regras para validação */
		$this->form_validation->set_rules('nome_doenca', 'Nome', 'required|max_length[100]');
		$this->form_validation->set_rules('orientacao', 'Orientação', 'trim|required|max_length[100]');
		$this->form_validation->set_rules('observacao', 'Observação', 'trim|required|max_length[255]');
	 
		/* Executa a validação e caso houver erro chama a função index do controlador */
		if ($this->form_validation->run() === FALSE) {
			$this->index();
		/* Senão, caso sucesso: */	
		} else {
			/* Recebe os dados do formulário (visão) */
			$data['nome_doenca'] = strtoupper($this->input->post('nome_doenca'));
			$data['orientacao'] = strtoupper($this->input->post('orientacao'));
			$data['observacao'] = $this->input->post('observacao');
	 
	 		/* Carrega o modelo */
			
	 
			/* Chama a função inserir do modelo */
			if ($this->model->inserir($data)) {
				redirect('doenca');
			} else {
				log_message('error', 'Erro ao inserir Doença.');
			}
		}
	}
	function editar($codigo_doenca)  {
			
		/* Aqui vamos definir o título da página de edição */
		$data['titulo'] = "CIAF | Editar Doenças";
	 
		/* Busca os dados da doenca que será editada */
		$data['dados_doenca'] = $this->model->editar($codigo_doenca);
	 
	 	/* Carrega a página de edição com os dados da doenca */
		$this->load->view('doenca_edit', $data);
	}
	 
	function atualizar() {
	 
		/* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
		$this->load->library('form_validation');
	 
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Aqui estou definindo as regras de validação do formulário, assim como 
		   na função inserir do controlador, porém estou mudando a forma de escrita */
		$validations = array(
			array(
				'field' => 'nome_doenca',
				'label' => 'Nome',
				'rules' => 'trim|required|max_length[100]'
			),
			array(
				'field' => 'orientacao',
				'label' => 'Orientação',
				'rules' => 'trim|required|max_length[100]'
			),
			array(
				'field' => 'observacao',
				'label' => 'Observação',
				'rules' => 'trim|required|max_length[255]'
			)
		);
		$this->form_validation->set_rules($validations);
		
		/* Executa a validação e caso houver erro chama a função editar do controlador novamente */
		if ($this->form_validation->run() === FALSE) {
	            $this->editar($this->input->post('codigo_doenca'));
		} else {
			/* Senão obtém os dados do formulário */
			$data['codigo_doenca'] = $this->input->post('codigo_doenca');
			$data['nome_doenca'] = strtoupper($this->input->post('nome_doenca'));
			$data['orientacao'] = strtoupper($this->input->post('orientacao'));
			$data['observacao'] = $this->input->post('observacao');
	 
			/* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
			if ($this->model->atualizar($data)) {
				redirect('doenca');
			} else {
				log_message('error', 'Erro ao atualizar Doença.');
			}
		}
	}
	 
	function deletar($codigo_doenca) {
	 
		/* Executa a função deletar do modelo passando como parâmetro o id da doenca */
		if ($this->model->deletar($codigo_doenca)) {
			redirect('doenca');
		} else {
			log_message('error', 'Erro ao deletar Doença.');
		}
	}
}