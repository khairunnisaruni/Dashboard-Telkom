<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
   public function showAbout()
    {
        return view('about');
    }

     public function showAboutUser()
    {
        return view('user.about-user');
    }
}
