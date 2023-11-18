<?php

use App\Http\Controllers\admin\aboutmeController;
use App\Http\Controllers\admin\bannerController;
use App\Http\Controllers\admin\frontendController;
use App\Http\Controllers\admin\messageController;
use App\Http\Controllers\admin\newsCategoryController;
use App\Http\Controllers\admin\personalinfoController;
use App\Http\Controllers\admin\postController;
use App\Http\Controllers\admin\questionController;
use App\Http\Controllers\admin\userController;
use App\Http\Controllers\admin\userRoleController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\blogController;
use App\Http\Controllers\websiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [websiteController::class,'index'])->name('website_index');
Route::get('/photo-gallery/{slug}', [websiteController::class,'gallery'])->name('website_gallery');
Route::get('/video-gallery/{slug}', [websiteController::class,'video'])->name('website_video');
Route::get('/contact', [websiteController::class,'contact'])->name('website_contact');
Route::get('/article/{category}/{slug}', [websiteController::class,'blog_view'])->name('website_blog_view');
Route::get('/search/result',[websiteController::class,'single_category_post_search'])->name('single_category_post_search');
Route::get('/category/{slug}', [websiteController::class,'blog_category'])->name('website_blog_category');
Route::post('/contact/send-message', [websiteController::class,'message'])->name('website_send_message');
Route::get('/ask/{slug}', [websiteController::class,'ask_view'])->name('website_ask');
Route::post('/ask/{slug}/post',[websiteController::class,'ask_post'])->name('website_ask_post');



// blog routes
Route::get('/blog', [blogController::class, 'index'])->name('blog_index');
Route::get('/blog-programming', [blogController::class, 'index'])->name('blog_programming');
Route::get('/blog-life-style', [blogController::class, 'index'])->name('blog_life_style');
Route::get('/blog/blog-details', [blogController::class, 'blog_details'])->name('blog_details');
Route::get('/blog/all-blog', [blogController::class, 'all_blog'])->name('all_blog');
Route::get('/blog/search', [blogController::class, 'search'])->name('blog_search');
Route::get('/blog/about', [blogController::class, 'about'])->name('blog_about');






