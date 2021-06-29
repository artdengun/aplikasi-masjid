<?php

namespace App\Models;

use CodeIgniter\Model;

class Dashboard_model extends Model
{
    protected $table = 'daftarpengurus';

    // hitung total data pada transaction
    public function getCountPengurus()
    {
        return $this->db->table("daftarpengurus")->countAll();
    }

    // hitung total data pada  Imam
    public function getCountImam()
    {
        return $this->db->table("daftarimam")->countAll();
    }

    // hitung total data pada Bilal
    public function getCountBilal()
    {
        return $this->db->table("daftarbilal")->countAll();
    }

    // hitung total data pada user
    public function getCountKhotib()
    {
        return $this->db->table("daftarkhotib")->countAll();
    }

    // hitung total data pada Marbot
    public function getCounMarbot()
    {
        return $this->db->table("daftarmarbot")->countAll();
    }

    // hitung total data pada Muazin
    public function getCountMuazin()
    {
        return $this->db->table("daftarmuazin")->countAll();
    }

    public function getCountRemaja()
    {
        return $this->db->table("daftarremaja")->countAll();

    } public function getCountYnz()
    {
        return $this->db->table("daftarynz")->countAll();
    }

    // public function getGrafik()
    // {
    //     $query = $this->db->query("SELECT trx_price, MONTHNAME(trx_date) as month, COUNT(product_id) as total FROM transactions GROUP BY MONTHNAME(trx_date) ORDER BY MONTH(trx_date)");
    //     $hasil = [];
    //     if (!empty($query)) {
    //         foreach ($query->getResultArray() as $data) {
    //             $hasil[] = $data;
    //         }
    //     }
    //     return $hasil;
    // }

    // public function getLatestTrx()
    // {
    //     return $this->table('transactions')
    //         ->select('products.product_name, transactions.*')
    //         ->join('products', 'products.product_id = transactions.product_id')
    //         ->orderBy('transactions.trx_id', 'desc')
    //         ->limit(5)
    //         ->get()
    //         ->getResultArray();
    // }
}
