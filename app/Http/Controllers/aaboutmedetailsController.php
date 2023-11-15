<?php

namespace App\Http\Controllers;

use App\aboutme_details;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class aaboutmedetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.aboutme-details.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = aboutme_details::create($request->all());

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $path = $file->hashName('photo');
            $image = Image::make($file);

            $image->fit(300, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $img_canvas = Image::canvas(936, 576);
            // $img_canvas->insert($image);
            // $img_canvas->insert(public_path('overlay.png'), 'top-right'); // add offset
            // $img_canvas->save('canvas_horizontal.png', 100);
            $id = aboutme_details::orderBy('id','DESC')->limit(1)->get();
            foreach($id as $id) $id = $id->id;

            $path = 'uploads/aboutme_details' . $path;
            Storage::put($path, (string) $image->encode());
            aboutme_details::where('id',$id)->update([
                'photo'=>$path
            ]);
        }

        if($insert){
            Session::flash('success','value');
            return redirect()->route('aboutmedetails.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\aboutme_details  $aboutme_details
     * @return \Illuminate\Http\Response
     */
    public function show(aboutme_details $aboutme_details)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\aboutme_details  $aboutme_details
     * @return \Illuminate\Http\Response
     */
    public function edit(aboutme_details $aboutme_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\aboutme_details  $aboutme_details
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, aboutme_details $aboutme_details)
    {
        $update = aboutme_details::find($request->id)->update($request->all());

        if($request->hasFile('photo')){
            $file = $request->file('photo');
            $path = $file->hashName('photo');
            $image = Image::make($file);

            $image->fit(300, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            // $img_canvas = Image::canvas(936, 576);
            // $img_canvas->insert($image);
            // $img_canvas->insert(public_path('overlay.png'), 'top-right'); // add offset
            // $img_canvas->save('canvas_horizontal.png', 100);
            $path = 'uploads/client' . $path;
            Storage::put($path, (string) $image->encode());
            aboutme_details::where('id',$request->id)->update([
                'photo'=>$path
            ]);
        }

        if($update){
            Session::flash('success','value');
            return redirect()->route('aboutmedetails.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\aboutme_details  $aboutme_details
     * @return \Illuminate\Http\Response
     */
    public function destroy(aboutme_details $aboutme_details,Request $request)
    {
        $delete= aboutme_details::find($request->id)->delete();
        if($delete){
            Session::flash('success','value');
            return redirect()->route('aboutmedetails.index');
        }
    }
}
