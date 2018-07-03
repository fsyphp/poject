<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
  public function index(){
      return view('admin.layout.header');
  }
  public function indexs(){
    // dd(1);
    return view('admin.user.index');
  }
  public function add(){
    return view('admin.user.add');
  }
}
