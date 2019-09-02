<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __construct()
    {
        $this->middleware('dashboard');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function mail()
    {
        return view('admin.mail_box.inbox');
    }
}
