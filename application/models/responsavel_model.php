<?php
 
class responsavel_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }
 
    function inserir($data) {
        return $this->db->insert('tb_responsavel', $data);
    }
 
    function listar() {
        $query = $this->db->get('tb_responsavel');
        return $query->result();
    }
    function editar($codigo_responsavel) {
    $this->db->where('codigo_responsavel', $codigo_responsavel);
    $query = $this->db->get('tb_responsavel');
    return $query->result();
    }
     
    function atualizar($data) {
        $this->db->where('codigo_responsavel', $data['codigo_responsavel']);
        $this->db->set($data);
        return $this->db->update('tb_responsavel');
    }
     
    function deletar($codigo_responsavel) {
        $this->db->where('codigo_responsavel', $codigo_responsavel);
        return $this->db->delete('tb_responsavel');
    }
}