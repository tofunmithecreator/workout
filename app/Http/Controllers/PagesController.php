<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
  public function index(){
    $title = 'Welcome to my HomePage';
    return view('pages.home')->with('title',$title);
  }
  public function about(){
    $title = 'About Us';
    return view('pages.about')->with('title',$title);
  }
  public function services(){
    $data = array(
      'title' => 'Services',
      'services' => ['Web Design', 'Mobile Development' , 'SEO' ]
    );
    return view('pages.services')->with($data);
  }
}
