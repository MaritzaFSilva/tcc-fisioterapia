<?php
 
class paciente_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }
 
    function inserir($data) {
        return $this->db->insert('paciente', $data);
    }
 
    function listar() {
        $query = $this->db->get('paciente');
        return $query->result();
    }
    function editar($codigo_paciente) {
    $this->db->where('codigo_paciente', $codigo_paciente);
    $query = $this->db->get('paciente');
    return $query->result();
    }
     
    function atualizar($data) {
        $this->db->where('codigo_paciente', $data['codigo_paciente']);
        $this->db->set($data);
        return $this->db->update('paciente');
    }
     
    function deletar($codigo_paciente) {
        $this->db->where('codigo_paciente', $codigo_paciente);
        return $this->db->delete('paciente');
    }
}