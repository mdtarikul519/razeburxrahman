<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\user_role;
use Carbon\Carbon;
use Image;
use Session;
use Auth;

class userRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $all=user_role::where('status',1)->orderBy('role_serial','ASC')->get();
        return view('admin.user_role.all',compact('all'));
    }

    public function add(Request $request){
        $slug = 'slug'.uniqid(20);
        $check = user_role::select('role_serial')->get();
        foreach($check as $data)
        {
            if($data->role_serial == $_POST['serial']){
                Session::flash('error','value');
                return redirect()->route('user_role_index');
            }
        }
        $insert=user_role::insert([
            'role_name' => $_POST['name'],
            'role_serial' => $_POST['serial'],
            'slug' => $slug,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect()->route('user_role_index');
        }
    }

    public function update(Request $request,$slug){

        $insert=user_role::where('slug',$slug)->update([
            'role_name' => $_POST['name'],
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if($insert){
            Session::flash('success','value');
            return redirect()->route('user_role_index');
        }

    }

    public function delete(Request $request,$slug){
        $delete=user_role::where('slug',$slug)->delete();
        if($delete){
            Session::flash('success','value');
            return redirect()->route('user_role_index');
        }
    }
}
