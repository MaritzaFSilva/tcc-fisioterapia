<?php
 
class grau_escolaridade_model extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }
 
    function inserir($data) {
        return $this->db->insert( 'tb_grau_escolaridade', $data);
    }
 
    function listar() {
        $query = $this->db->get( 'tb_grau_escolaridade');
        return $query->result();
    }
    function editar($codigo_grau_escolaridade) {
    $this->db->where('codigo_grau_escolaridade', $codigo_grau_escolaridade);
    $query = $this->db->get( 'tb_grau_escolaridade');
    return $query->result();
    }
     
    function atualizar($data) {
        $this->db->where('codigo_grau_escolaridade', $data['codigo_grau_escolaridade']);
        $this->db->set($data);
        return $this->db->update( 'tb_grau_escolaridade');
    }
     
    function deletar($codigo_grau_escolaridade) {
        $this->db->where('codigo_grau_escolaridade', $codigo_grau_escolaridade);
        return $this->db->delete( 'tb_grau_escolaridade');
    }
}