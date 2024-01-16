<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\BlogComment;
use App\Models\DentistComment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class DentistCommentController extends Controller
{
    public function listComments()
    {
        $comments = DentistComment::all();
        return view('panel.pages.dentistPages.dentistComments', compact('comments'));
    }

    public function fetch(){
        //Comments listesini döndüren fonksiyon
        $comments = DentistComment::get();
        return DataTables::of($comments)
            ->addColumn('delete', function ($data) {
                return "<button onclick='deleteComment(" . $data->id . ")' class='btn btn-danger'>Sil</button>";
            })
            ->addColumn('status', function ($data) {
                if ($data->status == 1) {
                    return "<label class='switch'>
                              <input name='status' type='checkbox' checked 
                                     onchange='updateCommentStatus(".$data->id.")'>
                              <span class='slider'></span>
                            </label>";
                }else {
                    return "<label class='switch'>
                              <input name='status' type='checkbox' 
                                     onchange='updateCommentStatus(".$data->id.")'>
                              <span class='slider'></span>
                            </label>";
                }
            })
            ->addIndexColumn()
            ->rawColumns(['delete', 'status'])
            ->make(true);

    }

    public function updateStatus(Request $request)
    {
        $comment = DentistComment::findOrFail($request->id);
        $comment->status = ! $comment->status; // Mevcut durumun tersini alıyoruz (true ise false, false ise true)
        $comment->save();

        return response()->json(['Success' => 'success']);
    }

    function commentDelete(Request $request)
    {
        $request->validate([
            'id' => 'distinct'
        ]);
        DentistComment::find($request->id)->delete();
        return response()->json(['Success' => 'success']);
    }
}
