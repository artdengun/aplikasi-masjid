<?php

namespace App\Models;

use CodeIgniter\Model;

class Bilal_Model extends Model
{

    protected $table = 'daftarbilal';
      
    public function getData($id = false)
    {
        if($id === false){
            return $this->table('daftarbilal')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarbilal.idpengurus')
			->get()
			->getResultArray();
        } else {
            return $this->table('daftarbilal')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarbilal.idpengurus')
			->where('daftarbilal.idbilal', $id)
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
        return $this->db->table($this->table)->update($data, ['idbilal' => $id]);
    }
    public function deleteData($id)
    {
        return $this->db->table($this->table)->delete(['idbilal' => $id]);
    }
    
    public function getTahun() 
    {
       $query = $this->db->query("SELECT YEAR(tahun) as tahun FROM daftarbilal GROUP BY YEAR(tahun) ORDER BY YEAR(tahun) ASC");
       
       return $query->getResult();
     }
     
     public function filterByTanggal($tanggalAwal, $tanggalAkhir)
     {
        $query = $this->db->query("SELECT * FROM daftarbilal JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarbilal.idpengurus WHERE tahun BETWEEN '$tanggalAwal' AND '$tanggalAkhir' ORDER BY tahun ASC");
       
       return $query->getResult();
     }
     
     public function filterByaBulan($tahun1, $bulanAwal, $bulanAkhir)
     {
        $query = $this->db->query("SELECT * FROM daftarbilal JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarbilal.idpengurus WHERE YEAR(tahun) = '$tahun1' AND MONTH(tahun) BETWEEN '$bulanAwal' AND '$bulanAkhir' ORDER BY tahun ASC");
       
       return $query->getResult();
     }
     
     public function filterByaTahun($tahun2)
     {
        $query = $this->db->query("SELECT * FROM daftarbilal JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarbilal.idpengurus WHERE YEAR(tahun) = '$tahun2' ORDER BY tahun ASC");
       
       return $query->getResult();
     }

}