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


// public function search($keyword){
    
//     return $this->table('daftarkhotib')->like('nama', $keyword);
// }
 }