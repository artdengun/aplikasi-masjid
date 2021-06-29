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
		return view("frontend/contact");
	}
	public function about()
	{
		return view("frontend/about");
	}
}
