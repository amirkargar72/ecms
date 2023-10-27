<?php

namespace App\Http\Controllers;

use App\Header;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function main()
    {
        $header = Header::first() ?? new header;
        
        return view('index',compact('header'));
    }
}
