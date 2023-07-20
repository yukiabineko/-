<?php

namespace App\Http\Controllers;

use App\Models\Daily;
use Illuminate\Http\Request;

class DailyController extends Controller
{
  /************************************* */
  /**
   * 日替わり生鮮一覧
   */
  public function index(){
    $dailies = Daily::getDaily();
    return view('dailies.index',[
      'products' => $dailies
    ]);
  }
}
