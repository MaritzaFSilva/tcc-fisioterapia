<?php
 
class doenca_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }
 
    function inserir($data) {
        return $this->db->insert('tb_doenca', $data);
    }
 
    function listar() {
        $query = $this->db->get('tb_doenca');
        return $query->result();
    }
    function editar($codigo_doenca) {
    $this->db->where('codigo_doenca', $codigo_doenca);
    $query = $this->db->get('tb_doenca');
    return $query->result();
    }
     
    function atualizar($data) {
        $this->db->where('codigo_doenca', $data['codigo_doenca']);
        $this->db->set($data);
        return $this->db->update('tb_doenca');
    }
     
    function deletar($codigo_doenca) {
        $this->db->where('codigo_doenca', $codigo_doenca);
        return $this->db->delete('tb_doenca');
    }
}