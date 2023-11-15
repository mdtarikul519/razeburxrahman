<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\aboutme;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Session;
use Image;


class aboutmeController extends Controller
{
    public function index(Request $request){
        return view('admin.aboutme.index');
    }

    public function update(Request $request,$slug){
        $update = aboutme::where('slug',$slug)->update([
            'details' => $_POST['details'],
            'post' => $_POST['post'],
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if($request->hasFile('image')){
            $file=$request->file('image');
            $path = $file->hashName('image');
            $image = Image::make($file);
            $image->fit(280, 380, function ($constraint) {
                $constraint->aspectRatio();
            });
            $path = 'uploads/cp-profile/'.$path;
            Storage::put($path, (string) $image->encode());

            aboutme::where('slug',$slug)->update([
                'image'=>$path
            ]);
        }

        if($update){
            Session::flash('success','value');
            return redirect()->route('aboutme');
        }
    }
}
