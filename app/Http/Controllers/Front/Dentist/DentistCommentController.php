<?php

namespace App\Http\Controllers\Front\Dentist;

use App\Helpers\Security;
use App\Http\Controllers\Controller;
use App\Models\DentistComment;
use Illuminate\Http\Request;

class DentistCommentController extends Controller
{
    public function create(Request $request)
    {
        $validateData = $request->validate([
            'dentist_id' => 'required|exists:dentists,id',
            'name' => 'required',
            'email' => 'required|email',
            'comments' => 'required',
            'stairs' => 'required',
        ], [
            'name.required' => 'İsim alanı zorunludur.',
            'email.required' => 'Email alanı zorunludur.',
            'email.email' => 'Geçersiz email formatı.',
            'comments.required' => 'Yorum alanı zorunludur.',
        ]);

        if ($validateData) {
            $security = new Security();

            $comment = new DentistComment();
            $comment->dentist_id = $request->input('dentist_id');
            $comment->name = $security->scriptStripper($request->input('name'));
            $comment->email = $security->scriptStripper($request->input('email'));
            $comment->comments = $security->scriptStripper($request->input('comments'));
            $comment->stairs = $security->scriptStripper($request->input('stairs'));
            $comment->status = false;
            $comment->save();

            return redirect()->back()->with('success', 'Comment added successfully.');
        } else {
            return redirect()->back()->withErrors($validateData)->withInput();
        }
    }

}
