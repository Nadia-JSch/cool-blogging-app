<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function showCreateForm() {
        // return 'hello!!';
        return view('create-post');
    }
}
