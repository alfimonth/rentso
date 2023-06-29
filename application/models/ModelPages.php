<?php defined('BASEPATH') or exit('No direct script access allowed');
class ModelPages extends CI_Model
{
    public function driver()
    {
        return $this->db->query("SELECT detail FROM tblpages WHERE id=0 ");
    }
    public function alamat()
    {
        $this->db->select('alamat_kami');
        $this->db->from('contactusinfo');
        return $this->db->get();
    }

}
