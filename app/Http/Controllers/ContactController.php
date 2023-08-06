<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
/*************お問合せページ*********************************************************************** */
    public  function create(){
        return view('contacts.create');
    }
}
