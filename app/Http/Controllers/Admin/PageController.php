<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\System\Models\Page;

class PageController extends Controller
{
    public function index()
    {
        return view('page.index');
    }

    public function all()
    {
        return $this->jsonPagination(Page::with('user')->paginate(getPaginatePerPage()));
    }
}