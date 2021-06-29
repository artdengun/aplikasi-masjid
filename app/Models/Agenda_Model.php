<?php

namespace App\Models;

use CodeIgniter\Model;

class Agenda_Model extends Model
{

    protected $table = 'agenda';

    public function getData($id = false)
    {
        if ($id === false) {
            return $this->table('agenda')
                ->join('daftarpengurus', 'daftarpengurus.idpengurus = agenda.idpengurus')
                ->get()
                ->getResultArray();
        } else {
            return $this->table('agenda')
                ->join('daftarpengurus', 'daftarpengurus.idpengurus = agenda.idpengurus')
                ->where('agenda.idagenda', $id)
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
        return $this->db->table($this->table)->update($data, ['idagenda' => $id]);
    }
    public function deleteData($id)
    {
        return $this->db->table($this->table)->delete(['idagenda' => $id]);
    }
}
