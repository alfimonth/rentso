<?php defined('BASEPATH') or exit('No direct script access allowed');
class ModelBooking extends CI_Model
{
    public function check($fromdate, $todate, $id)
    {
        $query = "SELECT tgl_booking, SUM(unit) AS total_unit
              FROM cek_booking
              WHERE tgl_booking BETWEEN '$fromdate' AND '$todate' AND id_mobil = '$id' AND status != 'Cancel'
              GROUP BY tgl_booking
              ORDER BY total_unit DESC
              LIMIT 1";

        $result =  intval($this->db->query($query)->row_array()["total_unit"]);

        return $result;
    }

    public function last()
    {
        return $this->db->query("SELECT MAX(kode_booking) FROM booking")->row_array()["MAX(kode_booking)"];
    }

    public function insertData($data)
    {
        return $this->db->insert('booking', $data);
    }
    public function insertCheck($kode, $vid, $tglhasil, $status, $unit)
    {
        return $this->db->query("INSERT INTO cek_booking (kode_booking,id_mobil,tgl_booking,status,unit)VALUES('$kode','$vid','$tglhasil','$status','$unit')");
    }
    public function getBooking()
    {
        return $this->db->query("SELECT booking.*,kendaraan.*,merek.*,users.* FROM booking,kendaraan,merek,users WHERE booking.id_mobil=kendaraan.id_mobil
        AND merek.id_merek=kendaraan.id_merek AND users.email=booking.email ORDER BY booking.kode_booking DESC");
    }
    public function getBookingStatus($status)
    {
        return $this->db->query("SELECT booking.*,kendaraan.*,merek.*,users.* FROM booking,kendaraan,merek,users WHERE booking.id_mobil=kendaraan.id_mobil
        AND merek.id_merek=kendaraan.id_merek AND users.email=booking.email AND booking.status='$status' ORDER BY booking.kode_booking DESC");
    }
}
