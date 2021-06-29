<?php

namespace App\Models;

use CodeIgniter\Model;

class Sampul_Model extends Model
{

    protected $table = 'daftarsampul';
      
    public function getData($id = false)
    {
        if($id === false){
            return $this->table('daftarsampul')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarsampul.idpengurus')
			->get()
			->getResultArray();
        } else {
            return $this->table('daftarsampul')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarsampul.idpengurus')
			->where('daftarsampul.idsampul', $id)
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
    return $this->db->table($this->table)->update($data, ['idsampul' => $id]);
}
public function deleteData($id)
{
    return $this->db->table($this->table)->delete(['idsampul' => $id]);
} 


// public function search($keyword){
    
//     return $this->table('daftarsampul')->like('nama', $keyword);
// }
 }