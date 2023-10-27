<?php

namespace App\Http\Controllers;

use App\Header;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;

class HeaderController extends Controller
{
    public function __construct() 
    {
        $this->middleware('admin');
        
    }

    

    
    public function edit(Header $header)
    {
        return view('headers.edit',compact('header'));
    }

    public function update(Request $request, Header $header)
    {
      
      $data= $request->validate([
        'title' =>'nullable|',
        'btn-name' =>'nullable|',
        'btn-link' =>'nullable|',
        'description' =>'nullable|string|max:1000',
        'mobile_visible' =>'nullable|boolean',
        'preloader' => 'nullable|boolean',
      ]);

      $header->update($data);
    }

  
}