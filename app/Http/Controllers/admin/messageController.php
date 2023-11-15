<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use auth;
use Carbon\Carbon;
use image;
use App\contact_message;

class messageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $all=contact_message::where('status',1)->get();
        $count=contact_message::where('status',1)->count();
        $countTrash=contact_message::where('status',0)->count();
     	return view('admin.contact_message.all_mail',compact('all','count','countTrash'));
    }

    // soft delete multiple
    // soft delete data
    public function soft_delete_multiple(Request $request){
        $delete = $request->input('delete_multiple');
        contact_message::whereIn('id',$delete)->update([
            'status'=>0,
            'updated_at'=>Carbon::now()->toDateTimeString()
        ]);
        return redirect('/admin/message')->with('sucee','product deleted successfully');
    }

    // trash view of messages
    public function trashView(){
        $all=contact_message::where('status',0)->get();
        $count=contact_message::where('status',1)->count();
        $countTrash=contact_message::where('status',0)->count();
        return view('admin.contact_message.all_trash',compact('all','count','countTrash'));
    }

    // permenent delete multiple data
    public function hard_delete_multiple(Request $request){
        $delete = $request->input('delete_multiple');
        contact_message::whereIn('id',$delete)->delete();
        return redirect()->route('message_trash');
    }

    // view single message

    public function view(Request $request,$slug){
        $data=contact_message::where('slug',$slug)->firstOrFail();
        $count=contact_message::where('status',1)->count();
        $countTrash=contact_message::where('status',0)->count();
        return view('admin.contact_message.view',compact('data','count','countTrash'));
    }

}
