<?php
 
class habito_alimentar_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }
 
    function inserir($data) {
        return $this->db->insert('habito_alimentar', $data);
    }
 
    function listar() {
        $query = $this->db->get('habito_alimentar');
        return $query->result();
    }
    function editar($codigo_habito_alimentar) {
    $this->db->where('codigo_habito_alimentar', $codigo_habito_alimentar);
    $query = $this->db->get('habito_alimentar');
    return $query->result();
    }
     
    function atualizar($data) {
        $this->db->where('codigo_habito_alimentar', $data['codigo_habito_alimentar']);
        $this->db->set($data);
        return $this->db->update('habito_alimentar');
    }
     
    function deletar($codigo_habito_alimentar) {
        $this->db->where('codigo_habito_alimentar', $codigo_habito_alimentar);
        return $this->db->delete('habito_alimentar');
    }
}