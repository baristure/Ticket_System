<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
class Search_model extends CI_Model{
    function __construct() { 
        parent::__construct(); 
        } 
    function search($key){
        $this
        ->db
        ->like('username', $key)
        ->or_like('ticket_name', $key);
        $query= $this->db->get('users');
        return $query->result();
}
}