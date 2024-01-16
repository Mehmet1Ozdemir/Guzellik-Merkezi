<?php

namespace App\Http\Controllers\Front\Blog;

use App\Helpers\Security;
use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use Illuminate\Http\Request;

class BlogCommentController extends Controller
{
    public function create(Request $request)
    {
        $validateData = $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'name' => 'required',
            'email' => 'required|email',
            'comments' => 'required',
        ], [
            'name.required' => 'İsim alanı zorunludur.',
            'email.required' => 'Email alanı zorunludur.',
            'email.email' => 'Geçersiz email formatı.',
            'comments.required' => 'Yorum alanı zorunludur.',
        ]);

        if ($validateData) {
            $security = new Security();

            $comment = new BlogComment();
            $comment->blog_id = $request->input('blog_id');
            $comment->name = $security->scriptStripper($request->input('name'));
            $comment->email = $security->scriptStripper($request->input('email'));
            $comment->comments = $security->scriptStripper($request->input('comments'));
            $comment->status = false;
            $comment->save();

            return redirect()->back()->with('success', 'Comment added successfully.');
        } else {
            return redirect()->back()->withErrors($validateData)->withInput();
        }
    }



}
