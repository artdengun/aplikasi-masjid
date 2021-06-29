<?php

namespace App\Models;

use CodeIgniter\Model;

class Zakat_Model extends Model
{

    protected $table = 'daftarzakat';
      
    public function getData($id = false)
    {
        if($id === false){
            return $this->table('daftarzakat')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarzakat.idpengurus')
			->get()
			->getResultArray();
        } else {
            return $this->table('daftarzakat')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarzakat.idpengurus')
			->where('daftarzakat.idzakat', $id)
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
    return $this->db->table($this->table)->update($data, ['idzakat' => $id]);
}
public function deleteData($id)
{
    return $this->db->table($this->table)->delete(['idzakat' => $id]);
} 

}