<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class responsavel extends CI_Controller {
 
	function __construct() {
	    parent::__construct();  
	    /* Carrega o modelo */
	    $this->load->model('responsavel_model', 'model', TRUE);
	}
 
    function index() 
    {
        $this->load->helper('form');
        $data['titulo'] = "CIAF | Doenças";
        $data["responsavel"] = $this->model->listar();
        $this->load->view('responsavel_view.php', $data);
    }

    function inserir() {
 
		/* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
		$this->load->library('form_validation');
	 
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Define as regras para validação */
		$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[100]');
		$this->form_validation->set_rules('sexo', 'Sexo', 'max_length[45]');//$this->form_validation->set_rules('sexo', 'Sexo', 'required|max_length[45]');
		$this->form_validation->set_rules('email', 'E-Mail', 'max_length[100]');
		$this->form_validation->set_rules('rua', 'Rua', 'max_length[100]');
		$this->form_validation->set_rules('numero', 'Numero', 'max_length[11]');
		$this->form_validation->set_rules('complemento', 'Complemento', 'max_length[255]');
		$this->form_validation->set_rules('bairro', 'Bairro', 'max_length[45]');
		$this->form_validation->set_rules('cep', 'CEP', 'max_length[10]');
		$this->form_validation->set_rules('ativo', 'Ativo', 'max_length[10]');

	 
		/* Executa a validação e caso houver erro chama a função index do controlador */
		if ($this->form_validation->run() === FALSE) {
			$this->index();
		/* Senão, caso sucesso: */	
		} else {
			/* Recebe os dados do formulário (visão) */
			$data['nome'] = strtoupper($this->input->post('nome'));
			$data['sexo'] = strtoupper($this->input->post('nome'));
			$data['email'] = strtoupper($this->input->post('nome'));
			$data['rua'] = strtoupper($this->input->post('nome'));
			$data['numero'] = strtoupper($this->input->post('nome'));
			$data['complemento'] = strtoupper($this->input->post('nome'));
			$data['bairro'] = strtoupper($this->input->post('nome'));
			$data['cep'] = strtoupper($this->input->post('nome'));
			$data['ativo'] = strtoupper($this->input->post('nome'));
	 
	 		/* Carrega o modelo */
			
	 
			/* Chama a função inserir do modelo */
			if ($this->model->inserir($data)) {
				redirect('responsavel');
			} else {
				log_message('error', 'Erro ao inserir a responsavel.');
			}
		}
	}
	function editar($cpf_responsavel)  {
			
		/* Aqui vamos definir o título da página de edição */
		$data['titulo'] = "CIAF | Editar Doenças";
	 
		/* Busca os dados da responsavel que será editada */
		$data['dados_responsavel'] = $this->model->editar($cpf_responsavel);
	 
	 	/* Carrega a página de edição com os dados da responsavel */
		$this->load->view('responsavel_edit', $data);
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
				'field' => 'nome',
				'label' => 'Nome',
				'rules' => 'trim|required|max_length[100]'
			),
			array(
				'field' => 'sexo',
				'label' => 'Sexo',
				'rules' => 'trim|required|max_length[45]'
			),
			array(
				'field' => 'email',
				'label' => 'E-Mail',
				'rules' => 'trim|required|max_length[100]'
			),
			array(
				'field' => 'rua',
				'label' => 'Rua',
				'rules' => 'trim|required|max_length[100]'
			),
			array(
				'field' => 'numero',
				'label' => 'Numero',
				'rules' => 'trim|required|max_length[11]'
			),
			array(
				'field' => 'complemento',
				'label' => 'Complemento',
				'rules' => 'trim|required|max_length[255]'
			),
			array(
				'field' => 'bairro',
				'label' => 'Bairro',
				'rules' => 'trim|required|max_length[45]'
			),
			array(
				'field' => 'cep',
				'label' => 'CEP',
				'rules' => 'trim|required|max_length[10]'
			),
			array(
				'field' => 'ativo',
				'label' => 'Ativo',
				'rules' => 'trim|required|max_length[10]'
			),
			
		);
		$this->form_validation->set_rules($validations);
		
		/* Executa a validação e caso houver erro chama a função editar do controlador novamente */
		if ($this->form_validation->run() === FALSE) {
	            $this->editar($this->input->post('cpf_responsavel'));
		} else {
			/* Senão obtém os dados do formulário */
			$data['cpf_responsavel'] = $this->input->post('cpf_responsavel');
			$data['nome'] = strtoupper($this->input->post('nome'));
			$data['sexo'] = strtoupper($this->input->post('nome'));
			$data['email'] = strtoupper($this->input->post('nome'));
			$data['rua'] = strtoupper($this->input->post('nome'));
			$data['numero'] = strtoupper($this->input->post('nome'));
			$data['complemento'] = strtoupper($this->input->post('nome'));
			$data['bairro'] = strtoupper($this->input->post('nome'));
			$data['cep'] = strtoupper($this->input->post('nome'));
			$data['ativo'] = strtoupper($this->input->post('nome'));
	 
			/* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
			if ($this->model->atualizar($data)) {
				redirect('responsavel');
			} else {
				log_message('error', 'Erro ao atualizar a responsavel.');
			}
		}
	}
	 
	function deletar($cpf_responsavel) {
	 
		/* Executa a função deletar do modelo passando como parâmetro o id da responsavel */
		if ($this->model->deletar($cpf_responsavel)) {
			redirect('responsavel');
		} else {
			log_message('error', 'Erro ao deletar a responsavel.');
		}
	}
}