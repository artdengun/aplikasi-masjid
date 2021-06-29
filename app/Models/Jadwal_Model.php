<?php

namespace App\Models;

use CodeIgniter\Model;

class Jadwal_Model extends Model
{

    protected $table = 'daftarjadwal';
      
    public function getData($id = false)
    {
        if($id === false){
            return $this->table('daftarjadwal')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarjadwal.idpengurus')
			->get()
			->getResultArray();
        } else {
            return $this->table('daftarjadwal')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarjadwal.idpengurus')
			->where('daftarjadwal.idjadwal', $id)
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
    return $this->db->table($this->table)->update($data, ['idjadwal' => $id]);
}
public function deleteData($id)
{
    return $this->db->table($this->table)->delete(['idjadwal' => $id]);
} 


// public function search($keyword){
    
//     return $this->table('daftarjadwal')->like('nama', $keyword);
// }
 }