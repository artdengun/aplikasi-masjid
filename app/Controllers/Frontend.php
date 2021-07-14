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

	public function blog()
	{
		return view("frontend/blog");
	}

	public function blogSingle()
	{
		return view("frontend/blog-single");
	}
	public function galleryColTwo()
	{
		return view("frontend/gallery-col-2");
	}
}
