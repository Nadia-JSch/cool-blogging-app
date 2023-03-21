<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| "Almost like a table of contents of our entire application"
*/

Route::get('/', [ExampleController::class, "homepage"]);

// Step 1
// using the Route class which we required the autoloader to run
// the :: in PHP is used to call a static method from the route class
// get method (also POST, DELETE) - request sent to the web browser
// (submitting a form requires a POST request)
// the function is run when someone visits this route

// Step 3
// import ("use") the controller that was created 
// replace the anonymous function with the one defined in the controller
// the syntax is [ControllerName::class, "functionName"]
Route::get('/about', [ExampleController::class, "aboutPage"]);

// (url, anonymous function to run to run the register method of the UserController class)
Route::post('/register', [UserController::class, 'register']);