<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostModel;
use App\Models\CategoryModel;
use App\Models\PHCModel;
use Illuminate\Support\Facades\Storage;




class Posts extends Controller
{
    public function add(){

        $categories = CategoryModel::select('*')
            ->where('category_status',1)
            ->get();

        return view("pages/posts/add",compact(["categories"]));
    }

    public function edit($id){
        $categories = CategoryModel::select('*')
            ->where('category_status',1)
            ->get();

        $data = PostModel::select('posts.id as id','title','content','summary','id_category','image_path')
            ->where('posts.id', $id)
            ->where('posts_has_category.phc_status',1)
            ->Join('posts_has_category', 'posts.id', '=', 'posts_has_category.id_post')
            ->get();

            $url = 
        $post = [];
        foreach($data as  $value){
            $post["id"] = $value["id"];
            $post["title"] = $value["title"];
            $post["content"] = $value["content"];
            $post["summary"] = $value["summary"];
            //$post["image_path"] =  Storage::url($value['image_path']);
            $post["image_path"] = $value['image_path'];
            $post["categories"][]= $value["id_category"];
        }

        return view("pages/posts/edit",compact(["post","categories"]));
    }

    public function list(){
        return view("pages/posts/list",compact([]));
    }

    public function add_post(Request $request){
        $request->validate([
            'title' =>['required','unique:posts'],
            'content' =>['required'],
            'summary' =>['required'],
            'category_name' =>['required'],
            'image_path' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $urlHelper = new \App\Libraries\UrlHelper();

        $destination_path = 'public/images/posts';
        $image = $request->file('image_path');
        $image_name = $image->getClientOriginalName();
        $path = $request->file('image_path')->storeAs($destination_path,$image_name);

        $post = new PostModel;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->summary = $request->summary;
        $post->post_url = $urlHelper->getUrl($request->title);
        $post->image_path = url('/').'/storage/images/posts/'.$image_name;
        $save = $post->save();
       
        $category_error = [];
        if($save){
           foreach($request->category_name as $category_name){
                $id_category = $category_name;
                if (!is_numeric($category_name)){
                    $category = new CategoryModel;
                    $category->category_name = ucfirst($category_name);
                    $saved = $category->save();
                    if($saved){
                        $id_category = $category->id;
                    }
                }
                $phc = new PHCModel;
                $phc->id_post = $post->id;
                $phc->id_category = $id_category;
                $phc_save = $phc->save();
                if(!$phc_save){
                    $category_error[] = $id_category;
                }
            }
            if(empty($category_error)){
                return  back()->with("success"," New Post successfully added");
            }
            else{
                return  back()->with("fail","İşlem Başarısız!");
            }
        }
        else{
            return  back()->with("fail","Bir hata var!");
        }
        
        
        
        
    }

    public function edit_post(Request $request){
        $request->validate([
            'title' =>['required'],
            'content' =>['required'],
            'summary' =>['required'],
            'category_name' =>['required'],
            'image_path' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $urlHelper = new \App\Libraries\UrlHelper();
        
        $post = PostModel::find($request->id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->summary = $request->summary;
        $post->post_url = $urlHelper->getUrl($request->title);
       
        if ($request->file('image_path')){
            $destination_path = 'public/images/posts';
            $image = $request->file('image_path');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image_path')->storeAs($destination_path,$image_name);
            $post->image_path = url('/').'/storage/images/posts/'.$image_name;
        }

        $update = $post->save();
        if($update){
            $postExistedCategories  = PHCModel::select('id_category')
                ->where('id_post', $request->id)
                ->where('phc_status', 1)
                ->get()
                ->toArray();

            $ExistedCategories = [];
            foreach($postExistedCategories as $ec){
                $ExistedCategories[] = $ec["id_category"];
            }
          
            $differeces = array_diff($ExistedCategories, $request->category_name);
            if(!empty($differeces)){
                foreach($differeces as $diff){
                    PHCModel::where('id_post', $request->id)
                        ->where('id_category', $diff)
                        ->update(["phc_status" => 0]);
                }
            }
            
            foreach($request->category_name as $category_name){
                if (!is_numeric($category_name)){
                    $category = new CategoryModel;
                    $category->category_name = ucfirst($category_name);
                    $saved = $category->save();
                    if($saved){
                        $id_category = $category->id;
                        $phc = new PHCModel;
                        $phc->id_post = $request->id;
                        $phc->id_category = $id_category;
                        $phc->save();
                    }
                }
                else{
                    if (!in_array($category_name, $ExistedCategories)){
                        $is_exist = PHCModel::select('id_category')
                            ->where('id_post', $request->id)
                            ->where('id_category', $category_name)
                            ->first();
                        if($is_exist){
                            PHCModel::where('id_post', $request->id)
                                ->where('id_category', $category_name)
                                ->update(["phc_status" => 1]);
                        }
                        else{
                            $phc = new PHCModel;
                            $phc->id_post = $request->id;
                            $phc->id_category = $category_name;
                            $phc->save();
                        }
                    }
                }
            }


            return  back()->with("success","Post successfully updated");
        }
        else{
            return  back()->with("fail","Update Failed!");
        }
    }

    public function delete_post(Request $request){
        if ($request->ajax()) {
            $request->validate([
                'id' =>['required'],
                'job' =>['required'],
            ]);
            
            $post = PostModel::find($request->id);
            $post->post_status = $request->job;
            $update = $post->save();
            
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


    public function list_posts(Request $request){

        if ($request->ajax()) {
            $columns = array( 
                0 =>'id', 
                1 =>'title', 
                2 =>'created_at',
                3 =>'updated_at'
            );

            $totalData = PostModel::count();
            $totalFiltered = $totalData; 
            
            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir = $request->input('order.0.dir');

            if(empty($request->input('search.value')))
            {            
                $posts = PostModel::offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else {
                $search = $request->input('search.value'); 
                
                $posts =  PostModel::where('title','LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

                $totalFiltered = PostModel::where('title','LIKE',"%{$search}%")
                    ->count();
            }
            

            $data = array();
            if(!empty($posts)){
                foreach ($posts as $post){
                    $customResult["id"] = $post->id;
                    $customResult["title"] = $post->title;
                    $customResult["created_at"] = $post->created_at->format('d/m/Y H:i:s');
                    $customResult["updated_at"] = $post->updated_at->format('d/m/Y H:i:s');
                    $customResult["post_status"] = $post->post_status;
                    $customResult["image_path"] = $post->image_path;
                    
                    $data[] = $customResult;
                }
            }

            
            $json_data = array(
                "draw"            => intval($request->input('draw')),  
                "recordsTotal"    => intval($totalData),  
                "recordsFiltered" => intval($totalFiltered), 
                "data"            => $data,
            );


            // echo "<pre>";
            // var_dump($json_data);
            // exit();

        

            echo json_encode($json_data); 


        }
        
        


    
    }





}
