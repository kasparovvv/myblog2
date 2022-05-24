<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PostModel;
use App\Models\CategoryModel;
use App\Models\PhcModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
// use Carbon\Carbon;
//use Illuminate\Pagination\LengthAwarePaginator;
// use Illuminate\Pagination\Paginator;

class Blog extends Controller
{
    public function blog(Request $request){
        
        $keyword = trim($request->input("query"));
        $posts = PostModel::with('phc')
            ->when($keyword, function ($query, $keyword) {
                $query->where('title','LIKE', "%{$keyword}%");
            })
        ->where('post_status',1)
        ->orderBy('posts.id', 'desc')
        ->paginate(6);
        $categorytData = CategoryModel::select('category.category_name')
            ->selectRaw('COUNT(category.id) as count')
            ->Join('posts_has_category', 'category.id', '=', 'posts_has_category.id_category')
            ->where('category_status',1)
            ->where('posts_has_category.phc_status',1)
            ->groupBy('category_name')
            ->get();
        $popularFeeds = PostModel::with('phc')
            ->where('post_status',1)
            ->orderBy('posts.view','DESC')
            ->limit(3)
            ->get();

        return view("pages/main",compact(["posts","categorytData","popularFeeds"]));
    }

    public function archive( Request $request){
        $posts = PostModel::with('phc')->where('post_status',1)
        ->orderBy('posts.id', 'desc')
        ->paginate(6);
        $categorytData = CategoryModel::select('category.category_name')
            ->selectRaw('COUNT(category.id) as count')
            ->Join('posts_has_category', 'category.id', '=', 'posts_has_category.id_category')
            ->where('category_status',1)
            ->where('posts_has_category.phc_status',1)
            ->groupBy('category_name')
            ->get()
            ->toArray();
        $popularFeeds = PostModel::with('phc')
            ->where('post_status',1)
            ->orderBy('posts.view','DESC')
            ->limit(3)
            ->get();

        return view("pages/archive",compact(["posts","categorytData","popularFeeds"]));
    }

    public function detail($id){
        
        $post_url = trim($id);
        $new_post_inst = PostModel::where('post_url','=',$post_url)->first();
        $new_post_inst->view+=1;
        $new_post_inst->save();
        
        $posts = PostModel::with('phc')
            ->where('posts.post_url',$post_url)
            ->where('post_status',1)
            ->first();
        $categorytData = CategoryModel::select('category.category_name')
            ->selectRaw('COUNT(category.id) as count')
            ->Join('posts_has_category', 'category.id', '=', 'posts_has_category.id_category')
            ->where('category_status',1)
            ->where('posts_has_category.phc_status',1)
            ->groupBy('category_name')
            ->get()
            ->toArray();
        $popularFeeds = PostModel::with('phc')
            ->where('post_status',1)
            ->orderBy('posts.view','DESC')
            ->limit(3)
            ->get();

        return view("pages/detail",compact(["posts","categorytData","popularFeeds"]));
    }

    public function contacts(){
  
       return view("pages/contact",compact([]));
    }
}
