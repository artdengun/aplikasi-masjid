<?php

namespace App\Models;

use CodeIgniter\Model;

class Marbot_Model extends Model
{

    protected $table = 'daftarmarbot';
      
    public function getData($id = false)
    {
        if($id === false){
            return $this->table('daftarmarbot')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarmarbot.idpengurus')
			->get()
			->getResultArray();
        } else {
            return $this->table('daftarmarbot')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarmarbot.idpengurus')
			->where('daftarmarbot.idmarbot', $id)
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
        return $this->db->table($this->table)->update($data, ['idmarbot' => $id]);
    }
    public function deleteData($id)
    {
        return $this->db->table($this->table)->delete(['idmarbot' => $id]);
    } 
    
    public function getTahun() 
    {
       $query = $this->db->query("SELECT YEAR(tahun) as tahun FROM daftarmarbot GROUP BY YEAR(tahun) ORDER BY YEAR(tahun) ASC");
       
       return $query->getResult();
     }
     
     public function filterByTanggal($tanggalAwal, $tanggalAkhir)
     {
        $query = $this->db->query("SELECT * FROM daftarmarbot JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarmarbot.idpengurus WHERE tahun BETWEEN '$tanggalAwal' AND '$tanggalAkhir' ORDER BY tahun ASC");
       
       return $query->getResult();
     }
     
     public function filterByaBulan($tahun1, $bulanAwal, $bulanAkhir)
     {
        $query = $this->db->query("SELECT * FROM daftarmarbot JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarmarbot.idpengurus WHERE YEAR(tahun) = '$tahun1' AND MONTH(tahun) BETWEEN '$bulanAwal' AND '$bulanAkhir' ORDER BY tahun ASC");
       
       return $query->getResult();
     }
     
     public function filterByaTahun($tahun2)
     {
        $query = $this->db->query("SELECT * FROM daftarmarbot JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarmarbot.idpengurus WHERE YEAR(tahun) = '$tahun2' ORDER BY tahun ASC");
       
       return $query->getResult();
     }


// public function search($keyword){
    
//     return $this->table('daftarimam')->like('nama', $keyword);
// }
 }