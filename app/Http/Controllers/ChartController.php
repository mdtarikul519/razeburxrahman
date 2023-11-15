<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\events\real_time_chat_event;

class ChartController extends Controller
{
    public function index()
    {
        event(new real_time_chat_event('hello world'));
        return view('admin.chat');
    }
}
