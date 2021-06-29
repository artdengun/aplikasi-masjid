<?php

namespace App\Models;

use CodeIgniter\Model;

class Berita_Model extends Model
{

    protected $table = 'berita';
      
    public function getData($id = false)
    {
        if($id === false){
            return $this->table('berita')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = berita.idpengurus')
			->get()
			->getResultArray();
        } else {
            return $this->table('berita')
			->join('daftarpengurus', 'daftarpengurus.idpengurus = berita.idpengurus')
			->where('berita.idberita', $id)
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
    return $this->db->table($this->table)->update($data, ['idberita' => $id]);
}
public function deleteData($id)
{
    return $this->db->table($this->table)->delete(['idberita' => $id]);
} 

}