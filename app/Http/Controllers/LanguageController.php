<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Config;


class LanguageController extends Controller{

    public function changeLanguage($language){
        session(['locale' => $language]);
        App::setLocale($language);
        return back();
    }
    

}

