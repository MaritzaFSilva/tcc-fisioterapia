<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class renda_familiar extends CI_Controller {
 
	function __construct() {
	    parent::__construct();  
	    /* Carrega o modelo */
	    $this->load->model('renda_familiar_model', 'model', TRUE);
	}
 
    function index() 
    {
        $this->load->helper('form');
        $data['titulo'] = "CIAF | Renda";
        $data["renda_familiar"] = $this->model->listar();
        $this->load->view('renda_familiar_view.php', $data);
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
			$data['descricao'] = strtoupper($this->input->post('descricao'));
	 
	 		/* Carrega o modelo */
			
	 
			/* Chama a função inserir do modelo */
			if ($this->model->inserir($data)) {
				redirect('renda_familiar');
			} else {
				log_message('error', 'Erro ao inserir a renda.');
			}
		}
	}
	function editar($codigo_renda_familiar)  {
			
		/* Aqui vamos definir o título da página de edição */
		$data['titulo'] = "CIAF | Editar Renda Familiar";
	 
		/* Busca os dados da renda que será editada */
		$data['dados_renda'] = $this->model->editar($codigo_renda_familiar);
	 
	 	/* Carrega a página de edição com os dados da renda */
		$this->load->view('renda_familiar_edit', $data);
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
	            $this->editar($this->input->post('codigo_renda_familiar'));
		} else {
			/* Senão obtém os dados do formulário */
			$data['codigo_renda_familiar'] = $this->input->post('codigo_renda_familiar');
			$data['descricao'] = strtoupper($this->input->post('descricao'));
	 
			/* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
			if ($this->model->atualizar($data)) {
				redirect('renda_familiar');
			} else {
				log_message('error', 'Erro ao atualizar a renda.');
			}
		}
	}
	 
	function deletar($codigo_renda_familiar) {
	 
		/* Executa a função deletar do modelo passando como parâmetro o id da renda */
		if ($this->model->deletar($codigo_renda_familiar)) {
			redirect('renda_familiar');
		} else {
			log_message('error', 'Erro ao deletar a renda.');
		}
	}
}