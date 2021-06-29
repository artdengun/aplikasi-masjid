<?php

namespace Config;

use CodeIgniter\Validation\CreditCardRules;
use CodeIgniter\Validation\FileRules;
use CodeIgniter\Validation\FormatRules;
use CodeIgniter\Validation\Rules;

class Validation
{
	//--------------------------------------------------------------------
	// Setup
	//--------------------------------------------------------------------

	/**
	 * Stores the classes that contain the
	 * rules that are available.
	 *
	 * @var string[]
	 */
	public $ruleSets = [
		Rules::class,
		FormatRules::class,
		FileRules::class,
		CreditCardRules::class,
	];

	/**
	 * Specifies the views that are used to display the
	 * errors.
	 *
	 * @var array<string, string>
	 */
	public $templates = [
		'list'   => 'CodeIgniter\Validation\Views\list',
		'single' => 'CodeIgniter\Validation\Views\single',
	];

	//--------------------------------------------------------------------
	// Rules
	//--------------------------------------------------------------------

	// validasi untuk daftar pengurus 


	public $daftarpengurus = [
		'namapengurus'     	=> 'required',
		'jk'   				=> 'required',
		'pekerjaan'   		=> 'required',
		'alamat'   			=> 'required',
		'telephone'   		=> 'required',
		'jabatan'   		=> 'required',
		'status'   			=> 'required',
		'tanggalmasuk'   	=> 'required',
	];

	public $daftarpengurus_errors = [
		'namapengurus'     			=> [
			'required'		=> 'Nama Pengurus Wajib Di isi'
		],
		'jk'   				=> [
			'required'		=> 'Jenis Kelamin Pengurus Wajib Di isi'
		],
		'pekerjaan'   		=>  [
			'required'		=> 'Pekerjaan Pengurus Wajib Di isi'
		],
		'alamat'   			=>  [
			'required'		=> 'Alamat Pengurus Wajib Di isi'
		],
		'telephone'   		=>  [
			'required'		=> 'Telephone Pengurus Wajib Di isi'
		],
		'jabatan'   		=>  [
			'required'		=> 'Jabatan Pengurus Wajib Di isi'
		],
		'status'   			=>  [
			'required'		=> 'Status Pengurus Wajib Di isi'
		],
		'tanggalmasuk'   	=>  [
			'required'		=> 'TanggalMasuk Pengurus Wajib Di isi'
		],
	];



	// validasi untuk  Daftar Imam 
	public $daftarimam = [
		'idpengurus'		=> 'required',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status'   			=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',
	];

	public $daftarimam_errors = [

		'idpengurus'     	=> [
			'required'		=> 'Pengurus Wajib Di isi'
		],

		'nama'     			=> [
			'required'		=> 'Data nama Wajib Di isi'
		],
		'alamat'   		=> [
			'required'		=> 'Data Alamat Wajib Di isi'
		],
		'status'   			=>  [
			'required'		=> ' Data Status Wajib Di isi'
		],
		'handphone'   		=>  [
			'required'		=> 'Data Handphone  Wajib Di isi'
		],
		'tahun'   		=>  [
			'required'		=> 'Data Tahun Wajib Di isi'
		]

	];


	// validasi untuk daftar bilal 
	public $daftarbilal = [
		'idpengurus'		=> 'required',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status'   			=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',

	];

	public $daftarbilal_errors = [

		'idpengurus'     	=> [
			'required'		=> 'Pengurus Wajib Di isi'
		],

		'nama'     			=> [
			'required'		=> 'Data nama Wajib Di isi'
		],
		'alamat'   		=> [
			'required'		=> 'Data Alamat Wajib Di isi'
		],
		'status'   			=>  [
			'required'		=> ' Data Status Wajib Di isi'
		],
		'handphone'   		=>  [
			'required'		=> 'Data Handphone  Wajib Di isi'
		],
		'tahun'   		=>  [
			'required'		=> 'Data Tahun Wajib Di isi'
		],
	];



	// validasi untuk daftar khotib 
	public $daftarkhotib = [
		'idpengurus'		=> 'required',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status'   			=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',

	];

