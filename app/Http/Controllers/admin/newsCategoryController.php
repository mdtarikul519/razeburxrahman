<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\newsCategory;
use Carbon\Carbon;
use Image;
use Session;
use Auth;

class newsCategoryController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }

    public function index(Request $request){
        $select = newsCategory::where('status',1)->get();
        $deactive = newsCategory::where('status',0)->get();
        $i=1;
        return view('admin.news_categories.index',compact('select','i','deactive'));
    }

    public function add(Request $request){
        $slug = 'slug'.uniqid(20);
        $creator = Auth::user()->name;
        $insert = newsCategory::insert([
            'name' => $_POST['name'],
            'slug' => $slug,
            'created_by' => $creator,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect()->route('news_category');
        }
    }

    public function update(Request $request,$slug){
        $update=newsCategory::where('slug',$slug)->update([
            'name' => $_POST['name'],
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if($update){
            Session::flash('success','value');
            return redirect()->route('news_category');
        }
    }

    public function soft_delete(Request $request,$slug){
        $soft=newsCategory::where('slug',$slug)->update([
            'status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success','value');
            return redirect()->route('news_category');
        }
    }

    public function restore(Request $request,$slug){
        $soft=newsCategory::where('slug',$slug)->update([
            'status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success','value');
            return redirect()->route('news_category');
        }
    }

    public function hard_delete(Request $request,$slug){
        $hard_delete=newsCategory::where('slug',$slug)->delete();
        if($hard_delete){
            Session::flash('success','value');
            return redirect()->route('news_category');
        }
    }
}
