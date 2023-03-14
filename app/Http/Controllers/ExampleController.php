<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Step 2
// After going to "routes > web.php", come here to add the functions that contain the logic
class ExampleController extends Controller
{
    // create a function
    public function homepage() {
    // Step 4 - imagine we loaded data from the database
        $ourName = 'Nadia';
        $animals = ['Meowsalot', 'Barksalot', 'Purrsloud'];

        // pass in data from DB into the view using an array with keys from an associate array
        return view('homepage', ['allAnimals' => $animals, 'name' => $ourName, 'catName' => 'Meowsalot']);
    }

    public function aboutPage() {
        return '<h1>About Page!!!</h1><a href="/">Back to home</a>';
    }
}
