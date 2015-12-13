<?php
 
class responsavel_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }
 
    function inserir($data) {
        return $this->db->insert('responsavel', $data);
    }
 
    function listar() {
        $query = $this->db->get('responsavel');
        return $query->result();
    }
    function editar($cpf_responsavel) {
    $this->db->where('cpf_responsavel', $cpf_responsavel);
    $query = $this->db->get('responsavel');
    return $query->result();
    }
     
    function atualizar($data) {
        $this->db->where('cpf_responsavel', $data['cpf_responsavel']);
        $this->db->set($data);
        return $this->db->update('responsavel');
    }
     
    function deletar($cpf_responsavel) {
        $this->db->where('cpf_responsavel', $cpf_responsavel);
        return $this->db->delete('responsavel');
    }
}