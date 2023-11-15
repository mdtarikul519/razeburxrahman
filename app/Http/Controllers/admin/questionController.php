<?php

namespace App\Http\Controllers\admin;

use App\models\ask;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class questionController extends Controller
{
    public function index(Request $request){
        return view('admin.questions.index');
    }
    public function delete(Request $request,$slug){
        $delete = ask::where('slug',$slug)->delete();
        if($delete){
            Session::flash('success', 'value');
            return redirect()->route('admin.questions');
        }
            
    }
}
