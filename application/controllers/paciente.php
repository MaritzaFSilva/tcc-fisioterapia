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
        $data_paciente['titulo'] = "CIAF | Paciente";
        $data_paciente["paciente"] = $this->model->listar();
        $this->load->view('paciente_view.php', $data_paciente);
    }

    function inserir() {
 
		/* Carrega a biblioteca do CodeIgniter Paciente pela validação dos formulários */
		$this->load->library('form_validation');
	 
		/* Define as tags onde a mensagem de erro será exibida na página */
		$this->form_validation->set_error_delimiters('<span>', '</span>');
	 
		/* Define as regras para validação */
		$this->form_validation->set_rules('nome_paciente', 'Nome', 'required|max_length[100]');
		

		/* Executa a validação e caso houver erro chama a função index do controlador */
		if ($this->form_validation->run() === FALSE) {
			$this->index();
		/* Senão, caso sucesso: */	
		} else {
			/* Recebe os dados do formulário (visão) */
			$data_paciente['nome_paciente'] = strtoupper($this->input->post('nome_paciente'));
			
			if($this->input->post('sexo_feminino') == "feminino") {
				$data_paciente['sexo'] = strtoupper($this->input->post('sexo_feminino'));
			}
			else {
				$data_paciente['sexo'] = $data_paciente['codigo_paciente'];
			}
			$this->model->inserir($data_paciente, 'tb_paciente');
			/* Recebe os dados do formulário (visão) */
			$data_auxilio['codigo_auxilio_social'] = 1;
			
			$data_auxilio['codigo_paciente'] = codigoPaciente('MARITZA SILVA');
			$data_auxilio['data_inicio_auxilio'] = $this->input->post('data_inicio_auxilio');
			$data_auxilio['data_termino_auxilio'] = $this->input->post('data_termino_auxilio');
			$data_auxilio['data_cadastro_auxilio'] = $this->input->post('data_cadastro_auxilio');
			
			$data_auxilio['valor'] =  strtoupper($this->input->post('valor'));
			$data_auxilio['observacao_auxilio'] =  strtoupper($this->input->post('observacao_auxilio'));
			
	 		$this->model->inserirAux($data_auxilio,'tb_paciente_auxilio_social');
			
				redirect('paciente');
			
			/* Chama a função inserir do modelo */
			

	}
	function editar($codigo_paciente)  {
			
		/* Aqui vamos definir o título da página de edição */
		$data_paciente['titulo'] = "CIAF | Paciente";
	 
		/* Busca os dados da paciente que será editada */
		$data_paciente['dados_paciente'] = $this->model->editar($codigo_paciente);
	 
	 	/* Carrega a página de edição com os dados da paciente */
		$this->load->view('paciente_edit', $data_paciente);
	}
	 
	function atualizar() {
	 
		/* Carrega a biblioteca do CodeIgniter Paciente pela validação dos formulários */
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
			
		);
		$this->form_validation->set_rules($validations);
		
		/* Executa a validação e caso houver erro chama a função editar do controlador novamente */
		if ($this->form_validation->run() === FALSE) {
	            $this->editar($this->input->post('codigo_paciente'));
		} else {
			/* Senão obtém os dados do formulário */
			$data_paciente['codigo_paciente'] = $this->input->post('codigo_paciente');
			$data_paciente['nome_paciente'] = strtoupper($this->input->post('nome_paciente'));
			
	 
			/* Executa a função atualizar do modelo passando como parâmetro os dados obtidos do formulário */
			if ($this->model->atualizar($data_paciente)) {
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

	function codigoPaciente($nome){
		$conexao = mysql_connect("localhost", "fisioterapia", "12345"); 
		mysql_select_db("fisioterapia");


		$cont = 0; // contador de controle do laço
		$query = "SELECT codigo_paciente FROM tb_paciente WHERE nome_paciente = ".$nome."";
		$consulta = mysql_query($query) or die(mysql_error()); // Executa a query no banco

		return $valores;
		mysql_close($con);

	}
	
	function codigoAuxilioSocial($nome){
		$conexao = mysql_connect("localhost", "fisioterapia", "12345"); 
		mysql_select_db("fisioterapia");
		$cont = 0; // contador de controle do laço
		$query = "SELECT codigo_auxilio_social FROM tb_auxilio_social WHERE nome_auxilio_social = ".$nome."";
		$consulta = mysql_query($query) or die(mysql_error()); // Executa a query no banco
		echo "window.alert(oi)";
		return $valores;
		mysql_close($con);

	}

	}
}