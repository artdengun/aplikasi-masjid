<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Remaja_Model;
use App\Models\Pengurus_Model;

class RemajaController extends BaseController
{
    protected $helpers = [];

    public function __construct()
    {
        helper(['form']);
        $this->pengurus_model = new Pengurus_Model();
        $this->remaja_model = new Remaja_Model();
    }

    public function index()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        // membuat halaman otomatis berubah ketika berpindah halaman 
        $currentPage = $this->request->getVar('page_daftarremaja') ? $this->request->getVar('page_daftarremaja') : 1;
        // paginate
        $paginate = 5;
        $data['daftarremaja']   = $this->remaja_model->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarremaja.idpengurus')->paginate($paginate, 'daftarremaja');
        $data['pager']        = $this->remaja_model->pager;
        $data['currentPage']  = $currentPage;
        echo view('daftarremaja/index', $data);
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
        return view('daftarremaja/create', $data);
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

        if ($validation->run($data, 'daftarremaja') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('daftarremaja/create'));
        } else {

            $simpan = $this->remaja_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created Daftar successfully');
                return redirect()->to(base_url('daftarremaja'));
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
    //     $data['daftarremaja'] = $this->remaja_model->getData($id);
    //     echo view('daftarremaja/show', $data);
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

        $data['daftarremaja'] = $this->remaja_model->getData($id);
        echo view('daftarremaja/edit', $data);
    }

    public function update()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $id = $this->request->getPost('idremaja');

        $validation =  \Config\Services::validation();

        $data = array(
            'idpengurus'        => $this->request->getPost('idpengurus'),
            'nama'              => $this->request->getPost('nama'),
            'alamat'            => $this->request->getPost('alamat'),
            'status'            => $this->request->getPost('status'),
            'handphone'         => $this->request->getPost('handphone'),
            'tahun'             => $this->request->getPost('tahun'),

        );

        if ($validation->run($data, 'daftarremaja') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('daftarremaja/edit/' . $id));
        } else {

            // update
            $ubah = $this->remaja_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Data remaja Berhasil');
                return redirect()->to(base_url('daftarremaja'));
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
        $hapus = $this->remaja_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Daftar remaja Berhasil');
            return redirect()->to(base_url('daftarremaja'));
        }
    }
}
