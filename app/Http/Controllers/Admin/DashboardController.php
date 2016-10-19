<?php
namespace LaForum\Http\Controllers\Admin;


class DashboardController extends Controller 
{
    public function index()
    {
         return view('admin.index', [
            
        ]);
    }
}