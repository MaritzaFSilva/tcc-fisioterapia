<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class paciente extends CI_Controller {
 
	function __construct() {
	    parent::__construct();  
	    /* Carrega o modelo */
	    $this->load->model('paciente_model', 'model', TRUE);
	}
 
    function index() 
    {
        $this->load->helper('form');
        $data['titulo'] = "CIAF | Responsável";
        $data["paciente"] = $this->model->listar();
        $this->load->view('paciente_view.php', $data);
    }

    function inserir() {
 
		/* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
		$this->load->library('form_validation');
	 
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Define as regras para validação */
		$this->form_validation->set_rules('nome_paciente', 'Nome', 'required|max_length[100]');
		$this->form_validation->set_rules('cpf_paciente', 'CPF', 'trim|required|max_length[100]');
	 
		/* Executa a validação e caso houver erro chama a função index do controlador */
		if ($this->form_validation->run() === FALSE) {
			$this->index();
		/* Senão, caso sucesso: */	
		} else {
			/* Recebe os dados do formulário (visão) */
			$data['nome_paciente'] = strtoupper($this->input->post('nome_paciente'));
			$data['cpf_paciente'] = strtoupper($this->input->post('cpf_paciente'));
	 
	 		/* Carrega o modelo */
			
	 
			/* Chama a função inserir do modelo */
			if ($this->model->inserir($data)) {
				redirect('paciente');
			} else {
				log_message('error', 'Erro ao inserir a paciente.');
			}
		}
	}
	function editar($codigo_paciente)  {
			
		/* Aqui vamos definir o título da página de edição */
		$data['titulo'] = "CIAF | Editar Doenças";
	 
		/* Busca os dados da paciente que será editada */
		$data['dados_paciente'] = $this->model->editar($codigo_paciente);
	 
	 	/* Carrega a página de edição com os dados da paciente */
		$this->load->view('paciente_edit', $data);
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
				'field' => 'nome_paciente',
				'label' => 'Nome',
				'rules' => 'trim|required|max_length[100]'
			),
			array(
				'field' => 'cpf_paciente',
				'label' => 'CPF',
				'rules' => 'trim|required|max_length[100]'
			)
		);
		$this->form_validation->set_rules($validations);
		
		/* Executa a validação e caso houver erro chama a função editar do controlador novamente */
		if ($this->form_validation->run() === FALSE) {
	            $this->editar($this->input->post('codigo_paciente'));
		} else {
			/* Senão obtém os dados do formulário */
			$data['codigo_paciente'] = $this->input->post('codigo_paciente');
			$data['nome_paciente'] = strtoupper($this->input->post('nome_paciente'));
			$data['cpf_paciente'] = strtoupper($this->input->post('cpf_paciente'));
	 
			/* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
			if ($this->model->atualizar($data)) {
				redirect('paciente');
			} else {
				log_message('error', 'Erro ao atualizar a paciente.');
			}
		}
	}
	 
	function deletar($codigo_paciente) {
	 
		/* Executa a função deletar do modelo passando como parâmetro o id da paciente */
		if ($this->model->deletar($codigo_paciente)) {
			redirect('paciente');
		} else {
			log_message('error', 'Erro ao deletar a paciente.');
		}
	}
}