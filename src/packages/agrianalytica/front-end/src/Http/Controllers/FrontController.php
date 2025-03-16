<?php
namespace Agrianalytica\FrontEnd\Http\Controllers;

use Illuminate\Routing\Controller;

class FrontController extends Controller
{
    public function index()
    {
        return view('front::home');
    }
}
