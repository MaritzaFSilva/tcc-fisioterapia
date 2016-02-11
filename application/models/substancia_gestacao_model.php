<?php
 
class substancia_gestacao_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }
 
    function inserir($data) {
        return $this->db->insert('tb_substancia_gestacao', $data);
    }
 
    function listar() {
        $query = $this->db->get('tb_substancia_gestacao');
        return $query->result();
    }
    function editar($codigo_substancia) {
    $this->db->where('codigo_substancia', $codigo_substancia);
    $query = $this->db->get('tb_substancia_gestacao');
    return $query->result();
    }
     
    function atualizar($data) {
        $this->db->where('codigo_substancia', $data['codigo_substancia']);
        $this->db->set($data);
        return $this->db->update('tb_substancia_gestacao');
    }
     
    function deletar($codigo_substancia) {
        $this->db->where('codigo_substancia', $codigo_substancia);
        return $this->db->delete('tb_substancia_gestacao');
    }
}