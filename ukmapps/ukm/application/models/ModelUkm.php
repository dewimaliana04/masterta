<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelUkm extends CI_Model {
    public function getData(){
        $sql = $this->db->get('ukm');
        return $sql->result();
    }

    public function getDataById($id){
        $this->db->where('kode_ukm',$id);
        $sql = $this->db->get('ukm');
        return $sql->row();
    }

    public function addData($data){
        $sql = $this->db->insert('ukm',$data);
        if($sql){
            return true;
        } else{
            return false;
        }
    }

    public function updateData($id,$data){
        $this->db->where('kode_ukm',$id);
        $sql = $this->db->update('ukm',$data);
        if($sql){
            return true;
        } else{
            return false;
        }
    }

    public function deleteData($id){
        $this->db->where('kode_ukm',$id);
        $sql = $this->db->delete('ukm');
        if($sql){
            return true;
        } else{
            return false;
        }
    }

}