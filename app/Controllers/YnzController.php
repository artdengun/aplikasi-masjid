<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Ynz_Model;
use App\Models\Pengurus_Model;

class YnzController extends BaseController
{
    protected $helpers = [];

    public function __construct()
    {
        helper(['form']);
        $this->pengurus_model = new Pengurus_Model();
        $this->ynz_model = new Ynz_Model();
    }

    public function index()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        // membuat halaman otomatis berubah ketika berpindah halaman 
        $currentPage = $this->request->getVar('page_daftarynz') ? $this->request->getVar('page_daftarynz') : 1;
        // paginate
        $paginate = 10000000;
        $data['daftarynz']   = $this->ynz_model->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarynz.idpengurus')->paginate($paginate, 'daftarynz');
        $data['pager']        = $this->ynz_model->pager;
        $data['currentPage']  = $currentPage;
        echo view('daftarynz/index', $data);
    }


    public function laporan()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        // membuat halaman otomatis berubah ketika berpindah halaman 
        $currentPage = $this->request->getVar('page_daftarynz') ? $this->request->getVar('page_daftarynz') : 1;
        // paginate
        $paginate = 10000000;
        //$data['daftarynz']   = $this->ynz_model->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarynz.idpengurus')->paginate($paginate, 'daftarynz');
        //$data['pager']        = $this->ynz_model->pager;
        //$data['currentPage']  = $currentPage;
        //echo view('daftarynz/laporan', $data);
        
        $data = [
          'daftarynz'      => $this->ynz_model->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarynz.idpengurus')->paginate($paginate, 'daftarynz'),
          'pager'          => $this->ynz_model->pager,
          'currentPage'    => $currentPage,
          'tahun'          => $this->ynz_model->getTahun()
        ];
        
        return view('daftarynz/laporan', $data);
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
        return view('daftarynz/create', $data);
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
            'status_ynz'            => $this->request->getPost('status_ynz'),
            'handphone'         => $this->request->getPost('handphone'),
            'tahun'             => $this->request->getPost('tahun'),

        );

        if ($validation->run($data, 'daftarynz') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('daftarynz/create'));
        } else {

            // insert
            $simpan = $this->ynz_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Data Berhasil Ditambahkan');
                return redirect()->to(base_url('daftarynz'));
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

        $data['daftarynz'] = $this->ynz_model->getData($id);
        echo view('daftarynz/edit', $data);
    }

    public function update()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $id = $this->request->getPost('idynz');

        $validation =  \Config\Services::validation();

        $data = array(
            'idpengurus'        => $this->request->getPost('idpengurus'),
            'nama'              => $this->request->getPost('nama'),
            'alamat'            => $this->request->getPost('alamat'),
            'status_ynz'        => $this->request->getPost('status_ynz'),
            'handphone'         => $this->request->getPost('handphone'),
            'tahun'             => $this->request->getPost('tahun'),

        );

        if ($validation->run($data, 'daftarynz') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('daftarynz/edit/' . $id));
        } else {

            // update
            $ubah = $this->ynz_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Data Berhasil');
                return redirect()->to(base_url('daftarynz'));
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
        $hapus = $this->ynz_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Data Berhasil');
            return redirect()->to(base_url('daftarynz'));
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
      
      $currentPage = $this->request->getVar('page_daftarynz') ? $this->request->getVar('page_daftarynz') : 1;
      
      if ($filter == 1) {
        
        $data = [
          'currentPage'     => $currentPage,
          'datafilter'      => $this->ynz_model->filterByTanggal($tanggalAwal, $tanggalAkhir)
        ];
        
        return view('daftarynz/laporanByFilter', $data);
      } elseif ($filter == 2) {
        
        $data = [
          'currentPage'     => $currentPage,
          'datafilter'      => $this->ynz_model->filterByaBulan($tahun1, $bulanAwal, $bulanAkhir)
        ];
        
        return view('daftarynz/laporanByFilter', $data);
      } elseif ($filter == 3) {
        
        $data = [
          'currentPage'     => $currentPage,
          'datafilter'      => $this->ynz_model->filterByaTahun($tahun2)
        ];
        
        return view('daftarynz/laporanByFilter', $data);
      }
      
      
    }
}
