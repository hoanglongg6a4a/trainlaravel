<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
  public function index($id)
  {
    return 'home có id= '.$id;
  }
}
