<?php

/** @property TodoModel $TodoModel 
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TodoController
 *
 * @author adminSio
 */
class Todo extends CI_Controller{
    //put your code here
    public function __Construct(){
        parent::__Construct();
        $this->load->model('TodoModel');
        $this->load->helper('form','url');
        $this->load->library('form_validation');
    }
    
    public function index(){
        $all_todo=$this->TodoModel->get_all();
        $data=[];
        $data['todos']=$all_todo;
        $data['title']='Liste de mes travaux';
        $this->load->view('TodoIndex',$data);
    }
    
    public function fait($id){
        $param=array('completed'=>1);
        $this->TodoModel->update($id,$param);
        Redirect(base_url('Todo/Index'));
    }
    
    public function aFaire($id){
        $param=array('completed'=>0);
        $this->TodoModel->update($id,$param);
        Redirect(base_url('Todo/Index'));
    }
    
    public function add(){
        $this->form_validation->set_rules('ordre','ordre','required|numeric');
        $this->form_validation->set_rules('task','task','required|max_length[60]');
        if($this->form_validation->run()==TRUE){
                $task=$this->input->post('task');
                $ordre=$this->input->post('ordre');
                $params=array('task'=>$task,'ordre'=>$ordre,'completed'=>0);
                $this->TodoModel->add($params);
                Redirect(base_url('Todo/Index'));
        }
        else{
            $this->load->view('TodoAdd');
        }
    }
    
    public function modifier($id){
        $this->form_validation->set_rules('ordre','ordre','required|numeric');
        $this->form_validation->set_rules('task','task','required|max_length[60]');
        if($this->form_validation->run()==TRUE){
                $task=$this->input->post('task');
                $ordre=$this->input->post('ordre');
                $params=array('task'=>$task,'ordre'=>$ordre);
                $this->TodoModel->update($id,$params);
                Redirect(base_url('Todo/Index'));
        }
        else{
            $data=[];
            $data['id']=$id;
            $occurence=$this->TodoModel->get_by_id($id);
            $tache=$occurence['task'];
            $order=$occurence['ordre'];
            $data['tache']=$tache;
            $data['order']=$order;
            $this->load->view('TodoUpdate',$data);
        }
    }
    
    public function delete($id){
        $this->TodoModel->delete($id);
        Redirect(base_url('Todo/Index'));
    }
    
    public function reordonner(){
        $all_todo=$this->TodoModel->get_all();
        //foreach($all_todo as $todo):
            $this->form_validation->set_rules('ordre[]','ordre','required|numeric');
        //endforeach;
        if($this->form_validation->run() == TRUE){
            $nouvelOrdre=$this->input->post('ordre[]');
            $i = 0; 
            foreach($all_todo as $todo):
                $params=array('ordre'=>$nouvelOrdre[$i]);
                $this->TodoModel->update($todo['id'],$params);
                $i = $i + 1;
            endforeach;
            Redirect(base_url('Todo/Index'));
        }
        else{
        $data=[];
        $data['todos']=$all_todo;
        $data['title']="Réordonner mes tâches";
        $this->load->view('TodoReordonner',$data);
        }
    }
}