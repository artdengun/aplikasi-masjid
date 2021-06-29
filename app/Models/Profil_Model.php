<?php

namespace App\Models;

use CodeIgniter\Model;

class Profil_Model extends Model
{

    protected $table = 'profil';
      
    public function getData($id = false)
    {
        if($id === false){
            return $this->table('profil')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = profil.idpengurus')
			->get()
			->getResultArray();
        } else {
            return $this->table('profil')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = profil.idpengurus')
			->where('profil.idprofil', $id)
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
    return $this->db->table($this->table)->update($data, ['idprofil' => $id]);
}
public function deleteData($id)
{
    return $this->db->table($this->table)->delete(['idprofil' => $id]);
} 


// public function search($keyword){
    
//     return $this->table('profil')->like('nama', $keyword);
// }
 }