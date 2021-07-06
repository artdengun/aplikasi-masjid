<?php

namespace App\Models;

use CodeIgniter\Model;

class Ynz_Model extends Model
{

    protected $table = 'daftarynz';
      
    public function getData($id = false)
    {
        if($id === false){
            return $this->table('daftarynz')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarynz.idpengurus')
			->get()
			->getResultArray();
        } else {
            return $this->table('daftarynz')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarynz.idpengurus')
			->where('daftarynz.idynz', $id)
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
        return $this->db->table($this->table)->update($data, ['idynz' => $id]);
    }
    public function deleteData($id)
    {
        return $this->db->table($this->table)->delete(['idynz' => $id]);
    } 
    
    public function getTahun() 
    {
       $query = $this->db->query("SELECT YEAR(tahun) as tahun FROM daftarynz GROUP BY YEAR(tahun) ORDER BY YEAR(tahun) ASC");
       
       return $query->getResult();
     }
     
     public function filterByTanggal($tanggalAwal, $tanggalAkhir)
     {
        $query = $this->db->query("SELECT * FROM daftarynz JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarynz.idpengurus WHERE tahun BETWEEN '$tanggalAwal' AND '$tanggalAkhir' ORDER BY tahun ASC");
       
       return $query->getResult();
     }
     
     public function filterByaBulan($tahun1, $bulanAwal, $bulanAkhir)
     {
        $query = $this->db->query("SELECT * FROM daftarynz JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarynz.idpengurus WHERE YEAR(tahun) = '$tahun1' AND MONTH(tahun) BETWEEN '$bulanAwal' AND '$bulanAkhir' ORDER BY tahun ASC");
       
       return $query->getResult();
     }
     
     public function filterByaTahun($tahun2)
     {
        $query = $this->db->query("SELECT * FROM daftarynz JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarynz.idpengurus WHERE YEAR(tahun) = '$tahun2' ORDER BY tahun ASC");
       
       return $query->getResult();
     }

}