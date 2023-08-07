<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class shopController extends Controller
{
  /***********店舗情報ページ****************************************** */
  public function index(){
    return view('shops.index');
  }
}
