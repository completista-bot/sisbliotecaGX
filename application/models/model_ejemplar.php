<?php
class model_ejemplar extends CI_Model {

     

    public function consultar()
    {
            $query = $this->db->get('ejemplar', 100);
            return $query->result();
    }
    public function guardar($data,$id){
        if($id>0){
                $this->db->where('ejem_id', $id);
                $this->db->update('ejemplar',$data); 
         }else{
                $this->db->insert('ejemplar',$data);
         }
    }
    
    public function eliminar($id){
        $this->db->delete('ejemplar', array('ejem_id' => $id)); 
    }
    public function consultar1($id){
        return $this->db->get_where("ejemplar", array("ejem_id" => $id))->row();
        
    }
    function getCategoria(){
        $rows = $this->db->query("SELECT * FROM ejem_cate_id")->result();
        $opciones = array();
        foreach($rows as $row){
            $opciones[$row->ejem_cate_id] = $row->ejem_cate_nombre;
        }
        return $opciones;
    }

          
}