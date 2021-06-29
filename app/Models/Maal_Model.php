<?php

namespace App\Models;

use CodeIgniter\Model;

class Maal_Model extends Model
{

    protected $table = 'daftarmaal';
      
    public function getData($id = false)
    {
        if($id === false){
            return $this->table('daftarmaal')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarmaal.idpengurus')
			->get()
			->getResultArray();
        } else {
            return $this->table('daftarmaal')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarmaal.idpengurus')
			->where('daftarmaal.idmaal', $id)
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
    return $this->db->table($this->table)->update($data, ['idmaal' => $id]);
}
public function deleteData($id)
{
    return $this->db->table($this->table)->delete(['idmaal' => $id]);
} 

}