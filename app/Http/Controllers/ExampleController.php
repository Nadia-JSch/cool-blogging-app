<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Step 2
// After going to "routes > web.php", come here to add the functions that contain the logic
class ExampleController extends Controller
{
    // create a function
    public function homepage() {
        return '<h1>Homepage!!!</h1><a href="/about">View the about page</a>';
    }

    public function aboutPage() {
        return '<h1>About Page!!!</h1><a href="/">Back to home</a>';
    }
}
