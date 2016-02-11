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



}