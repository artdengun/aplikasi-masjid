<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Khotib_Model;
use App\Models\Pengurus_Model;

class KhotibController extends BaseController
{
    protected $helpers = [];

    public function __construct()
    {
        helper(['form']);
        $this->pengurus_model = new Pengurus_Model();
        $this->khotib_model = new Khotib_Model();
    }

    public function index()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        // membuat halaman otomatis berubah ketika berpindah halaman 
        $currentPage = $this->request->getVar('page_daftarkhotib') ? $this->request->getVar('page_daftarkhotib') : 1;
        // paginate
        $paginate = 10000000;
        $data['daftarkhotib']   = $this->khotib_model->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarkhotib.idpengurus')->paginate($paginate, 'daftarkhotib');
        $data['pager']        = $this->khotib_model->pager;
        $data['currentPage']  = $currentPage;
        echo view('daftarkhotib/index', $data);
    }
    public function laporan()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        // membuat halaman otomatis berubah ketika berpindah halaman 
        $currentPage = $this->request->getVar('page_daftarkhotib') ? $this->request->getVar('page_daftarkhotib') : 1;
        // paginate
        $paginate = 10000000;
        //$data['daftarkhotib']   = $this->khotib_model->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarkhotib.idpengurus')->paginate($paginate, 'daftarkhotib');
        //$data['pager']        = $this->khotib_model->pager;
        //$data['currentPage']  = $currentPage;
        //echo view('daftarkhotib/laporan', $data);
        
        $data = [
          'daftarkhotib'    => $this->khotib_model->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarkhotib.idpengurus')->paginate($paginate, 'daftarkhotib'),
          'pager'           => $this->khotib_model->pager,
          'currentPage'     => $currentPage,
          'tahun'           => $this->khotib_model->getTahun()
        ];
        
        return view('daftarkhotib/laporan', $data);
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
        return view('daftarkhotib/create', $data);
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

        if ($validation->run($data, 'daftarkhotib') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('daftarkhotib/create'));
        } else {
            // // upload file 
            // $image->move(ROOTPATH . 'public/uploads/khotib', $name);
            // insert
            $simpan = $this->khotib_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created Daftar successfully');
                return redirect()->to(base_url('daftarkhotib'));
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

        $data['daftarkhotib'] = $this->khotib_model->getData($id);
        echo view('daftarkhotib/edit', $data);
    }

    public function update()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $id = $this->request->getPost('idkhotib');


        $validation =  \Config\Services::validation();
        $data = array(
            'idpengurus'        => $this->request->getPost('idpengurus'),
            'nama'              => $this->request->getPost('nama'),
            'alamat'            => $this->request->getPost('alamat'),
            'status'            => $this->request->getPost('status'),
            'handphone'         => $this->request->getPost('handphone'),
            'tahun'             => $this->request->getPost('tahun'),

        );

        if ($validation->run($data, 'daftarkhotib') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('daftarkhotib/edit/' . $id));
        } else {

            $ubah = $this->khotib_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Data khotib Berhasil');
                return redirect()->to(base_url('daftarkhotib'));
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
        $hapus = $this->khotib_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Daftar khotib Berhasil');
            return redirect()->to(base_url('daftarkhotib'));
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
      
      $currentPage = $this->request->getVar('page_daftarmuazin') ? $this->request->getVar('page_daftarmuazin') : 1;
      
      if ($filter == 1) {
        
        $data = [
          'currentPage'     => $currentPage,
          'datafilter'      => $this->khotib_model->filterByTanggal($tanggalAwal, $tanggalAkhir)
        ];
        
        return view('daftarkhotib/laporanByFilter', $data);
      } elseif ($filter == 2) {
        
        $data = [
          'currentPage'     => $currentPage,
          'datafilter'      => $this->khotib_model->filterByaBulan($tahun1, $bulanAwal, $bulanAkhir)
        ];
        
        return view('daftarkhotib/laporanByFilter', $data);
      } elseif ($filter == 3) {
        
        $data = [
          'currentPage'     => $currentPage,
          'datafilter'      => $this->khotib_model->filterByaTahun($tahun2)
        ];
        
        return view('daftarkhotib/laporanByFilter', $data);
      }
      
    }
}
