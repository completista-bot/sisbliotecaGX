<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ctrlcategoria extends CI_Controller {

	public function index(){
        $id = $this->input->get('cate_id');
    
        $this->load->model('model_categoria');
        $result = $this->model_categoria->consultar1($id);
    
        $datos = array('registros'=>$result);
       
        $this->load->view('biblioteca/formCategoria1',$datos);
        
        
        
    }

    public function guardar(){
         $id = $this->input->get('cate_id');

         $cate_id = $this->input->post('cate_id');
         $cate_nombre = $this->input->post('cate_nombre');
         $this->load->model('model_categoria');
         
         $data=array(
             'cate_id'=>$cate_id,
             'cate_nombre'=>$cate_nombre            
         );
     $this->model_categoria->guardar($data,$id);
    
        redirect();
    }
    public function eliminar(){
        $id = $this->input->get('cate_id');
        $this->load->model('model_categoria');
        $this->model_categoria->eliminar($id);  
        $result = $this->model_categoria->consultar();
        $datos = array('registros'=>$result);
        $this->load->view('biblioteca/tabcategoria',$datos);   
    }
}