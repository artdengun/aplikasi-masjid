<?php

namespace App\Models;

use CodeIgniter\Model;

class Remaja_Model extends Model
{

    protected $table = 'daftarremaja';
      
    public function getData($id = false)
    {
        if($id === false){
            return $this->table('daftarremaja')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarremaja.idpengurus')
			->get()
			->getResultArray();
        } else {
            return $this->table('daftarremaja')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarremaja.idpengurus')
			->where('daftarremaja.idremaja', $id)
			->get()
			->getRowArray();
        }   
    }
    
    public function insertData($data)
    {
        return $this->db->table($this->table)->insert($data);
    }
    
    public function updateData($data, $id)
    {
        return $this->db->table($this->table)->update($data, ['idremaja' => $id]);
    }
    public function deleteData($id)
    {
        return $this->db->table($this->table)->delete(['idremaja' => $id]);
    }
    
    public function getTahun() 
    {
       $query = $this->db->query("SELECT YEAR(tahun) as tahun FROM daftarremaja GROUP BY YEAR(tahun) ORDER BY YEAR(tahun) ASC");
       
       return $query->getResult();
     }
     
     public function filterByTanggal($tanggalAwal, $tanggalAkhir)
     {
        $query = $this->db->query("SELECT * FROM daftarremaja JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarremaja.idpengurus WHERE tahun BETWEEN '$tanggalAwal' AND '$tanggalAkhir' ORDER BY tahun ASC");
       
       return $query->getResult();
     }
     
     public function filterByaBulan($tahun1, $bulanAwal, $bulanAkhir)
     {
        $query = $this->db->query("SELECT * FROM daftarremaja JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarremaja.idpengurus WHERE YEAR(tahun) = '$tahun1' AND MONTH(tahun) BETWEEN '$bulanAwal' AND '$bulanAkhir' ORDER BY tahun ASC");
       
       return $query->getResult();
     }
     
     public function filterByaTahun($tahun2)
     {
        $query = $this->db->query("SELECT * FROM daftarremaja JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarremaja.idpengurus WHERE YEAR(tahun) = '$tahun2' ORDER BY tahun ASC");
       
       return $query->getResult();
     }


// public function search($keyword){
    
//     return $this->table('daftarremaja')->like('nama', $keyword);
// }
 }