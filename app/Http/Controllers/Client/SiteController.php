<?php

namespace App\Http\Controllers\Client;


use App\Http\Controllers\Controller;

class SiteController extends Controller
{
	public function index()
	{
	    $content = str_replace([
	            'href="/',
                'src="/'
            ], [
                'href="/funlib/',
                'src="/funlib/'
            ], file_get_contents('funlib/index.html'));
		return view('funlib.index', ['content' => $content]);
	}
}