	public $daftarkhotib_errors = [

		'idpengurus'     	=> [
			'required'		=> 'Pengurus Wajib Di isi'
		],


		'nama'     			=> [
			'required'		=> 'Data nama Wajib Di isi'
		],
		'alamat'   		=> [
			'required'		=> 'Data Alamat Wajib Di isi'
		],
		'status'   			=>  [
			'required'		=> ' Data Status Wajib Di isi'
		],
		'handphone'   		=>  [
			'required'		=> 'Data Handphone  Wajib Di isi'
		],
		'tahun'   		=>  [
			'required'		=> 'Data Tahun Wajib Di isi'
		],
	];





	// validasi untuk daftar marbot 
	public $daftarmarbot = [
		'idpengurus'		=> 'required',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status'   			=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',

	];

	public $daftarmarbot_errors = [

		'idpengurus'     	=> [
			'required'		=> 'Pengurus Wajib Di isi'
		],


		'nama'     			=> [
			'required'		=> 'Data nama Wajib Di isi'
		],
		'alamat'   		=> [
			'required'		=> 'Data Alamat Wajib Di isi'
		],
		'status'   			=>  [
			'required'		=> ' Data Status Wajib Di isi'
		],
		'handphone'   		=>  [
			'required'		=> 'Data Handphone  Wajib Di isi'
		],
		'tahun'   		=>  [
			'required'		=> 'Data Tahun Wajib Di isi'
		],
	];


	// validasi untuk daftar Muazin 
	public $daftarmuazin = [
		'idpengurus'		=> 'required',
		// 'foto'				=> 'uploaded[foto]|mime_in[foto,image/jpg,image/jpeg,image/gif,image/png]|max_size[foto,2000]',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status'   			=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',

	];

	public $daftarmuazin_errors = [

		'idpengurus'     	=> [
			'required'		=> 'Pengurus Wajib Di isi'
		],

		// 'foto'     			=> [
		// 	'mime_in'   => 'Gambar muazin hanya boleh diisi dengan jpg, jpeg, png atau gif.',
		// 	'max_size'  => 'Gambar muazin maksimal 2mb',
		// 	'uploaded'  => 'Gambar muazin wajib diisi'
		// ],

		'nama'     			=> [
			'required'		=> 'Data nama Wajib Di isi'
		],
		'alamat'   		=> [
			'required'		=> 'Data Alamat Wajib Di isi'
		],
		'status'   			=>  [
			'required'		=> ' Data Status Wajib Di isi'
		],
		'handphone'   		=>  [
			'required'		=> 'Data Handphone  Wajib Di isi'
		],
		'tahun'   		=>  [
			'required'		=> 'Data Tahun Wajib Di isi'
		],
	];


	// validasi untuk daftar maal 
	public $daftarmaal = [
		'idpengurus'		=> 'required',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status'   			=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',

	];

	public $daftarmaal_errors = [

		'idpengurus'     	=> [
			'required'		=> 'Pengurus Wajib Di isi'
		],
		'nama'     			=> [
			'required'		=> 'Data nama Wajib Di isi'
		],
		'alamat'   		=> [
			'required'		=> 'Data Alamat Wajib Di isi'
		],
		'status'   			=>  [
			'required'		=> ' Data Status Wajib Di isi'
		],
		'handphone'   		=>  [
			'required'		=> 'Data Handphone  Wajib Di isi'
		],
		'tahun'   		=>  [
			'required'		=> 'Data Tahun Wajib Di isi'
		],
	];


	// validasi untuk daftar zakat 
	public $daftarzakat = [
		'idpengurus'		=> 'required',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status'   			=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',

	];

	public $daftarzakat_errors = [

		'idpengurus'     	=> [
			'required'		=> 'Pengurus Wajib Di isi'
		],
		'nama'     			=> [
			'required'		=> 'Data nama Wajib Di isi'
		],
		'alamat'   		=> [
			'required'		=> 'Data Alamat Wajib Di isi'
		],
		'status'   			=>  [
			'required'		=> ' Data Status Wajib Di isi'
		],
		'handphone'   		=>  [
			'required'		=> 'Data Handphone  Wajib Di isi'
		],
		'tahun'   		=>  [
			'required'		=> 'Data Tahun Wajib Di isi'
		],
	];


	// validasi untuk daftar yatim dan zompo 
	public $daftarynz = [
		'idpengurus'		=> 'required',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status_ynz'   		=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',

	];

