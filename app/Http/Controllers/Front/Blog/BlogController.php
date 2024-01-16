<?php

namespace App\Http\Controllers\Front\Blog;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Contacts;
use App\Models\Dentist;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if (!empty($request->id)) {
            $blog = Blog::where('category_id', $request->id)->get()->take(6);
        } else {
            $blog = Blog::whereNotNull('category_id')->orderBy('id')->take(6)->get();
        }

        $categories = BlogCategory::get();
        $c = Contacts::first();
        return view('front.pages.blogPages.blogGrid', compact('blog', 'categories','c'));

//        $blogs = Blog::all()->sortBy('id');
//        $categories = BlogCategory::all()->sortBy('id');
//        return view('front.pages.blogPages.blogGrid', compact('blog', 'categories'));
    }

    public function detail($id)
    {
        $blogLatest = Blog::all();
        $blogList = Blog::all()->sortBy('id');
        $dentists = Dentist::all()->sortBy('id');
        $blog = Blog::findOrFail($id);
        $categories = BlogCategory::all()->sortBy('id');
        $comments = BlogComment::where('blog_id', $id)->where('status', 1)->get();
        $c = Contacts::first();

        return view('front.pages.blogPages.blogDetails', compact('blog', 'blogList', 'dentists', 'blogLatest', 'categories', 'comments','c'));
    }


}
