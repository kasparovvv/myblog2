<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UsersModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;




class AuthUser extends Controller
{

    public function login(){
        return view("pages/login");
    }

    public function register(){
        return view("pages/register");
    }


    public function register_validation(Request $request){
        
        $validatedData = $request->validate([
            "first_name"=>['required'],
            "last_name"=>['required'],
            'email' => ['required', 'email','unique:users'],
            'password' => ['required']
        ]);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $save = $user->save();
        $user->syncRoles("Super-Admin");
        
        if($save){
            //return  back()->with("success","İşlem Başarılı!");

            //Mail::to("robinezgilioglu@gmail.com")->send(new WelcomeMail($user));
            return  back()->with("success","Congratulations, your account has been successfully created!");
            //return redirect('/login');
            
        }
        else{
            return  back()->with("fail","Registration failed!");
        }

    }


    public function login_validation(Request $request){
        
        $credentials  = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }
        else{
            return redirect()->route('login');
            return  back()->with("danger","Böyle bir kullanıcı bulunamamıştır.");
        }

        exit();

        // $userInfo = UsersModel::where("email",$request->email)->first();
        // if(!$userInfo){
        //    return  back()->with("danger","Böyle bir kullanıcı bulunamamıştır.");
        // }
        // else{
        //     if(Hash::check($request->password,$userInfo->password)){
                
        //         $user = [
        //             "id" => $userInfo->id,
        //             "name" => $userInfo->first_name." ".$userInfo->last_name,
        //             "email" => $userInfo->email
        //         ];
                
        //         $request->session()->put('isLoggedIn',TRUE);
        //         $request->session()->put('user',$user);
        //         return redirect()->route('dashboard');
        //     }
        //     else{
        //         return redirect()->route('login');
        //     }
        // }


    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        return redirect()->route('login');
        // $request->session()->forget('user');
        // $request->session()->put('isLoggedIn',FALSE);
       

    }
   
}