// admin routes
Route::get('/admin', [adminController::class, 'view'])->name('admin_index')->middleware('auth');
Route::group(['namespace' => 'admin', 'middleware' => 'auth'], function () {
    // user info route
    Route::get('/admin/user', [userController::class, 'index'])->name('user_index');
    Route::post('/admin/add-user', [userController::class, 'add'])->name('user_add');
    // Route::get('/admin/view-user/{slug}',[userController::class,]@view')->name('user_view');
    Route::get('/admin/view-user-modal/{slug}', [userController::class, 'viewm'])->name('user_viewm');
    Route::post('/admin/update-user-modal/{slug}', [userController::class, 'update'])->name('user_update');
    Route::get('/admin/update-user-soft-delete/{slug}', [userController::class, 'softdelete'])->name('user_soft_delete');
    Route::get('/admin/update-user-restore/{slug}', [userController::class, 'restore'])->name('user_restore');
    Route::get('/admin/update-user-hard-delete/{slug}', [userController::class, 'harddelete'])->name('user_hard_delete');
    // user settings
    Route::get('/admin/user/settings/{slug}', [userController::class, 'user_setting'])->name('user_settings');
    Route::post('/admin/user/setting/change/{slug}', [userController::class, 'user_setting_change'])->name('user_setting_change');
    Route::get('/admin/user/profile/{slug}', [userController::class, 'user_profile'])->name('user_profile');
    // user role controll route
    Route::get('/admin/user-role', [userRoleController::class, 'index'])->name('user_role_index');
    Route::post('/admin/user-role-add', [userRoleController::class, 'add'])->name('user_role_add');
    Route::post('/admin/user-role-update/{slug}', [userRoleController::class, 'update'])->name('user_role_update');
    Route::get('/admin/user-role-delete/{slug}', [userRoleController::class, 'delete'])->name('user_role_delete');
    // contact message routes  
    Route::get('/admin/message', [messageController::class, 'index'])->name('message_index');
    Route::post('/admin/message/soft_delete_multiple/{id}', [messageController::class, 'soft_delete_multiple'])->name('soft_delete_multiple');
    Route::post('/admin/message/hard_delete_multiple/{id}', [messageController::class, 'hard_delete_multiple'])->name('hard_delete_multiple');
    Route::get('/admin/message/trash', [messageController::class, 'trashView'])->name('message_trash');
    Route::get('/admin/message/view/{slug}', [messageController::class, 'view'])->name('message_view');
    // social links
    Route::get('/admin/social-links', [personalinfoController::class, 'index'])->name('social_link');
    Route::post('/admin/social-links-add', [personalinfoController::class, 'add'])->name('social_link_add');
    Route::post('/admin/social-links-update/{slug}', [personalinfoController::class, 'update'])->name('social_link_update');
    Route::get('/admin/social-links-delete/{slug}', [personalinfoController::class, 'delete'])->name('social_link_delete');
    //test blade
    Route::get('/admin/test', [frontendController::class, 'index'])->name('test');
    // banner routes
    Route::get('/admin/banner', [bannerController::class, 'index'])->name('banner');
    Route::post('/admin/banner/add', [bannerController::class, 'add'])->name('add_banner');
    Route::post('/admin/banner/update/{slug}', [bannerController::class, 'update'])->name('update_banner');
    Route::get('/admin/banner/soft/{slug}', [bannerController::class, 'soft'])->name('soft_delete_banner');
    Route::get('/admin/banner/restore/{slug}', [bannerController::class, 'restore'])->name('restore_banner');
    Route::get('/admin/banner/delete_banner/{slug}', [bannerController::class, 'delete'])->name('delete_banner');
    // about me
    Route::get('/admin/aboutme', [aboutmeController::class, 'index'])->name('aboutme');
    Route::post('/admin/aboutme-update/{slug}', [aboutmeController::class, 'update'])->name('aboutme_update');

    // tag routes
    Route::get('/admin/postTag', [tagController::class, 'index'])->name('postTag');
    Route::post('/admin/postTag-add', [tagController::class, 'add'])->name('postTag_add');
    Route::post('/admin/postTag-update/{slug}', [tagController::class, 'update'])->name('postTag_update');
    Route::get('/admin/postTag-soft-delete/{slug}', [tagController::class, 'soft_delete'])->name('postTag_soft');
    Route::get('/admin/postTag-restore/{slug}', [tagController::class, 'restore'])->name('postTag_restore');
    Route::get('/admin/postTag-hard-delete/{slug}', [tagController::class, 'hard_delete'])->name('postTag_hard');

    // news routs
    Route::get('/admin/news-categories', [newsCategoryController::class, 'index'])->name('news_category');
    Route::post('/admin/news-category-add', [newsCategoryController::class, 'add'])->name('news_category_add');
    Route::post('/admin/news-category-update/{slug}', [newsCategoryController::class, 'update'])->name('news_category_update');
    Route::get('/admin/news-category-soft-delete/{slug}', [newsCategoryController::class, 'soft_delete'])->name('news_category_soft');
    Route::get('/admin/news-category-restore/{slug}', [newsCategoryController::class, 'restore'])->name('news_category_restore');
    Route::get('/admin/news-category-hard-delete/{slug}', [newsCategoryController::class, 'hard_delete'])->name('news_category_hard');

    // post routes
    Route::get('/admin/post', [postController::class, 'index'])->name('post');
    Route::get('/admin/all-blog-count', [postController::class, 'all_view_count'])->name('all-view-count');
    Route::get('/admin/blog-view/{id}', [postController::class, 'blog_view'])->name('post-view-count');
    Route::post('/admin/blog-count-by-month', [postController::class, 'countPostByMonth'])->name('countPostByMonth');


    Route::get('/admin/top-left-news', [postController::class, 'top_left_news'])->name('top_left_news');
    Route::get('/admin/top-right-news', [postController::class, 'top_right_news'])->name('top_right_news');
    Route::get('/admin/top-bottom-news', [postController::class, 'top_bottom_news'])->name('top_bottom_news');
    Route::get('/admin/latest-news', [postController::class, 'latest_news'])->name('latest_news');

    Route::get('/admin/post-category-wise/{category}', [postController::class, 'category_wise_view'])->name('post_category_wise_view');
    Route::get('/admin/post-add-view', [postController::class, 'add_view'])->name('post_add_view');
    Route::post('/admin/post-add', [postController::class, 'add'])->name('post_add');
    Route::get('/admin/post-view/{slug}', [postController::class, 'view'])->name('post_view');
    Route::get('/admin/post-update-view/{slug}', [postController::class, 'update_view'])->name('post_update_view');
    Route::post('/admin/post-update/{slug}', [postController::class, 'update'])->name('post_update');
    Route::get('/admin/post-soft-delete/{slug}', [postController::class, 'soft_delete'])->name('post_soft_delete');
    Route::get('/admin/post-restore/{slug}', [postController::class, 'restore'])->name('post_restore');
    Route::get('/admin/post-delete/{slug}', [postController::class, 'hard_delete'])->name('post_delete');

    Route::get('/admin/post-add-to-latest-news/{slug}', [postController::class, 'add_to_latest_news'])->name('add_to_latest_news');
    Route::get('/admin/post-remove-from-latest-news/{slug}', [postController::class, 'remove_from_latest_news'])->name('remove_from_latest_news');

    Route::get('/admin/post-add-to-top-left-news/{slug}', [postController::class, 'add_to_top_left'])->name('add_to_top_left');
    Route::get('/admin/post-remove-from-top-left-news/{slug}', [postController::class, 'remove_from_top_left'])->name('remove_from_top_left');

    Route::get('/admin/post-add-to-top-right-news/{slug}', [postController::class, 'add_to_top_right'])->name('add_to_top_right');
    Route::get('/admin/post-remove-from-top-right-news/{slug}', [postController::class, 'remove_from_top_right'])->name('remove_from_top_right');

    Route::get('/admin/post-add-to-top-bottom-news/{slug}', [postController::class, 'add_to_top_bottom'])->name('add_to_top_bottom');
    Route::get('/admin/post-remove-from-top-bottom-news/{slug}', [postController::class, 'remove_from_top_bottom'])->name('remove_from_top_bottom');

    // gallery routes

    Route::get('/admin/post-photo-view', [postController::class, 'photo_view'])->name('post_add_photo_view');
    Route::post('/admin/post-photo-add', [postController::class, 'photo_view'])->name('post_add_photo');
    Route::get('/admin/post-photo-delete/{slug}', [postController::class, 'photo_delete'])->name('post_delete_photo');
    Route::post('/admin/post-video-add', [postController::class, 'video_add'])->name('post_add_video');
    Route::get('/admin/post-video-delete/{slug}', [postController::class, 'video_delete'])->name('post_delete_video');
    Route::get('/admin/post-video-view', [postController::class, 'video_view'])->name('post_add_video_view');

    // question routes
    Route::get('/admin/question', [questionController::class, 'index'])->name('admin.questions');
    Route::get('/admin/question/delete/{slug}', [questionController::class, 'delete'])->name('admin.questions.delete');

});