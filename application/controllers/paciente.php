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
			/*----------------------------------------INICIO DADOS PACIENTE--------------------------------*/
			/* Recebe os dados do formulário (visão) */
			$data_paciente['nome_paciente'] = strtoupper($this->input->post('nome_paciente'));
			$data_paciente['iniciais_nome_paciente'] = strtoupper($this->input->post('iniciais_nome_paciente'));
			if($this->input->post('sexo_feminino') == "feminino") {
				$data_paciente['sexo'] = strtoupper($this->input->post('sexo_feminino'));
			}
			else {
				$data_paciente['sexo'] = $this->input->post('sexo_masculino');
			}
			$codigoResponsavel = $this->model->pegando_codigo('codigo_responsavel','tb_responsavel','nome_responsavel',$this->input->post('combo_responsavel'));
			$data_paciente['codigo_responsavel'] = $codigoResponsavel[0];
			$data_paciente['nome_mae'] = strtoupper($this->input->post('nome_mae'));
			$data_paciente['data_nascimento'] = strtoupper($this->input->post('data_nascimento'));
			$codigoCidadeNatal = $this->model->pegando_codigo('codigo_cidade','tb_cidade','nome_cidade',$this->input->post('combo_cidade_natal'));
			$data_paciente['codigo_cidade_natal'] = $codigoCidadeNatal[0];
			$codigoRenda = $this->model->pegando_codigo('codigo_renda_familiar','tb_renda_familiar','descricao',$this->input->post('combo_renda'));
			$data_paciente['codigo_renda'] = $codigoRenda[0];

			if($this->input->post('passou_pela_uti') == "sim") {
				$data_paciente['passou_pela_uti'] = 1;
			}
			else {
				$data_paciente['passou_pela_uti'] = 2;
			}
			$data_responsavel['pq_passou_pela_uti'] = strtoupper($this->input->post('pq_passou_pela_uti'));

			$this->model->inserir($data_paciente, 'tb_paciente');
			/* Recebe os dados do formulário (visão) */
			/*-----------------------------------------------------------------------------------------------*/
			/*---------------------------------------------INICIO HABITOS------------------------------------*/
			$codigoHabito = $this->model->pegando_codigo('codigo_habito_alimentar','tb_habito_alimentar','descricao',$this->input->post('combo_habito'));
			if($codigoHabito != NULL){
				$data_habito['codigo_habito_alimentar'] = $codigoHabito[0];
				$codigoPaciente = $this->model->codigodoPaciente($this->input->post('nome_paciente'));
				$data_habito['codigo_paciente'] = $codigoPaciente[0];
				$data_habito['frequencia_semanal_habito'] = $this->input->post('frequencia_habito');
				$data_habito['data_cadastro_habito'] = $this->input->post('data_cadastro_habito');
				$data_habito['observacao_habito'] =  strtoupper($this->input->post('observacao_habito'));
				
		 		$this->model->inserirAux($data_habito,'tb_paciente_habito_alimentar_mae');
		 	}else{
		 		echo "nulo";
		 	}
	 		/*-----------------------------------------------------------------------------------------------*/
	 		/*---------------------------------------------INICIO SUBSTANCIAS--------------------------------*/
			$codigoSubstancia = $this->model->pegando_codigo('codigo_substancia','tb_substancia_gestacao','nome_substancia',$this->input->post('combo_substancia'));
			if($codigoSubstancia != NULL){
				$data_substancia['codigo_substancia'] = $codigoSubstancia[0];
				$codigoPaciente = $this->model->codigodoPaciente($this->input->post('nome_paciente'));
				$data_substancia['codigo_paciente'] = $codigoPaciente[0];
				$data_substancia['frequencia_semanal_substancia'] = $this->input->post('frequencia_substancia');
				$data_substancia['data_cadastro_substancia'] = $this->input->post('data_cadastro_substancia');
				$data_substancia['observacao_substancia'] =  strtoupper($this->input->post('observacao_substancia'));
				
		 		$this->model->inserirAux($data_substancia,'tb_paciente_substancia_gestacao_mae');
		 	}else{
		 		echo "nulo";
		 	}
	 		/*-----------------------------------------------------------------------------------------------*/
			/*---------------------------------------------INICIO DOENCAS------------------------------------*/
			$codigoDoenca = $this->model->pegando_codigo('codigo_doenca','tb_doenca','nome_doenca',$this->input->post('combo_doenca'));
			if($codigoDoenca != NULL){
				$data_doenca['codigo_doenca'] = $codigoDoenca[0];
				$codigoPaciente = $this->model->codigodoPaciente($this->input->post('nome_paciente'));
				$data_doenca['codigo_paciente'] = $codigoPaciente[0];
				$data_doenca['data_cadastro_doenca'] = $this->input->post('data_cadastro_doenca');
				$data_doenca['observacao_doenca'] =  strtoupper($this->input->post('observacao_doenca'));
				
		 		$this->model->inserirAux($data_doenca,'tb_paciente_doenca_mae');
		 	}else{
		 		echo "nulo";
		 	}
	 		/*-----------------------------------------------------------------------------------------------*/
			/*------------------------------------------INICIO AUXILIO SOCIAL--------------------------------*/
			$codigoAuxilio = $this->model->pegando_codigo('codigo_auxilio_social','tb_auxilio_social','nome_auxilio_social',$this->input->post('combo_auxilio_social'));
			if($codigoAuxilio != NULL){
				$data_auxilio['codigo_auxilio_social'] = $codigoAuxilio[0];
				$codigoPaciente = $this->model->codigodoPaciente($this->input->post('nome_paciente'));
				$data_auxilio['codigo_paciente'] = $codigoPaciente[0];
				$data_auxilio['data_inicio_auxilio'] = $this->input->post('data_inicio_auxilio');
				$data_auxilio['data_termino_auxilio'] = $this->input->post('data_termino_auxilio');
				$data_auxilio['data_cadastro_auxilio'] = $this->input->post('data_cadastro_auxilio');
				$data_auxilio['valor'] =  strtoupper($this->input->post('valor'));
				$data_auxilio['observacao_auxilio'] =  strtoupper($this->input->post('observacao_auxilio'));
				
		 		$this->model->inserirAux($data_auxilio,'tb_paciente_auxilio_social');
		 	}else{
		 		echo "nulo";
		 	}
	 		/*-----------------------------------------------------------------------------------------------*/
			
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

	

	}
}