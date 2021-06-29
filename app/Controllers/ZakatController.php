<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengurus_Model;
use App\Models\Zakat_Model;

class ZakatController extends BaseController
{
    protected $helpers = [];

    public function __construct()
    {
        helper(['form']);
        $this->pengurus_model = new Pengurus_Model();
        $this->zakat_model = new Zakat_Model();
    }

    public function index()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        // membuat halaman otomatis berubah ketika berpindah halaman 
        $currentPage = $this->request->getVar('page_daftarzakat') ? $this->request->getVar('page_daftarzakat') : 1;

        // paginate
        $paginate = 5;
        $data['daftarzakat']   = $this->zakat_model->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarzakat.idpengurus')->paginate($paginate, 'daftarzakat');
        $data['pager']        = $this->zakat_model->pager;
        $data['currentPage']  = $currentPage;
        echo view('daftarzakat/index', $data);
    }


    public function create()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $daftarpengurus = $this->pengurus_model->where('status', 'AKTIF')->findAll();
        $data['daftarpengurus'] = ['' => 'Pengurus'] + array_column($daftarpengurus, 'namapengurus', 'idpengurus');
        return view('daftarzakat/create', $data);
    }

    public function store()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $validation =  \Config\Services::validation();


        $data = array(
            'idpengurus'        => $this->request->getPost('idpengurus'),
            'nama'              => $this->request->getPost('nama'),
            'alamat'            => $this->request->getPost('alamat'),
            'status'            => $this->request->getPost('status'),
            'handphone'         => $this->request->getPost('handphone'),
            'tahun'             => $this->request->getPost('tahun'),

        );

        if ($validation->run($data, 'daftarzakat') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('daftarzakat/create'));
        } else {

            // insert
            $simpan = $this->zakat_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created Daftar successfully');
                return redirect()->to(base_url('daftarzakat'));
            }
        }
    }



    // public function show($id)
    // {
    //     // proteksi halaman
    //     if (session()->get('username') == '') {
    //         session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
    //         return redirect()->to(base_url('login'));
    //     }
    //     $data['daftarzakat'] = $this->zakat_model->getData($id);
    //     echo view('daftarzakat/show', $data);
    // }

    public function edit($id)
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $daftarpengurus = $this->pengurus_model->where('status', 'AKTIF')->findAll();
        $data['daftarpengurus'] = ['' => 'Pilih Pengurus'] + array_column($daftarpengurus, 'namapengurus', 'idpengurus');

        $data['daftarzakat'] = $this->zakat_model->getData($id);
        echo view('daftarzakat/edit', $data);
    }

    public function update()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $id = $this->request->getPost('idzakat');

        $validation =  \Config\Services::validation();


        $data = array(
            'idpengurus'        => $this->request->getPost('idpengurus'),
            'nama'              => $this->request->getPost('nama'),
            'alamat'            => $this->request->getPost('alamat'),
            'status'            => $this->request->getPost('status'),
            'handphone'         => $this->request->getPost('handphone'),
            'tahun'             => $this->request->getPost('tahun'),

        );

        if ($validation->run($data, 'daftarzakat') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('daftarzakat/edit/' . $id));
        } else {
            // update
            $ubah = $this->zakat_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Data zakat Berhasil');
                return redirect()->to(base_url('daftarzakat'));
            }
        }
    }

    public function delete($id)
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $hapus = $this->zakat_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Daftar zakat Berhasil');
            return redirect()->to(base_url('daftarzakat'));
        }
    }
}
