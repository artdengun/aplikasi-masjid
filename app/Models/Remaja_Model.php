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


// public function search($keyword){
    
//     return $this->table('daftarremaja')->like('nama', $keyword);
// }
 }