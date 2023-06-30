<?php defined('BASEPATH') or exit('No direct script access allowed');
class ModelKendaraan extends CI_Model
{
    public function get()
    {
        $this->db->from('kendaraan');
        $this->db->join('merek', 'kendaraan.id_merek = merek.id_merek');
        return $this->db->get();
    }
    public function unitTotal()
    {
        $this->db->from('unit');
        return $this->db->count_all_results();
    }
    public function getLimit($limit)
    {
        $this->db->from('kendaraan');
        $this->db->join('merek', 'kendaraan.id_merek = merek.id_merek');
        $this->db->order_by("id_mobil", "DESC");
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
    public function addMerek($brand)
    {
        return $this->db->query("INSERT INTO merek (nama_merek) VALUES ('$brand')");
    }
    public function deleteMerek($id)
    {
        return $this->db->query("DELETE FROM merek WHERE id_merek='$id'");
    }
    public function editMerek($brand, $id)
    {
        return $this->db->query("UPDATE merek SET nama_merek='$brand' WHERE id_merek='$id'");
    }
}
