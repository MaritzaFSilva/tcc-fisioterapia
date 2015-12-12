<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class grau_escolaridade extends CI_Controller {
 
	function __construct() {
	    parent::__construct();  
	    /* Carrega o modelo */
	    $this->load->model('grau_escolaridade_model', 'model', TRUE);
	}
 
    function index() 
    {
        $this->load->helper('form');
        $data['titulo'] = "CIAF | Grau de escolaridade";
        $data["grau_escolaridade"] = $this->model->listar();
        $this->load->view('grau_escolaridade_view.php', $data);
    }

    function inserir() {
 
		/* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
		$this->load->library('form_validation');
	 
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Define as regras para validação */
		$this->form_validation->set_rules('descricao', 'descricao', 'required|max_length[40]');
	 
		/* Executa a validação e caso houver erro chama a função index do controlador */
		if ($this->form_validation->run() === FALSE) {
			$this->index();
		/* Senão, caso sucesso: */	
		} else {
			/* Recebe os dados do formulário (visão) */
			$data['descricao'] = $this->input->post('descricao');
	 
	 		/* Carrega o modelo */
			
	 
			/* Chama a função inserir do modelo */
			if ($this->model->inserir($data)) {
				redirect('grau_escolaridade');
			} else {
				log_message('error', 'Erro ao inserir a grau.');
			}
		}
	}
	function editar($codigo_grau_escolaridade)  {
			
		/* Aqui vamos definir o título da página de edição */
		$data['titulo'] = "CIAF | Editar Grau de escolaridade";
	 
		/* Busca os dados da grau que será editada */
		$data['dados_grau'] = $this->model->editar($codigo_grau_escolaridade);
	 
	 	/* Carrega a página de edição com os dados da grau */
		$this->load->view('grau_escolaridade_edit', $data);
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
				'field' => 'descricao',
				'label' => 'descricao',
				'rules' => 'trim|required|max_length[40]'
			)
		);
		$this->form_validation->set_rules($validations);
		
		/* Executa a validação e caso houver erro chama a função editar do controlador novamente */
		if ($this->form_validation->run() === FALSE) {
	            $this->editar($this->input->post('codigo_grau_escolaridade'));
		} else {
			/* Senão obtém os dados do formulário */
			$data['codigo_grau_escolaridade'] = $this->input->post('codigo_grau_escolaridade');
			$data['descricao'] = ucwords($this->input->post('descricao'));
	 
			/* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
			if ($this->model->atualizar($data)) {
				redirect('grau_escolaridade');
			} else {
				log_message('error', 'Erro ao atualizar a grau.');
			}
		}
	}
	 
	function deletar($codigo_grau_escolaridade) {
	 
		/* Executa a função deletar do modelo passando como parâmetro o id da grau */
		if ($this->model->deletar($codigo_grau_escolaridade)) {
			redirect('grau_escolaridade');
		} else {
			log_message('error', 'Erro ao deletar a grau.');
		}
	}
}