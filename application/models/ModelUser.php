<?php defined('BASEPATH') or exit('No direct script access allowed');
class ModelUser extends CI_Model
{
    public function simpanData($data = null)
    {
        $this->db->insert('user', $data);
    }
    public function updatePassword($pass, $email)
    {
        $this->db->set('password', $pass);
        $this->db->where('email', $email);
        $this->db->update('users');
    }
    public function updatePasswordbyId($pass, $id)
    {
        $this->db->set('password', $pass);
        $this->db->where('id_user', $id);
        $this->db->update('users');
    }
    public function cekData($where = null)
    {
        // var_dump('a');die;
        return $this->db->get_where('users', $where);
    }
    public function getUserWhere($where = null)
    {
        return $this->db->get_where('user', $where);
    }
    public function cekUserAccess($where = null)
    {
        $this->db->select('*');
        $this->db->from('access_menu');
        $this->db->where($where);
        return $this->db->get();
    }
    public function getUserLimit()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->limit(10, 0);
        return $this->db->get();
    }
    public function getFeed()
    {
        $this->db->select('*');
        $this->db->from('contactus');
        $this->db->order_by('tgl_posting', 'DESC');
        return $this->db->get();
    }
    public function getFeedbyId($id)
    {
        $this->db->select('*');
        $this->db->from('contactus');
        $this->db->where('id_cu', $id);
        return $this->db->get();
    }
    public function readFeed($id)
    {
        $this->db->set('status', 1);
        $this->db->where('id_cu', $id);
        $this->db->update('contactus');
    }
    public function deleteFeed($id)
    {
        $this->db->where('id_cu', $id);
        $this->db->delete('contactus');
    }
}
