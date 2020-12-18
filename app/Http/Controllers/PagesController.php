<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function indexabout (){
        return view('about');
    }

    public function indexcontact (){
        return view ('contactus');
    }
}
