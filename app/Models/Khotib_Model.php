<?php

namespace App\Models;

use CodeIgniter\Model;

class Khotib_Model extends Model
{

    protected $table = 'daftarkhotib';
      
    public function getData($id = false)
    {
        if($id === false){
            return $this->table('daftarkhotib')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarkhotib.idpengurus')
			->get()
			->getResultArray();
        } else {
            return $this->table('daftarkhotib')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarkhotib.idpengurus')
			->where('daftarkhotib.idkhotib', $id)
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
        return $this->db->table($this->table)->update($data, ['idkhotib' => $id]);
    }
    public function deleteData($id)
    {
        return $this->db->table($this->table)->delete(['idkhotib' => $id]);
    } 
    
    public function getTahun() 
    {
       $query = $this->db->query("SELECT YEAR(tahun) as tahun FROM daftarkhotib GROUP BY YEAR(tahun) ORDER BY YEAR(tahun) ASC");
       
       return $query->getResult();
     }
     
     public function filterByTanggal($tanggalAwal, $tanggalAkhir)
     {
        $query = $this->db->query("SELECT * FROM daftarkhotib JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarkhotib.idpengurus WHERE tahun BETWEEN '$tanggalAwal' AND '$tanggalAkhir' ORDER BY tahun ASC");
       
       return $query->getResult();
     }
     
     public function filterByaBulan($tahun1, $bulanAwal, $bulanAkhir)
     {
        $query = $this->db->query("SELECT * FROM daftarkhotib JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarkhotib.idpengurus WHERE YEAR(tahun) = '$tahun1' AND MONTH(tahun) BETWEEN '$bulanAwal' AND '$bulanAkhir' ORDER BY tahun ASC");
       
       return $query->getResult();
     }
     
     public function filterByaTahun($tahun2)
     {
        $query = $this->db->query("SELECT * FROM daftarkhotib JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarkhotib.idpengurus WHERE YEAR(tahun) = '$tahun2' ORDER BY tahun ASC");
       
       return $query->getResult();
     }


// public function search($keyword){
    
//     return $this->table('daftarkhotib')->like('nama', $keyword);
// }
 }