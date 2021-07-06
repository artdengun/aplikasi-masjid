<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Pengurus_Model;

class PengurusController extends BaseController
{
    protected $helpers = [];

    public function __construct()
    {
        helper(['form']);
        $this->pengurus_model = new Pengurus_Model();
    }

    public function index()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        // membuat halaman otomatis berubah ketika berpindah halaman 
        $currentPage = $this->request->getVar('page_daftarpengurus') ? $this->request->getVar('page_daftarpengurus') : 1;

        // paginate
        $paginate = 10000000;
        $data['daftarpengurus'] = $this->pengurus_model->paginate($paginate, 'daftarpengurus');
        $data['pager']          = $this->pengurus_model->pager;
        $data['currentPage']    = $currentPage;


        echo view('daftarpengurus/index', $data);
    }

    public function laporan()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        // membuat halaman otomatis berubah ketika berpindah halaman 
        $currentPage = $this->request->getVar('page_daftarpengurus') ? $this->request->getVar('page_daftarpengurus') : 1;

        // paginate
        $paginate = 10000000;

        $data = [
            'daftarpengurus'    => $this->pengurus_model->paginate($paginate, 'daftarpengurus'),
            'pager'             => $this->pengurus_model->pager,
            'currentPage'       => $currentPage,
            'tahun'             => $this->pengurus_model->getTahun()
        ];


        echo view('daftarpengurus/laporan', $data);
    }


    public function create()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        return view('daftarpengurus/create');
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
            'namapengurus'     => $this->request->getPost('namapengurus'),
            'jk'   => $this->request->getPost('jk'),
            'pekerjaan'   => $this->request->getPost('pekerjaan'),
            'alamat'   => $this->request->getPost('alamat'),
            'telephone'   => $this->request->getPost('telephone'),
            'jabatan'   => $this->request->getPost('jabatan'),
            'status'   => $this->request->getPost('status'),
            'tanggalmasuk'   => $this->request->getPost('tanggalmasuk'),


        );

        if ($validation->run($data, 'daftarpengurus') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('daftarpengurus/create'));
        } else {
            $model = new Pengurus_Model();
            $simpan = $model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
                return redirect()->to(base_url('daftarpengurus'));
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
        $model = new Pengurus_Model();
        $data['daftarpengurus'] = $model->getData($id)->getRowArray();
        echo view('daftarpengurus/edit', $data);
    }

    public function update()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $id = $this->request->getPost('idpengurus');

        $validation =  \Config\Services::validation();

        $data = array(


            'namapengurus'     => $this->request->getPost('namapengurus'),
            'jk'   => $this->request->getPost('jk'),
            'pekerjaan'   => $this->request->getPost('pekerjaan'),
            'alamat'   => $this->request->getPost('alamat'),
            'telephone'   => $this->request->getPost('telephone'),
            'jabatan'   => $this->request->getPost('jabatan'),
            'status'   => $this->request->getPost('status'),
            'tanggalmasuk'   => $this->request->getPost('tanggalmasuk'),
        );

        if ($validation->run($data, 'daftarpengurus') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('daftarpengurus/edit/' . $id));
        } else {
            $model = new Pengurus_Model();
            $ubah = $model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Data Berhasil');
                return redirect()->to(base_url('daftarpengurus'));
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
        $model = new Pengurus_Model();
        $hapus = $model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Data Berhasil');
            return redirect()->to(base_url('daftarpengurus'));
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

        if ($filter == 1) {

            $data = [
                'datafilter'      => $this->pengurus_model->filterByTanggal($tanggalAwal, $tanggalAkhir)
            ];

            return view('daftarpengurus/laporanByFilter', $data);
        } elseif ($filter == 2) {

            $data = [
                'datafilter'      => $this->pengurus_model->filterByaBulan($tahun1, $bulanAwal, $bulanAkhir)
            ];

            return view('daftarpengurus/laporanByFilter', $data);
        } elseif ($filter == 3) {

            $data = [
                'datafilter'      => $this->pengurus_model->filterByaTahun($tahun2)
            ];

            return view('daftarpengurus/laporanByFilter', $data);
        }
    }
}
