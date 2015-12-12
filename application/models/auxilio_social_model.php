<?php
 
class substancia_gestacao_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }
 
    function inserir($data) {
        return $this->db->insert('substancia_gestacao', $data);
    }
 
    function listar() {
        $query = $this->db->get('substancia_gestacao');
        return $query->result();
    }
    function editar($codigo_substancia) {
    $this->db->where('codigo_substancia', $codigo_substancia);
    $query = $this->db->get('substancia_gestacao');
    return $query->result();
    }
     
    function atualizar($data) {
        $this->db->where('codigo_substancia', $data['codigo_substancia']);
        $this->db->set($data);
        return $this->db->update('substancia_gestacao');
    }
     
    function deletar($codigo_substancia) {
        $this->db->where('codigo_substancia', $codigo_substancia);
        return $this->db->delete('substancia_gestacao');
    }
}