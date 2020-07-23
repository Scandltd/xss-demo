<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function all() {
        return view('comments', ['comments' => Comment::all()->sortByDesc('date')]);
    }

    public function add(Request $request) {
        Comment::create([
            'username' => $request->input('username'),
            'date'     => new \DateTime(),
            'text'     => $request->input('text')
        ]);

        return redirect()->route('allComments');
    }
}
