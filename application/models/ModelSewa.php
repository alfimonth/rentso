<?php defined('BASEPATH') or exit('No direct script access allowed');
class ModelSewa extends CI_Model
{
    public function updateStatus($status, $kode)
    {
        return $this->db->query("UPDATE booking SET status = '$status' WHERE kode_booking='$kode'");
        return $this->db->query("UPDATE cek_booking SET status = '$status' WHERE kode_booking='$kode'");
    }
}
