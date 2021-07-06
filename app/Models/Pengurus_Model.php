<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengurus_Model extends Model
{
    protected $table = 'daftarpengurus';
      
    public function getData($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['idpengurus' => $id]);
        }   
    }


     public function insertData($data)
     {
       return $this->db->table($this->table)->insert($data);
     }

     public function updateData($data, $id)
     {    
       return $this->db->table($this->table)->update($data, ['idpengurus' => $id]);
     }


     public function deleteData($id)
     {
       return $this->db->table($this->table)->delete(['idpengurus' => $id]);
     }
     
     public function getTahun() 
     {
       $query = $this->db->query("SELECT YEAR(tanggalmasuk) as tahun FROM daftarpengurus GROUP BY YEAR(tanggalmasuk) ORDER BY YEAR(tanggalmasuk) ASC");
       
       return $query->getResult();
     }
     
     public function filterByTanggal($tanggalAwal, $tanggalAkhir)
     {
        $query = $this->db->query("SELECT * FROM daftarpengurus WHERE tanggalmasuk BETWEEN '$tanggalAwal' AND '$tanggalAkhir' ORDER BY tanggalmasuk ASC");
       
       return $query->getResult();
     }
     
     public function filterByaBulan($tahun1, $bulanAwal, $bulanAkhir)
     {
        $query = $this->db->query("SELECT * FROM daftarpengurus WHERE YEAR(tanggalmasuk) = '$tahun1' AND MONTH(tanggalmasuk) BETWEEN '$bulanAwal' AND '$bulanAkhir' ORDER BY tanggalmasuk ASC");
       
       return $query->getResult();
     }
     
     public function filterByaTahun($tahun2)
     {
        $query = $this->db->query("SELECT * FROM daftarpengurus WHERE YEAR(tanggalmasuk) = '$tahun2' ORDER BY tanggalmasuk ASC");
       
       return $query->getResult();
     }
   
}
?>