<?php

namespace App\Http\Controllers;
use App\Models\aboutme_details;
use Illuminate\Http\Request;

class blogController extends Controller
{
    public function index(Request $request){
        return view('blog.index');
    }

    public function programming(Request $request){

    }

    public function about(Request $request){
        $slug = 'পরিচিতি';
        $select = aboutme_details::get();
        return view('blog.about',compact('slug','select'));
    }

    public function lifestyle(Request $request){

    }

    public function blog_details(Request $request){
        return view('blog.blog_details');
    }

    public function all_blog(Request $request){
        return view('blog.all_blog');
    }

    public function search(Request $request){
        return view('blog.search');
    }
}
