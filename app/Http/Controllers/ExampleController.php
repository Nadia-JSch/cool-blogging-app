<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Step 2
// After going to "routes > web.php", come here to add the functions that contain the logic
class ExampleController extends Controller
{
    // create a function
    public function homepage() {
    // Step 4 - imagine we loaded this data from a dynamic database query
        $ourName = 'Nadia';
        // simple array
        $animals = ['Meowsalot', 'Barksalot', 'Purrsloud'];

        // first argument is the name of the view we want to use
        // pass in data from DB into the view using an array with keys from an associate array
        // => used to assign a value to the variable name 'allAnimals'
        // we can have many pieces of data seperated by a comma 
        return view('homepage', ['allAnimals' => $animals, 'name' => $ourName, 'catName' => 'Meowsalot']);
    }

    public function aboutPage() {
        return view('single-post');
    }
}
