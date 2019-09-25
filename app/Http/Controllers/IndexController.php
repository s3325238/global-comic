<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Videos;
use App\Settings;

class IndexController extends Controller
{

    public function index(){
        $locale = app()->getLocale();

        return view('ui.app',compact(['locale']));
        // return view('ui.app')->with('locale',$locale);
    }

    /**
     * Need to remove when making auth
     */
    // public function testLogin(){
    //     return view('ui.pages.login');
    // }
}
