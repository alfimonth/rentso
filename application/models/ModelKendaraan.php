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
    public function deleteMobil($id)
    {
        return $this->db->query("DELETE FROM kendaraan WHERE id_mobil='$id'");
    }
    public function editMerek($brand, $id)
    {
        return $this->db->query("UPDATE merek SET nama_merek='$brand' WHERE id_merek='$id'");
    }
    public function editImg($n, $name, $id)
    {
        return $this->db->query("UPDATE kendaraan set $n='$name' where id_mobil='$id'");
    }
    public function addMobil(
        $vehicletitle,
        $brand,
        $vehicleoverview,
        $priceperday,
        $fueltype,
        $modelyear,
        $seatingcapacity,
        $vimage1,
        $vimage2,
        $vimage3,
        $vimage4,
        $vimage5,
        $airconditioner,
        $powerdoorlocks,
        $antilockbrakingsys,
        $brakeassist,
        $powersteering,
        $driverairbag,
        $passengerairbag,
        $powerwindow,
        $cdplayer,
        $centrallocking,
        $crashcensor,
        $leatherseats
    ) {
        return $this->db->query("INSERT INTO kendaraan (nama_mobil,id_merek,deskripsi,harga,bb,tahun,seating,image1,image2,image3,image4,image5,
        AirConditioner,PowerDoorLocks,AntiLockBrakingSystem,BrakeAssist,PowerSteering,DriverAirbag,PassengerAirbag,
        PowerWindows,CDPlayer,CentralLocking,CrashSensor,LeatherSeats)
        VALUES ('$vehicletitle','$brand','$vehicleoverview','$priceperday','$fueltype','$modelyear','$seatingcapacity',
        '$vimage1','$vimage2','$vimage3','$vimage4','$vimage5','$airconditioner','$powerdoorlocks','$antilockbrakingsys',
        '$brakeassist','$powersteering','$driverairbag','$passengerairbag','$powerwindow','$cdplayer','$centrallocking',
        '$crashcensor','$leatherseats')");
    }
    public function updateMobil(
        $id,
        $vehicletitle,
        $brand,
        $vehicleoverview,
        $priceperday,
        $fueltype,
        $modelyear,
        $seatingcapacity,
        $airconditioner,
        $powerdoorlocks,
        $antilockbrakingsys,
        $brakeassist,
        $powersteering,
        $driverairbag,
        $passengerairbag,
        $powerwindow,
        $cdplayer,
        $centrallocking,
        $crashcensor,
        $leatherseats
    ) {
        return $this->db->query("UPDATE kendaraan SET nama_mobil='$vehicletitle',id_merek='$brand',deskripsi='$vehicleoverview',harga='$priceperday',bb='$fueltype',tahun='$modelyear',
        seating='$seatingcapacity',AirConditioner='$airconditioner',PowerDoorLocks='$powerdoorlocks',AntiLockBrakingSystem='$antilockbrakingsys',
        BrakeAssist='$brakeassist',PowerSteering='$powersteering',DriverAirbag='$driverairbag',PassengerAirbag='$passengerairbag',PowerWindows='$powerwindow',
        CDPlayer='$cdplayer',CentralLocking='$centrallocking',CrashSensor='$crashcensor',LeatherSeats='$leatherseats' where id_mobil='$id'");
    }
}
