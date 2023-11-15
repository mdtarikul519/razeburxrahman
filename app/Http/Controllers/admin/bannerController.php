<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\banner;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Session;

class bannerController extends Controller
{
    public function index(){
        return view('admin.banner.index');
    }

    public function add(Request $request){
        $slug = 'banner'.uniqid(20);
        $insert = banner::insert([
            'slug'=>$slug,
            'created_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('banner_img')){
            $file=$request->file('banner_img');
            $path=Storage::putFile('uploads/banner',$file);
            banner::where('slug',$slug)->update([
                'banner_img'=>$path
            ]);
        }

        if($insert){
            Session::flash('success','value');
            return redirect()->route('banner');
        }
    }

    public function update(Request $request,$slug){
        $update = banner::where('slug',$slug)->update([
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('banner_img')){
            $delete=banner::where('slug',$slug)->select('banner_img')->firstOrFail();
            Storage::disk('public')->delete($delete->photo);
            $file=$request->file('banner_img');
            $path=Storage::putFile('uploads/banner',$file);
            banner::where('slug',$slug)->update([
                'banner_img'=>$path
            ]);
        }

        if($update){
            Session::flash('success','value');
            return redirect()->route('banner');
        }
    }

    public function soft(Request $request,$slug){
        $soft=banner::where('slug',$slug)->update([
            'status' => 0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);

        if($soft){
            Session::flash('success','value');
            return redirect()->route('banner');
        }
    }

    public function restore(Request $request,$slug){
        $soft=banner::where('slug',$slug)->update([
              'status' => 1
        ]);
        if($soft){
            Session::flash('success','value');
            return redirect()->route('banner');
        }
    }

    public function delete(Request $request,$slug){
        $delete=banner::where('slug',$slug)->delete();
        if($delete){
            Session::flash('success','value');
            return redirect()->route('banner');
        }
    }



}
