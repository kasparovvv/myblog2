<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Auth;
use App\Models\PostModel;
use App\Models\CategoryModel;
use App\Models\User;
// use Session;



class Dashboard extends Controller
{

    public function dashboard(){
        $posts = PostModel::where("post_status",1)->count();
        $category = CategoryModel::where("category_status",1)->count();
        $users = User::where("user_status",1)->count();
        return view("pages/dashboard",compact(['posts','category','users']));
    }

    
}
