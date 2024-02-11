<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailPageConrtoller extends Controller
{
    public function index(){
        return view('mailPage');
    }
}
