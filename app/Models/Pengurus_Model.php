<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengurus_Model extends Model
{
    protected $table = 'daftarpengurus';
      
    public function getData($id = false)
    {
        if($id === false){
            return $this->findAll();
        } else {
            return $this->getWhere(['idpengurus' => $id]);
        }   
    }


public function insertData($data)
{
    return $this->db->table($this->table)->insert($data);
}

public function updateData($data, $id)
{
    return $this->db->table($this->table)->update($data, ['idpengurus' => $id]);
}


public function deleteData($id)
{
    return $this->db->table($this->table)->delete(['idpengurus' => $id]);
}

}
?>