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


// public function search($keyword){
    
//     return $this->table('daftarimam')->like('nama', $keyword);
// }
 }