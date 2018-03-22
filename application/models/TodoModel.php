<?php

/** @property CI_DB $db
 * 
 */

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TodoModel
 *
 * @author adminSio
 */
class TodoModel extends CI_Model{
    //put your code here
    public function __Construct(){
        parent::__Construct();
    }
    
    public function get_by_id($id){
    return $this->db->get_where('todo',['id'=>$id])->row_array();
    }
    
    public function get_all(){
        $this->db->select('*');
        $this->db->from('todo');
        $this->db->order_by('ordre');
        return $this->db->get()->result_array();
    }
    
    public function add($params){
        $this->db->insert('todo',$params);
        return $this->db->insert_id();
    }
    
    public function delete($id){
        $this->db->delete('todo',array('id'=>$id));
    }
    
    public function update($id,$params){
        $this->db->where('id',$id);
        $this->db->update('todo',$params);
    }
}