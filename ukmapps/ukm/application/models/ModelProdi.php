<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelProdi extends CI_Model {
    public function getData(){
        $sql = $this->db->get('prodi');
        return $sql->result();
    }

    public function getDataById($id){
        $this->db->where('id_prodi',$id);
        $sql = $this->db->get('prodi');
        return $sql->row();
    }

    public function addData($data){
        $sql = $this->db->insert('prodi',$data);
        if($sql){
            return true;
        } else{
            return false;
        }
    }

    public function updateData($id,$data){
        $this->db->where('id_prodi',$id);
        $sql = $this->db->update('prodi',$data);
        if($sql){
            return true;
        } else{
            return false;
        }
    }

    public function deleteData($id){
        $this->db->where('id_prodi',$id);
        $sql = $this->db->delete('prodi');
        if($sql){
            return true;
        } else{
            return false;
        }
    }

}