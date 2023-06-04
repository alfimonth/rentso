<?php defined('BASEPATH') or exit('No direct script access allowed');
class ModelKendaraan extends CI_Model
{
    public function get()
    {
        $this->db->from('kendaraan');
        $this->db->join('merek', 'kendaraan.id_merek = merek.id_merek');
        return $this->db->get();
    }
    public function getLimit($limit)
    {
        $this->db->from('kendaraan');
        $this->db->join('merek', 'kendaraan.id_merek = merek.id_merek');
        $this->db->order_by("id_mobil", "DSC");
        $this->db->limit($limit);
        return $this->db->get();
    }
    public function getOne($where)
    {
        $this->db->from('kendaraan');
        $this->db->join('merek', 'kendaraan.id_merek = merek.id_merek');
        $this->db->where($where);
        return $this->db->get();
    }
    public function getBrand($where)
    {
        $this->db->from('kendaraan');
        $this->db->join('merek', 'kendaraan.id_merek = merek.id_merek');
        $this->db->where($where);
        $this->db->limit(3);
        return $this->db->get();
    }
    public function countUnit($where)
    {
        $this->db->where($where);
        return $this->db->get('unit')->num_rows();
    }
}