	public $daftarynz_errors = [

		'idpengurus'     	=> [
			'required'		=> 'Pengurus Wajib Di isi'
		],
		'nama'     			=> [
			'required'		=> 'Data nama Wajib Di isi'
		],
		'alamat'   		=> [
			'required'		=> 'Data Alamat Wajib Di isi'
		],
		'status_ynz'   			=>  [
			'required'		=> ' Data Status Wajib Di isi'
		],
		'handphone'   		=>  [
			'required'		=> 'Data Handphone  Wajib Di isi'
		],
		'tahun'   		=>  [
			'required'		=> 'Data Tahun Wajib Di isi'
		],
	];


	// validasi untuk Agenda
	public $agenda = [
		'idpengurus'			=> 'required',
		'nama'     			 	=> 'required',
		'tanggal'     			=> 'required',
		'tempat'   				=> 'required',
		'keterangan'   			=> 'required',
		'tgl_post'   			=> 'required',
	];

	public $agenda_errors = [

		'idpengurus'     	=> [
			'required'		=> 'Pengurus wajib Di isi'
		],

		'nama'     			=> [
			'required'		=> 'Data nama Wajib Di isi'
		],
		'tanggal'   		=> [
			'required'		=> 'Data tanggal Wajib Di isi'
		],
		'tempat'   			=>  [
			'required'		=> 'Data Tempat Acara Wajib Di isi'
		],
		'keterangan'   			=>  [
			'required'		=> 'Data Keterangan Wajib Di isi'
		],
		'tgl_post'   			=>  [
			'required'		=> 'Data Post Acara Wajib Di isi'
		]
	];

	// validasi untuk daftar Muazin 
	public $berita = [
		'idpengurus'		=> 'required',
		'gambar'				=> 'uploaded[gambar]|mime_in[gambar,image/jpg,image/jpeg,image/gif,image/png]|max_size[gambar,2000]',
		'judul'     			=> 'required',
		'isi'     		=> 'required',
		'tanggal'   			=> 'required',

	];

	public $berita_errors = [

		'idpengurus'     	=> [
			'required'		=> 'Pengurus Wajib Di isi'
		],

		'gambar'     			=> [
			'mime_in'   => 'Gambar berita hanya boleh diisi dengan jpg, jpeg, png atau gif.',
			'max_size'  => 'Gambar berita maksimal 2mb',
			'uploaded'  => 'Gambar berita wajib diisi'
		],

		'judul'     			=> [
			'required'		=> 'Data judul Wajib Di isi'
		],
		'isi'   		=> [
			'required'		=> 'Data Isi Wajib Di isi'
		],
		'tanggal'   			=>  [
			'required'		=> ' Data Tanggal Wajib Di isi'
		],
	];


	// validasi untuk daftar users 
	public $users = [
		'nama_user'				=> 'required',
		'username'     			=> 'required',
		'password'     			=> 'required',
		'level'   				=> 'required',

	];

	public $users_errors = [

		'nama_user'     	=> [
			'required'		=> 'Nama Users Wajib Di isi'
		],

		'username'     			=> [
			'required'		=> 'Username Wajib Di isi'
		],
		'password'   		=> [
			'required'		=> 'Password Wajib Di isi'
		],
		'level'   			=>  [
			'required'		=> 'Level Hak Akses Wajib Di isi'
		],
	];


	// validasi untuk daftar marbot 
	public $daftarremaja = [
		'idpengurus'		=> 'required',
		'nama'     			=> 'required',
		'alamat'     		=> 'required',
		'status'   			=> 'required',
		'handphone'   		=> 'required',
		'tahun'   			=> 'required',

	];

	public $daftarremaja_errors = [

		'idpengurus'     	=> [
			'required'		=> 'Pengurus Wajib Di isi'
		],

		'nama'     			=> [
			'required'		=> 'Data nama Wajib Di isi'
		],
		'alamat'   		=> [
			'required'		=> 'Data Alamat Wajib Di isi'
		],
		'status'   			=>  [
			'required'		=> ' Data Status Wajib Di isi'
		],
		'handphone'   		=>  [
			'required'		=> 'Data Handphone  Wajib Di isi'
		],
		'tahun'   		=>  [
			'required'		=> 'Data Tahun Wajib Di isi'
		],
	];
}
