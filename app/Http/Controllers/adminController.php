<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use session;
use auth;
use Carbon\Carbon;
use App\Http\Middleware\PreventBackButton;
use App\frontlogo;

class adminController extends Controller
{
    public function __construct()
    {
        // $this->middleware('preventBackButton');
        // $this->middleware('auth');
    }

    public function view(){
        return view('admin.index');
    }
}
