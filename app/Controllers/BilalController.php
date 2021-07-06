<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Bilal_Model;
use App\Models\Pengurus_Model;

class BilalController extends BaseController
{
    protected $helpers = [];

    public function __construct()
    {
        helper(['form']);
        $this->pengurus_model = new Pengurus_Model();
        $this->bilal_model = new Bilal_Model();
    }

    public function index()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        // membuat halaman otomatis berubah ketika berpindah halaman 
        $currentPage = $this->request->getVar('page_daftarbilal') ? $this->request->getVar('page_daftarbilal') : 1;

        // paginate
        $paginate = 10000000;
        $data['daftarbilal']   = $this->bilal_model->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarbilal.idpengurus')->paginate($paginate, 'daftarbilal');
        $data['pager']        = $this->bilal_model->pager;
        $data['currentPage']  = $currentPage;
        echo view('daftarbilal/index', $data);
    }


    public function laporan()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        // membuat halaman otomatis berubah ketika berpindah halaman 
        $currentPage = $this->request->getVar('page_daftarbilal') ? $this->request->getVar('page_daftarbilal') : 1;

        // paginate
        $paginate = 10000000;
        //$data['daftarbilal']   = $this->bilal_model->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarbilal.idpengurus')->paginate($paginate, 'daftarbilal');
        //$data['pager']        = $this->bilal_model->pager;
        //$data['currentPage']  = $currentPage;
        //echo view('daftarbilal/laporan', $data);
        
        $data = [
          'daftarbilal'      => $this->bilal_model->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarbilal.idpengurus')->paginate($paginate, 'daftarbilal'),
          'pager'          => $this->bilal_model->pager,
          'currentPage'    => $currentPage,
          'tahun'          => $this->bilal_model->getTahun()
        ];
        
        return view('daftarbilal/laporan', $data);
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
        return view('daftarbilal/create', $data);
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

        if ($validation->run($data, 'daftarbilal') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('daftarbilal/create'));
        } else {

            $simpan = $this->bilal_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created Bilal successfully');
                return redirect()->to(base_url('daftarbilal'));
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
        $data['daftarpengurus'] = ['' => 'Pengurus'] + array_column($daftarpengurus, 'namapengurus', 'idpengurus');

        $data['daftarbilal'] = $this->bilal_model->getData($id);
        echo view('daftarbilal/edit', $data);
    }

    public function update()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $id = $this->request->getPost('idbilal');

        $validation =  \Config\Services::validation();

        $data = array(
            'idpengurus'        => $this->request->getPost('idpengurus'),
            'nama'              => $this->request->getPost('nama'),
            'alamat'            => $this->request->getPost('alamat'),
            'status'            => $this->request->getPost('status'),
            'handphone'         => $this->request->getPost('handphone'),
            'tahun'             => $this->request->getPost('tahun'),
        );

        if ($validation->run($data, 'daftarbilal') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('daftarbilal/edit/' . $id));
        } else {

            $ubah = $this->bilal_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Data Bilal Berhasil');
                return redirect()->to(base_url('daftarbilal'));
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
        $hapus = $this->bilal_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Daftar Bilal Berhasil');
            return redirect()->to(base_url('daftarbilal'));
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
      
      $currentPage = $this->request->getVar('page_daftarbilal') ? $this->request->getVar('page_daftarbilal') : 1;
      
      if ($filter == 1) {
        
        $data = [
          'currentPage'     => $currentPage,
          'datafilter'      => $this->bilal_model->filterByTanggal($tanggalAwal, $tanggalAkhir)
        ];
        
        return view('daftarbilal/laporanByFilter', $data);
      } elseif ($filter == 2) {
        
        $data = [
          'currentPage'     => $currentPage,
          'datafilter'      => $this->bilal_model->filterByaBulan($tahun1, $bulanAwal, $bulanAkhir)
        ];
        
        return view('daftarbilal/laporanByFilter', $data);
      } elseif ($filter == 3) {
        
        $data = [
          'currentPage'     => $currentPage,
          'datafilter'      => $this->bilal_model->filterByaTahun($tahun2)
        ];
        
        return view('daftarbilal/laporanByFilter', $data);
      }
      
      
    }
}
