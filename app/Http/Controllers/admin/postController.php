<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\newsPost;
use App\Models\gallery;
use App\Models\video;
use Carbon\Carbon;
use Image;
use Session;
use Illuminate\Support\Facades\Storage;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\NewsPostCount;

class postController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        return view('admin.post.index');
    }

       public function all_view_count(){
        $all_blog = NewsPostCount::get()->groupBy('blog_id');
        //dd($all_blog);
        return view('admin.post.all_blog_count', compact('all_blog'));
       }
    public function blog_view($slug)
    {
        $blogCount = newsPost::withCount('news_post_count')->where('slug', $slug)->orderBy('created_at', 'desc')->first();
        return view('admin.post.blog_view', compact('blogCount'));
    }

    public function top_left_news(Request $request)
    {
        return view('admin.post.top_left_news');
    }

    public function top_right_news(Request $request)
    {
        return view('admin.post.top_right_news');
    }

    public function top_bottom_news(Request $request)
    {
        return view('admin.post.top_bottom_news');
    }

    public function latest_news(Request $request)
    {
        return view('admin.post.latest_news');
    }

    public function category_wise_view(Request $request, $category)
    {
        $select = newsPost::where('category', $category)->where('status', 1)->orderBy('id', 'desc')->get();
        $deactive = newsPost::where('category', $category)->where('status', 0)->orderBy('id', 'desc')->get();
        $i = 1;
        return view('admin.post.category_view', compact('select', 'deactive', 'category', 'i'));
    }

    public function add_view(Request $request)
    {
        return view('admin.post.add');
    }

    public function add(Request $request)
    {
        $last = newsPost::limit(1)->orderBy('id', 'DESC')->get();
        foreach ($last as $sl) $sl = $sl->slug;
        $slug = $sl + 1;

        $creator = Auth::user()->name;
        // $creator_photo = Auth::user()->photo;
        $insert = newsPost::insert([
            'description' => $_POST['content'],
            'category' => $_POST['category'],
            'category2' => $_POST['category2'],
            'category3' => $_POST['category3'],
            'heading' => $_POST['heading'],
            'post_head_image' => '',
            // 'tag' => $_POST['tag'],
            'video_link' => $_POST['video_link'],
            'slug' => $slug,
            'creator' => $creator,
            // 'creator_photo' => $creator_photo,
            'created_at' => Carbon::now()->toDateTimeString("Asia/Dhaka")
        ]);
        if ($request->hasFile('post_head_image')) {
            $file = $request->file('post_head_image');
            $path = $file->hashName('post_head_image');
            $image = Image::make($file);
            $image->fit(936, 576, function ($constraint) {
                $constraint->aspectRatio();
            });
            $path = 'uploads/' . $path;
            Storage::put($path, (string) $image->encode());

            newsPost::where('slug', $slug)->update([
                'post_head_image' => $path
            ]);
        }

        if ($insert) {
            Session::flash('success', 'value');
            return redirect()->route('post_view', $slug);
            // return redirect()->route('post_add_view');
        }
    }

    public function view(Request $request, $slug)
    {
        // $total_view = newsPost::where('slug',$slug)->firstOrFail();
        // $total_view = $total_view->total_view;
        // $total_view++;
        // $total_view_update = newsPost::where('slug',$slug)->update([
        //     'total_view' => $total_view
        // ]);
        $select = newsPost::where('slug', $slug)->firstOrFail();
        return view('admin.post.view', compact('select'));
    }

    public function update_view(Request $request, $slug)
    {
        $select = newsPost::where('slug', $slug)->firstOrFail();
        return view('admin.post.update', compact('select'));
    }

    public function update(Request $request, $slug)
    {
        $updates = newsPost::where('slug', $slug)->update([
            'description' => $_POST['content'],
            'category' => $_POST['category'],
            'category2' => $_POST['category2'],
            'category3' => $_POST['category3'],
            'video_link' => $_POST['video_link'],
            'heading' => $_POST['heading'],
            // 'tag' => $_POST['tag'],
            'updated_at' => Carbon::now()->toDateTimeString("Asia/Dhaka")
        ]);

        if ($request->hasFile('post_head_image')) {
            $delete = newsPost::where('slug', $slug)->select('post_head_image')->firstOrFail();
            Storage::disk('public')->delete($delete->post_head_image);
            $file = $request->file('post_head_image');
            $path = $file->hashName('post_head_image');
            $image = Image::make($file);
            $image->fit(936, 576, function ($constraint) {
                $constraint->aspectRatio();
            });
            $path = 'uploads/' . $path;
            Storage::put($path, (string) $image->encode());

            newsPost::where('slug', $slug)->update([
                'post_head_image' => $path
            ]);
        }

        if ($updates) {
            Session::flash('success', 'value');
            return redirect()->route('post_view', $slug);
        }
    }

    public function soft_delete(Request $request, $slug)
    {
        $soft = newsPost::where('slug', $slug)->update([
            'status' => 0,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($soft) {
            Session::flash('success', 'value');
            return redirect()->route('post_view', $slug);
        }
    }

    public function restore(Request $request, $slug)
    {
        $restore = newsPost::where('slug', $slug)->update([
            'status' => 1,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($restore) {
            Session::flash('success', 'value');
            return redirect()->route('post_view', $slug);
        }
    }

    // latest news

    public function add_to_latest_news(Request $request, $slug)
    {
        $restore = newsPost::where('slug', $slug)->update([
            'add_to_latest_news' => 1,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($restore) {
            Session::flash('success', 'value');
            return redirect()->route('latest_news');
        }
    }

    public function remove_from_latest_news(Request $request, $slug)
    {
        $restore = newsPost::where('slug', $slug)->update([
            'add_to_latest_news' => 0,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($restore) {
            Session::flash('success', 'value');
            return redirect()->route('latest_news');
        }
    }


    // top left news

    public function add_to_top_left(Request $request, $slug)
    {
        $restore = newsPost::where('slug', $slug)->update([
            'add_to_top_left' => 1,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($restore) {
            Session::flash('success', 'value');
            return redirect()->route('top_left_news');
        }
    }

    public function remove_from_top_left(Request $request, $slug)
    {
        $restore = newsPost::where('slug', $slug)->update([
            'add_to_top_left' => 0,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($restore) {
            Session::flash('success', 'value');
            return redirect()->route('top_left_news');
        }
    }

    // top right news

    public function add_to_top_right(Request $request, $slug)
    {
        $restore = newsPost::where('slug', $slug)->update([
            'add_to_top_right' => 1,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($restore) {
            Session::flash('success', 'value');
            return redirect()->route('top_right_news');
        }
    }

    public function remove_from_top_right(Request $request, $slug)
    {
        $restore = newsPost::where('slug', $slug)->update([
            'add_to_top_right' => 0,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($restore) {
            Session::flash('success', 'value');
            return redirect()->route('top_right_news');
        }
    }

    // top bottom news

    public function add_to_top_bottom(Request $request, $slug)
    {
        $restore = newsPost::where('slug', $slug)->update([
            'add_to_top_bottom' => 1,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($restore) {
            Session::flash('success', 'value');
            return redirect()->route('top_bottom_news');
        }
    }

    public function remove_from_top_bottom(Request $request, $slug)
    {
        $restore = newsPost::where('slug', $slug)->update([
            'add_to_top_bottom' => 0,
            'updated_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($restore) {
            Session::flash('success', 'value');
            return redirect()->route('top_bottom_news');
        }
    }

    // hard delete post

    public function hard_delete(Request $request, $slug)
    {
        $delete = newsPost::where('slug', $slug)->delete();

        if ($delete) {
            Session::flash('success', 'value');
            return redirect()->route('post');
        }
    }

    // gallery part

    public function photo_view(Request $request)
    {
        return view('admin.post.photo');
    }

    public function video_view(Request $request)
    {
        return view('admin.post.video');
    }

    public function photo_add(Request $request)
    {
        $slug = 'slug' . uniqid(20);

        $insert = gallery::insert([
            'slug' => $slug,
            'creator' => Auth::user()->name,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $path = $file->hashName('photo');
            $image = Image::make($file);
            $image->fit(936, 576, function ($constraint) {
                $constraint->aspectRatio();
            });
            $path = 'uploads/thumb_gallery' . $path;
            Storage::put($path, (string) $image->encode());

            // $path=Storage::putFile('uploads/photo_gallery',$file);
            gallery::where('slug', $slug)->update([
                'photo' => $path
            ]);
        }

        if ($insert) {
            Session::flash('success', 'value');
            return redirect()->route('post_add_photo_view');
        }
    }
    public function photo_delete(Request $request, $slug)
    {
        $delete = gallery::where('slug', $slug)->select('photo')->firstOrFail();
        Storage::disk('public')->delete($delete->photo);
        $delete = gallery::where('slug', $slug)->delete();
        if ($delete) {
            Session::flash('success', 'value');
            return redirect()->route('post_add_photo_view');
        }
    }

    public function video_add(Request $request)
    {
        $slug = 'slug' . uniqid(20);

        $insert = video::insert([
            'slug' => $slug,
            'link' => $_POST['link'],
            'heading' => $_POST['heading'],
            'thumb' => '',
            'creator' => Auth::user()->name,
            'created_at' => Carbon::now()->toDateTimeString()
        ]);

        if ($request->hasFile('thumb')) {
            $file = $request->file('thumb');
            $path = $file->hashName('thumb');
            $image = Image::make($file);
            $image->fit(936, 576, function ($constraint) {
                $constraint->aspectRatio();
            });
            $path = 'uploads/' . $path;
            Storage::put($path, (string) $image->encode());
            // $path=Storage::putFile('uploads/thumb_gallery',$file);

            video::where('slug', $slug)->update([
                'thumb' => $path
            ]);
        }

        if ($insert) {
            Session::flash('success', 'value');
            return redirect()->route('post_add_video_view');
        }
    }
    public function video_delete(Request $request, $slug)
    {
        $delete = video::where('slug', $slug)->delete();
        if ($delete) {
            Session::flash('success', 'value');
            return redirect()->route('post_add_video_view');
        }
    }
    public function countPostByMonth()
    {
        $all_blog = NewsPostCount::whereBetween('created_at', [request()->start_date, request()->end_date])->get()->groupBy('blog_id');
        //dd($count);
        return view('admin.post.all_blog_count', compact('all_blog'));
    }
}
