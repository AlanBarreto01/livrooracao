<?php

session_start();

use App\Http\Controllers\{HomeController};
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;



require_once("functions.php");
require_once("site.php");
require_once("admin.php");
require_once("admin-users.php");
/*require_once("admin-categories.php");
require_once("admin-products.php");
require_once("admin-orders.php");
*/

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
