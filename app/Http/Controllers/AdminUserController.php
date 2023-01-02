<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminUserController extends Controller
{
    public function users()
    {
        
        $users = User::get();

        return view('admin.users',[
            'users'=>$users
        ]);

    }

    public function id($id)
    {
        //User::verifyLogin();
        $users = User::where('id', $id)->first();

        return view('admin.users-update',[
            'user'=> $users
        ]);
      
    }

    public function postId($id)
    {
        //User::verifyLogin();
            


        header("Location: /admin/users");
        exit;
      
    }

    public function create()
    {
        //User::verifyLogin();
        

        return view('admin.users-create');

    }
}
