<?php

namespace App\Http\Controllers;

use App\Models\ask;
use Illuminate\Http\Request;
use App\Models\contact_message;
use App\Models\gallery;
use App\Models\video;
use App\Models\newsPost;
use App\Models\NewsPostCount;
use Session;
use Carbon\Carbon;

class websiteController extends Controller
{
    public function index()
    {
        return view('website.index');
    }

    public function gallery($slug)
    {
        $select = gallery::paginate(8);
        return view('blog.photo', compact('slug'), ['select' => $select]);
    }

    public function video($slug)
    {
        $select = video::paginate(8);
        return view('blog.video', compact('slug'), ['select' => $select]);
    }

    public function blog_view($category, $slug)
    {

        $item = newspost::where('slug', $slug)->where('category', $category)->firstOrFail();
        // dd( $item);
       
            $news_post = new NewsPostCount();
            $news_post->blog_id = $item->id;
            $news_post->total_count = $news_post->total_count + 1;
            $news_post->save();
       

        return view('blog.blog_details', compact('slug', 'item', 'category'));
    }

    public function blog_category($slug)
    {
        $select = newspost::where('category', $slug)->where('status', 1)->orderBy('id', 'desc')->paginate(8);
        return view('blog.index', compact('slug'), ['select' => $select]);
    }

    public function contact()
    {
        return view('website.contact');
    }
    public function message()
    {
        $slug = 'contact' . uniqid(25);
        $insert = contact_message::insert([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'subject' => $_POST['subject'],
            'message' => $_POST['message'],
            'slug' => $slug,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($insert) {
            return redirect()->route('website_contact');
        }
    }

    public function single_category_post_search(Request $request)
    {
        $search = $request['search'];
        // dd($search);
        $select = newsPost::where('status', 1)->where('category', $search)->orWhere('heading', 'like', '%' . $search . '%')->orWhere('description', 'like', '%' . $search . '%')->orderBy('id', 'desc')->paginate(8);
        // dd($select);
        $slug = 'সার্চ রেজাল্ট';
        return view('blog.search-index', ['select' => $select], compact('slug'));
    }

    public function ask_view($slug)
    {
        return view('blog.ask', compact('slug'));
    }

    public function ask_post($slug, Request $request)
    {
        $sl = $_POST['name'] . uniqid('15');

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'ask' => 'required',
        ]);

        $insert = ask::insert([
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'address' => $_POST['address'],
            'ask' => $_POST['ask'],
            'slug' => $sl,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($insert) {
            return redirect()->route('website_ask', 'জিজ্ঞাসা')->with('success', 'আপনার জিজ্ঞাসার জন্য ধন্যবাদ');
        }
    }
}
