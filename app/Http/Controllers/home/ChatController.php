<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class ChatController extends Controller
{
    public function indexs()
    {
    	return view('home.layout.chat');
    }

    public function chat()
    {
    	return view('home.chat.chat');
    }

    public function create(Request $request)
    {	
    	$content = $request -> input('content');
    	// $content = dump($content);
    	session(['contenty'=>$content]);
    	
    }

}
