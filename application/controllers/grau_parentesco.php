<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class grau_parentesco extends CI_Controller {
 
	function __construct() {
	    parent::__construct();  
	    /* Carrega o modelo */
	    $this->load->model('grau_parentesco_model', 'model', TRUE);
	}
 
    function index() 
    {
        $this->load->helper('form');
        $data['titulo'] = "CIAF | Grau de Parentesco";
        $data["grau_parentesco"] = $this->model->listar();
        $this->load->view('grau_parentesco_view.php', $data);
    }

    function inserir() {
 
		/* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
		$this->load->library('form_validation');
	 
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Define as regras para validação */
		$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[40]');
	 
		/* Executa a validação e caso houver erro chama a função index do controlador */
		if ($this->form_validation->run() === FALSE) {
			$this->index();
		/* Senão, caso sucesso: */	
		} else {
			/* Recebe os dados do formulário (visão) */
			$data['nome'] = $this->input->post('nome');
	 
	 		/* Carrega o modelo */
			
	 
			/* Chama a função inserir do modelo */
			if ($this->model->inserir($data)) {
				redirect('grau_parentesco');
			} else {
				log_message('error', 'Erro ao inserir a grau.');
			}
		}
	}
	function editar($codigo_grau_parentesco)  {
			
		/* Aqui vamos definir o título da página de edição */
		$data['titulo'] = "CIAF | Editar Grau de Parentesco";
	 
		/* Busca os dados da grau que será editada */
		$data['dados_grau'] = $this->model->editar($codigo_grau_parentesco);
	 
	 	/* Carrega a página de edição com os dados da grau */
		$this->load->view('grau_parentesco_edit', $data);
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
				'rules' => 'trim|required|max_length[40]'
			)
		);
		$this->form_validation->set_rules($validations);
		
		/* Executa a validação e caso houver erro chama a função editar do controlador novamente */
		if ($this->form_validation->run() === FALSE) {
	            $this->editar($this->input->post('codigo_grau_parentesco'));
		} else {
			/* Senão obtém os dados do formulário */
			$data['codigo_grau_parentesco'] = $this->input->post('codigo_grau_parentesco');
			$data['nome'] = ucwords($this->input->post('nome'));
	 
			/* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
			if ($this->model->atualizar($data)) {
				redirect('grau_parentesco');
			} else {
				log_message('error', 'Erro ao atualizar a grau.');
			}
		}
	}
	 
	function deletar($codigo_grau_parentesco) {
	 
		/* Executa a função deletar do modelo passando como parâmetro o id da grau */
		if ($this->model->deletar($codigo_grau_parentesco)) {
			redirect('grau_parentesco');
		} else {
			log_message('error', 'Erro ao deletar a grau.');
		}
	}
}