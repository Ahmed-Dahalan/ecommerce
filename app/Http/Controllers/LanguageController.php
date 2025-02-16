<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    //

    public function Arabic()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'arabic');
        return redirect()->back();
    }

    public function English()
    {
        session()->get('language');
        session()->forget('language');
        Session::put('language', 'english');
        return redirect()->back();
    }

}
