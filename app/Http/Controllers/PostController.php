<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function storeNewPost(Request $request) {
        $incomingFields = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        // "sanitise" or strip any HTML tags a maliscious user may add
        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['body'] = strip_tags($incomingFields['body']);

        // spell out userID (author) or this post
        // add the userID from the current session onto the array of incomingFields
        // (call the autho and id helper funtions) to get the dynamic userID value
        $incomingFields['user_id'] = auth()->id();

        // we don't write MySQL code because we have models in Laravel
        Post::create($incomingFields);


        return 'hey!!!';
    }


    public function showCreateForm() {
        // return 'hello!!';
        return view('create-post');
    }
}
