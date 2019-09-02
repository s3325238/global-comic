<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorHandlingController extends Controller
{
    public function dashboardMiddleware(){
        return view('errors.testingAbort');
    }

    public function notfound()
    {
        return view('errors.404');
    }
}
