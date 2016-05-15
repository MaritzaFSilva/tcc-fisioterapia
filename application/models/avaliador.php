<?php
 
class avaliador extends CI_Model {
 
    function __construct() {
        parent::__construct();
    }
 
   function verificaLogin($login, $senha){
    $this ->db->where('login',$login)
              ->where('senha',$senha);
    $result=$this->db->get('tb_avaliador');

    if($result){
        return $result->row_array();
        
    }
    return array();
   }
   


}