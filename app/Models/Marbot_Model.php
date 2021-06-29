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


// public function search($keyword){
    
//     return $this->table('daftarimam')->like('nama', $keyword);
// }
 }