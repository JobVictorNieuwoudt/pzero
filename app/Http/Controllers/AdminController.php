<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index() {
        $data = $this->getJson();
        return view('index', compact('data'));
    }      

    public function getJson() {
        $json = file_get_contents('C:\XAMPP\htdocs\pzero\public\textfiles\data.json');
        $data = json_decode($json, true);
    
        return $data;
    }
}
