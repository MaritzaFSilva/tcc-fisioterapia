<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class habito_alimentar extends CI_Controller {
 
	function __construct() {
	    parent::__construct();  
	    /* Carrega o modelo */
	    $this->load->model('habito_alimentar_model', 'model', TRUE);
	}
 
    function index() 
    {
        $this->load->helper('form');
        $data['titulo'] = "Cadastro de habito_alimentar";
        $data["habito_alimentar"] = $this->model->listar();
        $this->load->view('habito_alimentar_view.php', $data);
    }

    function inserir() {
 
		/* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
		$this->load->library('form_validation');
	 
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Define as regras para validação */
		$this->form_validation->set_rules('descricao', 'descricao', 'required|max_length[45]');
	 
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
				redirect('habito_alimentar');
			} else {
				log_message('error', 'Erro ao inserir a habito_alimentar.');
			}
		}
	}
	function editar($codigo_habito_alimentar)  {
			
		/* Aqui vamos definir o título da página de edição */
		$data['titulo'] = "CRUD com CodeIgniter | Editar habito_alimentar";
	 
		/* Busca os dados da habito_alimentar que será editada */
		$data['dados_habito_alimentar'] = $this->model->editar($codigo_habito_alimentar);
	 
	 	/* Carrega a página de edição com os dados da habito_alimentar */
		$this->load->view('habito_alimentar_edit', $data);
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
				'rules' => 'trim|required|max_length[45]'
			)
		);
		$this->form_validation->set_rules($validations);
		
		/* Executa a validação e caso houver erro chama a função editar do controlador novamente */
		if ($this->form_validation->run() === FALSE) {
	            $this->editar($this->input->post('codigo_habito_alimentar'));
		} else {
			/* Senão obtém os dados do formulário */
			$data['codigo_habito_alimentar'] = $this->input->post('codigo_habito_alimentar');
			$data['descricao'] = strtoupper($this->input->post('descricao'));
	 
			/* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
			if ($this->model->atualizar($data)) {
				redirect('habito_alimentar');
			} else {
				log_message('error', 'Erro ao atualizar a habito_alimentar.');
			}
		}
	}
	 
	function deletar($codigo_habito_alimentar) {
	 
		/* Executa a função deletar do modelo passando como parâmetro o id da habito_alimentar */
		if ($this->model->deletar($codigo_habito_alimentar)) {
			redirect('habito_alimentar');
		} else {
			log_message('error', 'Erro ao deletar a habito_alimentar.');
		}
	}
}