<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Muazin_Model;
use App\Models\Pengurus_Model;

class MuazinController extends BaseController
{
    protected $helpers = [];

    public function __construct()
    {
        helper(['form']);
        $this->pengurus_model = new Pengurus_Model();
        $this->muazin_model = new Muazin_Model();
    }

    public function index()
    {

        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }

        // membuat halaman otomatis berubah ketika berpindah halaman 
        $currentPage = $this->request->getVar('page_daftarmuazin') ? $this->request->getVar('page_daftarmuazin') : 1;

        // paginate
        $paginate = 10000000;
        $data['daftarmuazin']   = $this->muazin_model->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarmuazin.idpengurus')->paginate($paginate, 'daftarmuazin');
        $data['pager']        = $this->muazin_model->pager;
        $data['currentPage']  = $currentPage;
        echo view('daftarmuazin/index', $data);
    }


    public function laporan()
    {

        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }

        // membuat halaman otomatis berubah ketika berpindah halaman 
        $currentPage = $this->request->getVar('page_daftarmuazin') ? $this->request->getVar('page_daftarmuazin') : 1;

        // paginate
        $paginate = 10000000;
        //$data['daftarmuazin']   = $this->muazin_model->join('daftarpengurus', 'daftarpengurus.idpengurus = daftarmuazin.idpengurus')->paginate($paginate, 'daftarmuazin');
        //$data['pager']        = $this->muazin_model->pager;
        //$data['currentPage']  = $currentPage;
        //echo view('daftarmuazin/laporan', $data);
        
        $data = [
          'daftarmuazin'    => $this->muazin_model->join('daftarpengurus','daftarpengurus.idpengurus = daftarmuazin.idpengurus')->paginate($paginate, 'daftarmuazin'),
          'pager'           => $this->muazin_model->pager,
          'currentPage'     => $currentPage,
          'tahun'           => $this->muazin_model->getTahun()
        ];
        
        return view('daftarmuazin/laporan', $data);
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
        return view('daftarmuazin/create', $data);
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

        if ($validation->run($data, 'daftarmuazin') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('daftarmuazin/create'));
        } else {

            // insert
            $simpan = $this->muazin_model->insertData($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Created Daftar successfully');
                return redirect()->to(base_url('daftarmuazin'));
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

        $data['daftarmuazin'] = $this->muazin_model->getData($id);
        echo view('daftarmuazin/edit', $data);
    }

    public function update()
    {
        // proteksi halaman
        if (session()->get('username') == '') {
            session()->setFlashdata('haruslogin', 'Silahkan Login Terlebih Dahulu');
            return redirect()->to(base_url('login'));
        }
        $id = $this->request->getPost('idmuazin');

        $validation =  \Config\Services::validation();


        $data = array(
            'idpengurus'        => $this->request->getPost('idpengurus'),
            'nama'              => $this->request->getPost('nama'),
            'alamat'            => $this->request->getPost('alamat'),
            'status'            => $this->request->getPost('status'),
            'handphone'         => $this->request->getPost('handphone'),
            'tahun'             => $this->request->getPost('tahun'),

        );

        if ($validation->run($data, 'daftarmuazin') == FALSE) {
            session()->setFlashdata('inputs', $this->request->getPost());
            session()->setFlashdata('errors', $validation->getErrors());
            return redirect()->to(base_url('daftarmuazin/edit/' . $id));
        } else {

            // update
            $ubah = $this->muazin_model->updateData($data, $id);
            if ($ubah) {
                session()->setFlashdata('info', 'Updated Data muazin Berhasil');
                return redirect()->to(base_url('daftarmuazin'));
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
        $hapus = $this->muazin_model->deleteData($id);
        if ($hapus) {
            session()->setFlashdata('warning', 'Delete Daftar muazin Berhasil');
            return redirect()->to(base_url('daftarmuazin'));
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
          'datafilter'      => $this->muazin_model->filterByTanggal($tanggalAwal, $tanggalAkhir)
        ];
        
        return view('daftarmuazin/laporanByFilter', $data);
      } elseif ($filter == 2) {
        
        $data = [
          'currentPage'     => $currentPage,
          'datafilter'      => $this->muazin_model->filterByaBulan($tahun1, $bulanAwal, $bulanAkhir)
        ];
        
        return view('daftarmuazin/laporanByFilter', $data);
      } elseif ($filter == 3) {
        
        $data = [
          'currentPage'     => $currentPage,
          'datafilter'      => $this->muazin_model->filterByaTahun($tahun2)
        ];
        
        return view('daftarmuazin/laporanByFilter', $data);
      }
      
    }
}
