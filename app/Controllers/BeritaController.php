<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Berita_Model;
use App\Models\Pengurus_Model;

class BeritaController extends BaseController
{
    protected $helpers = [];

    public function __construct()
    {
        helper(['form']);
        $this->pengurus_model = new Pengurus_Model();
        $this->berita_model = new Berita_Model();
    }

    public function index()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        // membuat halaman otomatis berubah ketika berpindah halaman 
        $currentPage = $this->request->getVar('page_berita') ? $this->request->getVar('page_berita') : 1;

        // paginate
        $paginate = 5;
        $data['berita']   = $this->berita_model->join('daftarpengurus', 'daftarpengurus.idpengurus = berita.idpengurus')->paginate($paginate, 'berita');
        $data['pager']        = $this->berita_model->pager;
        $data['currentPage']  = $currentPage;
        echo view('berita/index', $data);
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
        return view('berita/create', $data);
    }

    public function store()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $validation =  \Config\Services::validation();

        // get file upload
        $image = $this->request->getFile('gambar');
        // random name file
        $name = $image->getRandomName();

        $data = array(
            'idpengurus'        => $this->request->getPost('idpengurus'),
            'gambar'              => $name,
            'judul'              => $this->request->getPost('judul'),
            'isi'            => $this->request->getPost('isi'),
            'tanggal'            => $this->request->getPost('tanggal'),


        );

        if ($validation->run($data, 'berita') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('berita/create'));
        } else {
            // upload file 
            $image->move(ROOTPATH . 'public/uploads/berita', $name);
            // insert
            $simpan = $this->berita_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created Daftar successfully');
                return redirect()->to(base_url('berita'));
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
    //     $data['berita'] = $this->berita_model->getData($id);
    //     echo view('berita/show', $data);
    // }

    public function edit($id)
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $data['berita'] = $this->berita_model->getData($id);
        echo view('berita/edit', $data);
    }

    public function update()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $id = $this->request->getPost('idberita');

        $validation =  \Config\Services::validation();

        // get file
        $image = $this->request->getFile('gambar');
        // random name file
        $name = $image->getRandomName();

        $data = array(
            'idpengurus'        => $this->request->getPost('idpengurus'),
            'gambar'              => $name,
            'judul'              => $this->request->getPost('judul'),
            'isi'            => $this->request->getPost('isi'),
            'tanggal'            => $this->request->getPost('tanggal'),


        );

        if ($validation->run($data, 'berita') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('berita/edit/' . $id));
        } else {
            // upload
            $image->move(ROOTPATH . 'public/uploads/berita', $name);
            // update
            $ubah = $this->berita_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Data berita Berhasil');
                return redirect()->to(base_url('berita'));
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
        $hapus = $this->berita_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Daftar berita Berhasil');
            return redirect()->to(base_url('berita'));
        }
    }
}
