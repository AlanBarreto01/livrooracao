<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Livro\Db\Sql;
use App\Models\UserProject;

class HomeController extends Controller
{
    public function index()
    {   
        
        $users = User::get();
        
        return view('index',[
            'users'=>$users
        ]);

    }

    public function names()
    {   
        //UserProject::verifyLogin();
      
        return view('names');
    }
        
    public function postNames()
    {   
        User::saveNames($_POST["login"], $_POST["password"]);

        header("Location: /");
        exit;

    }



    public function login()
    {   
        
        $user = UserProject::verifylogin();
        $users = User::get();
        
        return view('login',[
            'error'=>UserProject::getError(),
            'errorRegister'=>UserProject::getErrorRegister(),
            'registerValues'=>(isset($_SESSION['registerValues'])) ? $_SESSION['registerValues'] : ['name'=>'', 'email'=>'', 'phone'=>'']
        
        ]);

    }
   
}
?>