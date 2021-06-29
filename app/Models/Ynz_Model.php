<?php

namespace App\Models;

use CodeIgniter\Model;

class Ynz_Model extends Model
{

    protected $table = 'daftarynz';
      
    public function getData($id = false)
    {
        if($id === false){
            return $this->table('daftarynz')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarynz.idpengurus')
			->get()
			->getResultArray();
        } else {
            return $this->table('daftarynz')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarynz.idpengurus')
			->where('daftarynz.idynz', $id)
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
    return $this->db->table($this->table)->update($data, ['idynz' => $id]);
}
public function deleteData($id)
{
    return $this->db->table($this->table)->delete(['idynz' => $id]);
} 

}