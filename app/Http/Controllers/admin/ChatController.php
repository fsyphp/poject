<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChatController extends Controller
{
    public function chat()
    {
    	return view('admin.chat.chat');
    }

    public function create(Request $request)
    {	
    	$content = $request -> input('content');
    	// $content = dump($content);
    	// echo $content;die;  
    	session(['contentg'=>$content]);
    	// echo session('contentg');
    }
}
