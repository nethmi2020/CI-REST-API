<?php
if(!defined('BASEPATH')) exit ('No access');


class Main_model extends CI_Model{

    function getusernames(){
        $this->db->select('username');
        $records=$this->db->get('users');
        $users=$records->result_array();

        return $users;
    }

    function getUserDetails($postData){
        
        if(isset($postData['username'])){
            $this->db->select('*');
            $this->db->where('username', $postData['username']);
            $records= $this->db->get('users');
            $response=$records->result_array();
        }
        return $response;
    }
}