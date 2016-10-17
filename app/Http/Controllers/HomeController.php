<?php

namespace LaForum\Http\Controllers;

use Illuminate\Http\Request;

use LaForum\Http\Requests;

class HomeController extends Controller
{
    public function index() {
        return View('home');
    }
}
