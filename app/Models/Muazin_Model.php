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


// public function search($keyword){
    
//     return $this->table('daftarimam')->like('nama', $keyword);
// }
 }