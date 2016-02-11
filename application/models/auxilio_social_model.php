<?php
 
class auxilio_social_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }
 
    function inserir($data) {
        return $this->db->insert('tb_auxilio_social', $data);
    }
 
    function listar() {
        $query = $this->db->get('tb_auxilio_social');
        return $query->result();
    }
    function editar($codigo_auxilio_social) {
    $this->db->where('codigo_auxilio_social', $codigo_auxilio_social);
    $query = $this->db->get('tb_auxilio_social');
    return $query->result();
    }
     
    function atualizar($data) {
        $this->db->where('codigo_auxilio_social', $data['codigo_auxilio_social']);
        $this->db->set($data);
        return $this->db->update('tb_auxilio_social');
    }
     
    function deletar($codigo_auxilio_social) {
        $this->db->where('codigo_auxilio_social', $codigo_auxilio_social);
        return $this->db->delete('tb_auxilio_social');
    }
}