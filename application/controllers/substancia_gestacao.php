<?php
 
defined('BASEPATH') OR exit('No direct script access allowed');
 
class substancia_gestacao extends CI_Controller {
 
	function __construct() {
	    parent::__construct();  
	    /* Carrega o modelo */
	    $this->load->model('substancia_gestacao_model', 'model', TRUE);
	}
 
    function index() 
    {
        $this->load->helper('form');
        $data['titulo'] = "CIAF | Editar Substâncias da Gestação";
        $data["substancia_gestacao"] = $this->model->listar();
        $this->load->view('substancia_gestacao_view.php', $data);
    }

    function inserir() {
 
		/* Carrega a biblioteca do CodeIgniter responsável pela validação dos formulários */
		$this->load->library('form_validation');
	 
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Define as regras para validação */
		$this->form_validation->set_rules('nome_substancia', 'Nome', 'required|max_length[40]');
	 
		/* Executa a validação e caso houver erro chama a função index do controlador */
		if ($this->form_validation->run() === FALSE) {
			$this->index();
		/* Senão, caso sucesso: */	
		} else {
			/* Recebe os dados do formulário (visão) */
			$data['nome_substancia'] = $this->input->post('nome_substancia');
	 
	 		/* Carrega o modelo */
			
	 
			/* Chama a função inserir do modelo */
			if ($this->model->inserir($data)) {
				redirect('substancia_gestacao');
			} else {
				log_message('error', 'Erro ao inserir Substância.');
			}
		}
	}
	function editar($codigo_substancia)  {
			
		/* Aqui vamos definir o título da página de edição */
		$data['titulo'] = "CIAF | Editar Substância";
	 
		/* Busca os dados da substancia que será editada */
		$data['dados_substancia'] = $this->model->editar($codigo_substancia);
	 
	 	/* Carrega a página de edição com os dados da substancia */
		$this->load->view('substancia_gestacao_edit', $data);
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
				'field' => 'nome_substancia',
				'label' => 'Nome',
				'rules' => 'trim|required|max_length[40]'
			)
		);
		$this->form_validation->set_rules($validations);
		
		/* Executa a validação e caso houver erro chama a função editar do controlador novamente */
		if ($this->form_validation->run() === FALSE) {
	            $this->editar($this->input->post('codigo_substancia'));
		} else {
			/* Senão obtém os dados do formulário */
			$data['codigo_substancia'] = $this->input->post('codigo_substancia');
			$data['nome_substancia'] = ucwords($this->input->post('nome_substancia'));
	 
			/* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
			if ($this->model->atualizar($data)) {
				redirect('substancia_gestacao');
			} else {
				log_message('error', 'Erro ao atualizar Substância.');
			}
		}
	}
	 
	function deletar($codigo_substancia) {
	 
		/* Executa a função deletar do modelo passando como parâmetro o id da substancia */
		if ($this->model->deletar($codigo_substancia)) {
			redirect('substancia_gestacao');
		} else {
			log_message('error', 'Erro ao deletar Substância.');
		}
	}
}