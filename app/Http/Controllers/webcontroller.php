<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home() {
        return view('front.home');
    }

    public function chieusang() {
        return view('front.chieusang');
    }

    public function index() {
        return view('front.index');
    }
}
