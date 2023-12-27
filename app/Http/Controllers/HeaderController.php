<?php

namespace App\Http\Controllers;

use App\Header;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\This;
use App\HeaderMobilePhoto;


class HeaderController extends Controller
{
  public function __construct()
  {
    $this->middleware('admin');
  }




  public function edit(Header $header)
  {
    return view('headers.edit', compact('header'));
  }

  public function update(Request $request, Header $header)
  {

    $data = $request->validate([
      'title' => 'nullable',
      'btn_name' => 'nullable',
      'btn_link' => 'nullable',
      'description' => 'nullable|string|max:1000',
      'mobile_visible' => 'nullable|boolean',
      'preloader' => 'nullable|boolean',
      'bg_path' => 'nullable|mimes:jpg,png,bmp,tiff|max:2000',
    ]);
    if( $photo = $request->bg_path){
      $data['bg_path'] = upload($photo,$header->bg_path);
    }
          if  ( $sliders = $request->slider ) {
              foreach ($sliders as $slider) {
            $path= upload($slider);
            HeaderMobilePhoto::make($path);
              }
          }

    $header->update($data);
    return back()->withMessage('هدر با موفقیت ویرایش شد');
  }
}
