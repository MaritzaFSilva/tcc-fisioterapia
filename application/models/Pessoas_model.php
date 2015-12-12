<?php
 
class substancia_gestacao_mae_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }
 
    function inserir($data) {
        return $this->db->insert('substancia_gestacao_mae', $data);
    }
 
    function listar() {
        $query = $this->db->get('substancia_gestacao_mae');
        return $query->result();
    }
    function editar($id) {
    $this->db->where('id', $id);
    $query = $this->db->get('substancia_gestacao_mae');
    return $query->result();
    }
     
    function atualizar($data) {
        $this->db->where('id', $data['id']);
        $this->db->set($data);
        return $this->db->update('substancia_gestacao_mae');
    }
     
    function deletar($id) {
        $this->db->where('id', $id);
        return $this->db->delete('substancia_gestacao_mae');
    }
}