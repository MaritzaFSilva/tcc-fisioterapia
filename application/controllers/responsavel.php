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
        $data['titulo'] = "CIAF | Responsável";
        $data["responsavel"] = $this->model->listar();
        $this->load->view('responsavel_view.php', $data);
    }

    function inserir() {
 
		/* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
		$this->load->library('form_validation');
	 
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Define as regras para validação */
		$this->form_validation->set_rules('nome_responsavel', 'Nome', 'required|max_length[100]');
		$this->form_validation->set_rules('cpf_responsavel', 'CPF', 'trim|required|max_length[100]');
	 
		/* Executa a validação e caso houver erro chama a função index do controlador */
		if ($this->form_validation->run() === FALSE) {
			$this->index();
		/* Senão, caso sucesso: */	
		} else {
			/* Recebe os dados do formulário (visão) */
			$data['nome_responsavel'] = strtoupper($this->input->post('nome_responsavel'));
			$data['cpf_responsavel'] = strtoupper($this->input->post('cpf_responsavel'));
	 
	 		/* Carrega o modelo */
			
	 
			/* Chama a função inserir do modelo */
			if ($this->model->inserir($data)) {
				redirect('responsavel');
			} else {
				log_message('error', 'Erro ao inserir a responsavel.');
			}
		}
	}
	function editar($codigo_responsavel)  {
			
		/* Aqui vamos definir o título da página de edição */
		$data['titulo'] = "CIAF | Editar Doenças";
	 
		/* Busca os dados da responsavel que será editada */
		$data['dados_responsavel'] = $this->model->editar($codigo_responsavel);
	 
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
				'field' => 'nome_responsavel',
				'label' => 'Nome',
				'rules' => 'trim|required|max_length[100]'
			),
			array(
				'field' => 'cpf_responsavel',
				'label' => 'CPF',
				'rules' => 'trim|required|max_length[100]'
			)
		);
		$this->form_validation->set_rules($validations);
		
		/* Executa a validação e caso houver erro chama a função editar do controlador novamente */
		if ($this->form_validation->run() === FALSE) {
	            $this->editar($this->input->post('codigo_responsavel'));
		} else {
			/* Senão obtém os dados do formulário */
			$data['codigo_responsavel'] = $this->input->post('codigo_responsavel');
			$data['nome_responsavel'] = strtoupper($this->input->post('nome_responsavel'));
			$data['cpf_responsavel'] = strtoupper($this->input->post('cpf_responsavel'));
	 
			/* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
			if ($this->model->atualizar($data)) {
				redirect('responsavel');
			} else {
				log_message('error', 'Erro ao atualizar a responsavel.');
			}
		}
	}
	 
	function deletar($codigo_responsavel) {
	 
		/* Executa a função deletar do modelo passando como parâmetro o id da responsavel */
		if ($this->model->deletar($codigo_responsavel)) {
			redirect('responsavel');
		} else {
			log_message('error', 'Erro ao deletar a responsavel.');
		}
	}
}