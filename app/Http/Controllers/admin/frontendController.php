<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\Http\Controllers\Controller;

class frontendController extends Controller
{
    public function index(){
        return view('admin.frontend.text');
    }
}
