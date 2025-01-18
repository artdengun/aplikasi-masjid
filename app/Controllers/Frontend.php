<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Frontend extends BaseController
{
	public function frontend()
	{
		return view("frontend/index");
	}
	public function kontak()
	{
		return view("frontend/kontak");
	}
	public function sejarah()
	{
		return view("frontend/sejarah");
	}

	public function layanan()
	{
		return view("frontend/layanan");
	}

	public function informasiAcara()
	{
		return view("frontend/informasi-acara");
	}
	public function laporanArusKas()
	{
		return view("frontend/laporan-arus-kas");
	}
	public function laporanTahunan()
	{
		return view("frontend/laporan-tahunan");
	}
	public function laporanKotakJumat()
	{
		return view("frontend/laporan-kotak-jumat");
	}
}
