<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Imam_Model;
use App\Models\Pengurus_Model;

class ImamController extends BaseController
{
    protected $helpers = [];

    public function __construct()
    {
        helper(['form']);
        $this->pengurus_model = new Pengurus_Model();
        $this->imam_model = new Imam_Model();
    }

    public function index()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        // membuat halaman otomatis berubah ketika berpindah halaman 
        $currentPage = $this->request->getVar('page_daftarimam') ? $this->request->getVar('page_daftarimam') : 1;
        // paginate
        $paginate = 5;
        $data['daftarimam']   = $this->imam_model->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarimam.idpengurus')->paginate($paginate, 'daftarimam');
        $data['pager']        = $this->imam_model->pager;
        $data['currentPage']  = $currentPage;
        echo view('daftarimam/index', $data);
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
        return view('daftarimam/create', $data);
    }

    public function store()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $validation =  \Config\Services::validation();

        // // get file upload
        // $image = $this->request->getFile('foto');
        // // random name file
        // $name = $image->getRandomName();

        $data = array(
            'idpengurus'        => $this->request->getPost('idpengurus'),
            // 'foto'              => $name,
            'nama'              => $this->request->getPost('nama'),
            'alamat'            => $this->request->getPost('alamat'),
            'status'            => $this->request->getPost('status'),
            'handphone'         => $this->request->getPost('handphone'),
            'tahun'             => $this->request->getPost('tahun'),

        );

        if ($validation->run($data, 'daftarimam') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('daftarimam/create'));
        } else {
            // // upload file 
            // $image->move(ROOTPATH . 'public/uploads/imam', $name);
            // insert
            $simpan = $this->imam_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Menambahkan Data Berhasil');
                return redirect()->to(base_url('daftarimam'));
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
    //     $data['daftarimam'] = $this->imam_model->getData($id);
    //     echo view('daftarimam/show', $data);
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

        $data['daftarimam'] = $this->imam_model->getData($id);
        echo view('daftarimam/edit', $data);
    }

    public function update()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $id = $this->request->getPost('idimam');

        $validation =  \Config\Services::validation();

        // // get file
        // $image = $this->request->getFile('foto');
        // // random name file
        // $name = $image->getRandomName();

        $data = array(
            'idpengurus'        => $this->request->getPost('idpengurus'),
            // 'foto'              => $name,
            'nama'              => $this->request->getPost('nama'),
            'alamat'            => $this->request->getPost('alamat'),
            'status'            => $this->request->getPost('status'),
            'handphone'         => $this->request->getPost('handphone'),
            'tahun'             => $this->request->getPost('tahun'),

        );

        if ($validation->run($data, 'daftarimam') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('daftarimam/edit/' . $id));
        } else {
            // upload
            // $image->move(ROOTPATH . 'public/uploads/imam', $name);
            // update
            $ubah = $this->imam_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Data Berhasil');
                return redirect()->to(base_url('daftarimam'));
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
        $hapus = $this->imam_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Data Berhasil');
            return redirect()->to(base_url('daftarimam'));
        }
    }
}
