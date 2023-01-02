<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProject;

class AdminController extends Controller
{
    public function index()
    {   
        
        //UserProject::verifyLogin();
        
        return view('admin.index' );

    }

    public function login()
    {        
        return view('admin.login');
    }

    public function postLogin()
    {        
        //UserProject::login($_POST["login"], $_POST["password"]);

        header("Location: /admin");
        exit;
    }
   
}
?>