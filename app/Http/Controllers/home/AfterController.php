<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AfterController extends Controller
{
  public function create(){
      return view('home.after.create');
  }
}
