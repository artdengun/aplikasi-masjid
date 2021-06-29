<?php

namespace App\Models;

use CodeIgniter\Model;

class Bilal_Model extends Model
{

    protected $table = 'daftarbilal';
      
    public function getData($id = false)
    {
        if($id === false){
            return $this->table('daftarbilal')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarbilal.idpengurus')
			->get()
			->getResultArray();
        } else {
            return $this->table('daftarbilal')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarbilal.idpengurus')
			->where('daftarbilal.idbilal', $id)
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
    return $this->db->table($this->table)->update($data, ['idbilal' => $id]);
}
public function deleteData($id)
{
    return $this->db->table($this->table)->delete(['idbilal' => $id]);
} 

}