<?php
 
class grau_parentesco_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }
 
    function inserir($data) {
        return $this->db->insert('grau_parentesco', $data);
    }
 
    function listar() {
        $query = $this->db->get('grau_parentesco');
        return $query->result();
    }
    function editar($codigo_grau_parentesco) {
    $this->db->where('codigo_grau_parentesco', $codigo_grau_parentesco);
    $query = $this->db->get('grau_parentesco');
    return $query->result();
    }
     
    function atualizar($data) {
        $this->db->where('codigo_grau_parentesco', $data['codigo_grau_parentesco']);
        $this->db->set($data);
        return $this->db->update('grau_parentesco');
    }
     
    function deletar($codigo_grau_parentesco) {
        $this->db->where('codigo_grau_parentesco', $codigo_grau_parentesco);
        return $this->db->delete('grau_parentesco');
    }
}