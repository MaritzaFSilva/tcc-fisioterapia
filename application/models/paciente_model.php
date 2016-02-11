<?php
 
class paciente_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }
 
    function inserir($data, $tabela) {
        return $this->db->insert($tabela, $data);
    }
    function inserirAux($data, $tabela) {
        return $this->db->insert($tabela, $data);
    }
 
    function listar() {
        $query = $this->db->get('tb_paciente');
        return $query->result();
    }
    function editar($codigo_paciente) {
    $this->db->where('codigo_paciente', $codigo_paciente);
    $query = $this->db->get('tb_paciente');
    return $query->result();
    }
     
    function atualizar($data) {
        $this->db->where('codigo_paciente', $data['codigo_paciente']);
        $this->db->set($data);
        return $this->db->update('tb_paciente');
    }
     
    function deletar($codigo_paciente) {
        $this->db->where('codigo_paciente', $codigo_paciente);
        return $this->db->delete('tb_paciente');
    }
    
    function codigodoPaciente($nome){
        $conexao = mysqli_connect("localhost", "fisioterapia", "12345", "fisioterapia");
        $sql = "SELECT codigo_paciente FROM tb_paciente WHERE nome_paciente = '".$nome."'";// pega o código de acordo com o nome do paciente
        $result = $conexao->query($sql) or trigger_error($conexao->error." [$sql]"); // executa sql
        $row = $result->fetch_array();//pega o valor
        return $row;
        mysqli_close($con);
    }

    function codigodoResponsavel($nome){
        $conexao = mysqli_connect("localhost", "fisioterapia", "12345", "fisioterapia");
        $sql = "SELECT codigo_responsavel FROM tb_responsavel WHERE nome_paciente = '".$nome."'";// pega o código de acordo com o nome do paciente
        $result = $conexao->query($sql) or trigger_error($conexao->error." [$sql]"); // executa sql
        $row = $result->fetch_array();//pega o valor
        return $row;
        mysqli_close($con);
    }


    function pegando_codigo($campo, $tabela, $onde, $igual){
        $conexao = mysqli_connect("localhost", "fisioterapia", "12345", "fisioterapia");
        $sql = "SELECT ".$campo." FROM ".$tabela." WHERE ".$onde." = '".$igual."'";// pega o código de acordo com o nome do auxilio
        $result = $conexao->query($sql) or trigger_error($conexao->error." [$sql]"); // executa sql
        $row = $result->fetch_array();//pega o valor
        return $row;
        mysqli_close($con);
    }
   


}