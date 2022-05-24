<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CategoryModel;

class Category extends Controller
{
    public function add(){
     return view("pages/category/add",compact([]));
    }

    public function edit($id){
        
        $category = CategoryModel::find($id);
        return view("pages/category/edit",compact(["category"]));
    }

    public function list(){
        return view("pages/category/list",compact([]));
    }

    public function add_category(Request $request){
        $request->validate([
            'category_name' =>['required','unique:category'],
        ]);

        foreach($request->category_name as $category_name){
            $category = new CategoryModel;
            $category->category_name = ucfirst($category_name);
            $save = $category->save();
        }
        
        if($save){
           return  back()->with("success"," New categories successfully added");
        }
        else{
            return  back()->with("fail","Add Failed!");
        }
    }

    public function edit_category(Request $request){
        $request->validate([
            'category_name' =>['required','unique:category'],
        ]);

        $category = CategoryModel::find($request->id);
        $category->category_name = ucfirst($request->category_name);
        $updated = $category->save();
       
        if($updated){
            return  back()->with("success","Category successfully updated");
        }
        else{
            return  back()->with("fail","Update failed!");
        }
    }

    public function delete_category(Request $request){
        
        if ($request->ajax()) {
            $request->validate([
                'id' =>['required'],
                'job' =>['required'],
            ]);
            
            $category = CategoryModel::find($request->id);
            $category->category_status = $request->job;
            $update = $category->save();
            
            $json  = [
                "success" => false
            ];

            if($update){
                $json  = [
                    "success" => true
                ]; 
            }

                return  json_encode($json);
        }
        
    }

   

    public function list_category(Request $request){

        if ($request->ajax()) {
            
            $columns = array( 
                0 =>'category_name', 
                1 =>'created_at',
                2 =>'updated_at'
            );

            $totalData = CategoryModel::count();
            $totalFiltered = $totalData; 
            
            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir = $request->input('order.0.dir');

            if(empty($request->input('search.value')))
            {            
                $categories = CategoryModel::offset($start)
                            ->limit($limit)
                            ->orderBy($order,$dir)
                            ->get();
            }
            else {
                $search = $request->input('search.value'); 
                
                $categories =  CategoryModel::where('category_name','LIKE',"%{$search}%")
                                ->offset($start)
                                ->limit($limit)
                                ->orderBy($order,$dir)
                                ->get();

                $totalFiltered = CategoryModel::where('category_name','LIKE',"%{$search}%")
                                ->count();
            }
            
            $data = array();
            if(!empty($categories)){
                foreach ($categories as $category){
                    $customResult["id"] = $category->id;
                    $customResult["category_name"] = $category->category_name;
                    $customResult["category_status"] = $category->category_status;
                    $customResult["created_at"] = $category->created_at->format('d/m/Y H:i:s');;
                    $customResult["updated_at"] = $category->updated_at->format('d/m/Y H:i:s');;
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

   


}
