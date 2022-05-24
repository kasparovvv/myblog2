<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserManagement extends Controller
{

    public function add(){
        $roles = Role::all();
        return view("pages/users/add",compact(["roles"]));
    }

    public function edit($id){
        $roles = Role::all();
        $user = User::find([$id])->first();
        return view("pages/users/edit",compact(["user","roles"]));
    }

    public function list(){
      return view("pages/users/list",compact([]));
    }

  
    public function list_user(Request $request){

        if ($request->ajax()) {
            
            $columns = array( 
                0 =>'first_name', 
                1 =>'last_name',
                2 =>'email',
                3 =>'created_at',
                4 =>'updated_at'

            );

            $totalData = User::with('roles')->count();
            $totalFiltered = $totalData; 
            
            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir = $request->input('order.0.dir');

            if(empty($request->input('search.value')))
            {            
                $users = User::with('roles')
                            ->offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
            }
            else {
                $search = $request->input('search.value'); 
                
                $users =  User::with('roles')
                                ->where('first_name','LIKE',"%{$search}%")
                                ->orWhere('last_name', 'LIKE',"%{$search}%")
                                ->orWhere('email', 'LIKE',"%{$search}%")
                                ->offset($start)
                                ->limit($limit)
                                ->orderBy($order,$dir)
                                ->get();

                $totalFiltered = User::with('roles')
                                ->where('first_name','LIKE',"%{$search}%")
                                ->orWhere('last_name', 'LIKE',"%{$search}%")
                                ->orWhere('email', 'LIKE',"%{$search}%")
                                ->count();
            }
            
            $data = array();
            if(!empty($users)){
                foreach ($users as $user){
                    $customResult["id"] = $user->id;
                    $customResult["first_name"] = $user->first_name;
                    $customResult["last_name"] = $user->last_name;
                    $customResult["email"] = $user->email;
                    $customResult["role"] = $user->hasRole($user->roles) ? $user->roles :  '';
                    $customResult["user_status"] = $user->user_status;
                    $customResult["created_at"] = $user->created_at->format('d/m/Y H:i:s');
                    $customResult["updated_at"] = $user->updated_at->format('d/m/Y H:i:s');
                    
                    $data[] = $customResult;
                }
            }

            $json_data = array(
                "draw"            => intval($request->input('draw')),  
                "recordsTotal"    => intval($totalData),  
                "recordsFiltered" => intval($totalFiltered), 
                "data"            => $data
            );

            echo json_encode($json_data); 


        }
        
        


    
    }


    public function add_user(Request $request){
        
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
        $user->syncRoles($request->role);
        
        if($save){
            return  back()->with("success","Congratulations, New user has been successfully created!");
        }
        else{
            return  back()->with("fail","Failed!");
        }

    }

    public function edit_user(Request $request){
        $validatedData = $request->validate([
            "first_name"=>['required'],
            "last_name"=>['required'],
            'email' => ['required', 'email'],
            // 'password' => ['required']
        ]);
       
        $user = User::find($request->id);
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }
        $save = $user->save();
        $user->syncRoles($request->role);

        if($save){
            return  back()->with("success","Congratulations, New user has been successfully created!");
        }
        else{
            return  back()->with("fail","Failed!");
        }

    }

    


    public function delete_user(Request $request){
        
        if ($request->ajax()) {
            $request->validate([
                'id' =>['required'],
                'job' =>['required'],
            ]);
       

        $update = User::where('id', $request->id)
            ->update(["user_status" => $request->job]);

        $json = ["success" => false];

        if($update){
            $json  = [
                "success" => true
            ]; 
        }

            return  json_encode($json);
        }
        
    }





}


