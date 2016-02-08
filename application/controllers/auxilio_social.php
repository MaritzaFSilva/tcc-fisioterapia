<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class auxilio_social extends CI_Controller {
 
	function __construct() {
	    parent::__construct();  
	    /* Carrega o modelo */
	    $this->load->model('auxilio_social_model', 'model', TRUE);
	}
 
    function index() 
    {
        $this->load->helper('form');
        $data['titulo'] = "CIAF | Editar Auxílio Social";
        $data["auxilio_social"] = $this->model->listar();
        $this->load->view('auxilio_social_view.php', $data);

    }

    function inserir() {
 
		/* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
		$this->load->library('form_validation');
	 
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Define as regras para validação */
		$this->form_validation->set_rules('nome', 'Nome', 'required|max_length[100]');
		$this->form_validation->set_rules('origem', 'Origem', 'trim|required|max_length[45]');
	 
		/* Executa a validação e caso houver erro chama a função index do controlador */
		if ($this->form_validation->run() === FALSE) {
			$this->index();
		/* Senão, caso sucesso: */	
		} else {
			/* Recebe os dados do formulário (visão) */
			$data['nome'] = strtoupper($this->input->post('nome'));
			$data['origem'] = strtoupper($this->input->post('origem'));
	 
	 		/* Carrega o modelo */
			
	 
			/* Chama a função inserir do modelo */
			if ($this->model->inserir($data)) {
				redirect('auxilio_social');
			} else {
				log_message('error', 'Erro ao inserir a auxilio_social.');
			}
		}
	}
	function editar($codigo_auxilio_social)  {
			
		/* Aqui vamos definir o título da página de edição */
		$data['titulo'] = "CIAF | Editar Auxílio Social";
	 
		/* Busca os dados da auxilio_social que será editada */
		$data['dados_auxilio_social'] = $this->model->editar($codigo_auxilio_social);
	 
	 	/* Carrega a página de edição com os dados da auxilio_social */
		$this->load->view('auxilio_social_edit', $data);
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
				'field' => 'origem',
				'label' => 'Origem',
				'rules' => 'trim|required|max_length[45]'
			)
		);
		$this->form_validation->set_rules($validations);
		
		/* Executa a validação e caso houver erro chama a função editar do controlador novamente */
		if ($this->form_validation->run() === FALSE) {
	            $this->editar($this->input->post('codigo_auxilio_social'));
		} else {
			/* Senão obtém os dados do formulário */
			$data['codigo_auxilio_social'] = $this->input->post('codigo_auxilio_social');
			$data['nome'] = strtoupper($this->input->post('nome'));
			$data['origem'] = strtoupper($this->input->post('origem'));
	 
			/* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
			if ($this->model->atualizar($data)) {
				redirect('auxilio_social');
			} else {
				log_message('error', 'Erro ao atualizar a auxilio_social.');
			}
		}
	}
	 
	function deletar($codigo_auxilio_social) {
	 
		/* Executa a função deletar do modelo passando como parâmetro o id da auxilio_social */
		if ($this->model->deletar($codigo_auxilio_social)) {
			redirect('auxilio_social');
		} else {
			log_message('error', 'Erro ao deletar a auxilio_social.');
		}
	}
}