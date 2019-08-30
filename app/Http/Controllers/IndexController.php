<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $locale = app()->getLocale();
        return view('ui.app')->with('locale',$locale);
    }

    /**
     * Need to remove when making auth
     */
    // public function testLogin(){
    //     return view('ui.pages.login');
    // }
}
