<?php

namespace App\Models;

use CodeIgniter\Model;

class Muazin_Model extends Model
{

    protected $table = 'daftarmuazin';
      
    public function getData($id = false)
    {
        if($id === false){
            return $this->table('daftarmuazin')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarmuazin.idpengurus')
			->get()
			->getResultArray();
        } else {
            return $this->table('daftarmuazin')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarmuazin.idpengurus')
			->where('daftarmuazin.idmuazin', $id)
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
        return $this->db->table($this->table)->update($data, ['idmuazin' => $id]);
    }
    public function deleteData($id)
    {
        return $this->db->table($this->table)->delete(['idmuazin' => $id]);
    } 
    
    public function getTahun() 
    {
       $query = $this->db->query("SELECT YEAR(tahun) as tahun FROM daftarmuazin GROUP BY YEAR(tahun) ORDER BY YEAR(tahun) ASC");
       
       return $query->getResult();
     }
     
     public function filterByTanggal($tanggalAwal, $tanggalAkhir)
     {
        $query = $this->db->query("SELECT * FROM daftarmuazin JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarmuazin.idpengurus WHERE tahun BETWEEN '$tanggalAwal' AND '$tanggalAkhir' ORDER BY tahun ASC");
       
       return $query->getResult();
     }
     
     public function filterByaBulan($tahun1, $bulanAwal, $bulanAkhir)
     {
        $query = $this->db->query("SELECT * FROM daftarmuazin JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarmuazin.idpengurus WHERE YEAR(tahun) = '$tahun1' AND MONTH(tahun) BETWEEN '$bulanAwal' AND '$bulanAkhir' ORDER BY tahun ASC");
       
       return $query->getResult();
     }
     
     public function filterByaTahun($tahun2)
     {
        $query = $this->db->query("SELECT * FROM daftarmuazin JOIN daftarpengurus ON daftarpengurus.idpengurus = daftarmuazin.idpengurus WHERE YEAR(tahun) = '$tahun2' ORDER BY tahun ASC");
       
       return $query->getResult();
     }


// public function search($keyword){
    
//     return $this->table('daftarimam')->like('nama', $keyword);
// }
 }