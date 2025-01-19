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
	public function informasiAcara()
	{
		return view("frontend/informasi-acara");
	}
	public function laporanKeuangan()
	{
		return view("frontend/laporan-keuangan");
	}
}
