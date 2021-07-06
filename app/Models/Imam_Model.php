<?php

namespace App\Models;

use CodeIgniter\Model;

class Imam_Model extends Model
{

    protected $table = 'daftarimam';
      
    public function getData($id = false)
    {
        if($id === false){
            return $this->table('daftarimam')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarimam.idpengurus')
			->get()
			->getResultArray();
        } else {
            return $this->table('daftarimam')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarimam.idpengurus')
			->where('daftarimam.idimam', $id)
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
        return $this->db->table($this->table)->update($data, ['idimam' => $id]);
    }
    public function deleteData($id)
    {
        return $this->db->table($this->table)->delete(['idimam' => $id]);
    } 
    
    public function getTahun() 
    {
       $query = $this->db->query("SELECT YEAR(tahun) as tahun FROM daftarimam GROUP BY YEAR(tahun) ORDER BY YEAR(tahun) ASC");
       
       return $query->getResult();
     }
     
     public function filterByTanggal($tanggalAwal, $tanggalAkhir)
     {
        $query = $this->db->query("SELECT * FROM daftarimam JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarimam.idpengurus WHERE tahun BETWEEN '$tanggalAwal' AND '$tanggalAkhir' ORDER BY tahun ASC");
       
       return $query->getResult();
     }
     
     public function filterByaBulan($tahun1, $bulanAwal, $bulanAkhir)
     {
        $query = $this->db->query("SELECT * FROM daftarimam JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarimam.idpengurus WHERE YEAR(tahun) = '$tahun1' AND MONTH(tahun) BETWEEN '$bulanAwal' AND '$bulanAkhir' ORDER BY tahun ASC");
       
       return $query->getResult();
     }
     
     public function filterByaTahun($tahun2)
     {
        $query = $this->db->query("SELECT * FROM daftarimam JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarimam.idpengurus WHERE YEAR(tahun) = '$tahun2' ORDER BY tahun ASC");
       
       return $query->getResult();
     }

     
// public function search($keyword){
    
//     return $this->table('daftarimam')->like('nama', $keyword);
// }
 }