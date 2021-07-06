<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Marbot_Model;
use App\Models\Pengurus_Model;

class MarbotController extends BaseController
{
    protected $helpers = [];

    public function __construct()
    {
        helper(['form']);
        $this->pengurus_model = new Pengurus_Model();
        $this->marbot_model = new Marbot_Model();
    }

    public function index()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        // membuat halaman otomatis berubah ketika berpindah halaman 
        $currentPage = $this->request->getVar('page_daftarmarbot') ? $this->request->getVar('page_daftarmarbot') : 1;

        // paginate
        $paginate = 10000000;

        $data = [
            'daftarmarbot'      => $this->marbot_model->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarmarbot.idpengurus')->paginate($paginate, 'daftarmarbot'),
            'pager'          => $this->marbot_model->pager,
            'currentPage'    => $currentPage,
            'tahun'          => $this->marbot_model->getTahun()
        ];

        return view('daftarmarbot/laporan', $data);
    }

    public function laporan()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        // membuat halaman otomatis berubah ketika berpindah halaman 
        $currentPage = $this->request->getVar('page_daftarmarbot') ? $this->request->getVar('page_daftarmarbot') : 1;

        // paginate
        $paginate = 10000000;
        //$data['daftarmarbot']   = $this->marbot_model->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarmarbot.idpengurus')->paginate($paginate, 'daftarmarbot');
        //$data['pager']        = $this->marbot_model->pager;
        //$data['currentPage']  = $currentPage;
        //echo view('daftarmarbot/laporan', $data);

        $data = [
            'daftarmarbot'      => $this->marbot_model->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarmarbot.idpengurus')->paginate($paginate, 'daftarmarbot'),
            'pager'          => $this->marbot_model->pager,
            'currentPage'    => $currentPage,
            'tahun'          => $this->marbot_model->getTahun()
        ];

        return view('daftarmarbot/laporan', $data);
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
        return view('daftarmarbot/create', $data);
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

        if ($validation->run($data, 'daftarmarbot') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('daftarmarbot/create'));
        } else {

            $simpan = $this->marbot_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created Daftar successfully');
                return redirect()->to(base_url('daftarmarbot'));
            }
        }
    }

    public function edit($id)
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $daftarpengurus = $this->pengurus_model->where('status', 'AKTIF')->findAll();
        $data['daftarpengurus'] = ['' => 'Pilih Pengurus'] + array_column($daftarpengurus, 'namapengurus', 'idpengurus');

        $data['daftarmarbot'] = $this->marbot_model->getData($id);
        echo view('daftarmarbot/edit', $data);
    }

    public function update()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $id = $this->request->getPost('idmarbot');

        $validation =  \Config\Services::validation();


        $data = array(
            'idpengurus'        => $this->request->getPost('idpengurus'),
            'nama'              => $this->request->getPost('nama'),
            'alamat'            => $this->request->getPost('alamat'),
            'status'            => $this->request->getPost('status'),
            'handphone'         => $this->request->getPost('handphone'),
            'tahun'             => $this->request->getPost('tahun'),

        );

        if ($validation->run($data, 'daftarmarbot') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('daftarmarbot/edit/' . $id));
        } else {
            // update
            $ubah = $this->marbot_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Data marbot Berhasil');
                return redirect()->to(base_url('daftarmarbot'));
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
        $hapus = $this->marbot_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Daftar marbot Berhasil');
            return redirect()->to(base_url('daftarmarbot'));
        }
    }

    public function filter()
    {
        $tanggalAwal     = $this->request->getPost('tanggalAwal');
        $tanggalAkhir    = $this->request->getPost('tanggalAkhir');
        $bulanAwal       = $this->request->getPost('bulanAwal');
        $bulanAkhir      = $this->request->getPost('bulanAkhir');
        $tahun1          = $this->request->getPost('tahun1');
        $tahun2          = $this->request->getPost('tahun2');
        $filter          = $this->request->getPost('filter');

        $currentPage = $this->request->getVar('page_daftarmarbot') ? $this->request->getVar('page_daftarmarbot') : 1;

        if ($filter == 1) {

            $data = [
                'currentPage'     => $currentPage,
                'datafilter'      => $this->marbot_model->filterByTanggal($tanggalAwal, $tanggalAkhir)
            ];

            return view('daftarmarbot/laporanByFilter', $data);
        } elseif ($filter == 2) {

            $data = [
                'currentPage'     => $currentPage,
                'datafilter'      => $this->marbot_model->filterByaBulan($tahun1, $bulanAwal, $bulanAkhir)
            ];

            return view('daftarmarbot/laporanByFilter', $data);
        } elseif ($filter == 3) {

            $data = [
                'currentPage'     => $currentPage,
                'datafilter'      => $this->marbot_model->filterByaTahun($tahun2)
            ];

            return view('daftarmarbot/laporanByFilter', $data);
        }
    }
}
