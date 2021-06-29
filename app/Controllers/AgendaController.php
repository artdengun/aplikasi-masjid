<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Agenda_Model;
use App\Models\Pengurus_Model;

class AgendaController extends BaseController
{
    protected $helpers = [];

    public function __construct()
    {
        helper(['form']);
        $this->pengurus_model = new Pengurus_Model();
        $this->agenda_model = new Agenda_Model();
    }

    public function index()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        // membuat halaman otomatis berubah ketika berpindah halaman 
        $currentPage = $this->request->getVar('page_agenda') ? $this->request->getVar('page_agenda') : 1;
        // paginate
        $paginate = 5;
        $data['agenda']   = $this->agenda_model->join('daftarpengurus', 'daftarpengurus.idpengurus = agenda.idpengurus')->paginate($paginate, 'agenda');
        $data['pager']        = $this->agenda_model->pager;
        $data['currentPage']  = $currentPage;
        echo view('agenda/index', $data);
    }


    public function create()
    {        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $daftarpengurus = $this->pengurus_model->where('status', 'AKTIF')->findAll();
        $data['daftarpengurus'] = ['' => 'Pengurus'] + array_column($daftarpengurus, 'namapengurus', 'idpengurus');
        return view('agenda/create', $data);
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
            'idpengurus'         => $this->request->getPost('idpengurus'),
            'nama'               => $this->request->getPost('nama'),
            'tanggal'            => $this->request->getPost('tanggal'),
            'tempat'             => $this->request->getPost('tempat'),
            'keterangan'         => $this->request->getPost('keterangan'),
            'tgl_post'           => $this->request->getPost('tgl_post'),
        );

        if ($validation->run($data, 'agenda') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('agenda/create'));
        } else {
            // insert
            $simpan = $this->agenda_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created Daftar successfully');
                return redirect()->to(base_url('agenda'));
            }
        }
    }

    // public function show($id)

    // {        // proteksi halaman
    //     if (session()->get('username') == '') {
    //         session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
    //         return redirect()->to(base_url('login'));
    //     }

    //     $data['agenda'] = $this->agenda_model->getData($id);
    //     echo view('agenda/show', $data);
    // }

    public function edit($id)
    {        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }


        $daftarpengurus = $this->pengurus_model->where('status', 'AKTIF')->findAll();
        $data['daftarpengurus'] = ['' => 'Pilih Pengurus'] + array_column($daftarpengurus, 'namapengurus', 'idpengurus');

        $data['agenda'] = $this->agenda_model->getData($id);
        echo view('agenda/edit', $data);
    }

    public function update()

    {        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }


        $id = $this->request->getPost('idagenda');

        $validation =  \Config\Services::validation();

        $data = array(
            'idpengurus'         => $this->request->getPost('idpengurus'),
            'nama'               => $this->request->getPost('nama'),
            'tanggal'            => $this->request->getPost('tanggal'),
            'tempat'             => $this->request->getPost('tempat'),
            'keterangan'         => $this->request->getPost('keterangan'),
            'tgl_post'           => $this->request->getPost('tgl_post'),

        );

        if ($validation->run($data, 'agenda') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('agenda/edit/' . $id));
        } else {

            $ubah = $this->agenda_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Data agenda Berhasil');
                return redirect()->to(base_url('agenda'));
            }
        }
    }

    public function delete($id)

    {        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }

        $hapus = $this->agenda_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Daftar agenda Berhasil');
            return redirect()->to(base_url('agenda'));
        }
    }
}
