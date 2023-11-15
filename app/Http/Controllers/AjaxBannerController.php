<?php

namespace App\Http\Controllers;

use App\AjaxBanner;
use Illuminate\Support\Facades\Storage;
use Image;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AjaxBannerController extends Controller
{
    public function index()
    {
        return view('admin.ajax-banner.index');
    }

    public function add(Request $request)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = Storage::putFile('uploads/ajax_banner', $file);
        }
        else
            $path = '';

        $insert = AjaxBanner::insert([
            'title' => $request->title,
            'image' => $path,
            'sub_title' => $request->sub_title,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);
        
        // if ($insert) {
        //     Session::flash('success', 'value');
        //     return redirect()->route('ajax_banner');
        //     // return response()->json($insert);
        // }
    }

    public function update(Request $request,$id)
    {
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = Storage::putFile('uploads/ajax_banner', $file);
            AjaxBanner::where('id',$id)->update([
                'image' => $path
            ]);
        }
        $insert = AjaxBanner::where('id',$id)->update([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($insert) {
            Session::flash('success', 'value');
            return redirect()->route('ajax_banner');
        }
    }

    public function delete($id)
    {
        $delete = AjaxBanner::where('id',$id)->update([
            'status' => 0
        ]);
        if($delete){
            return redirect()->route('ajax_banner');
        }
    }
}
