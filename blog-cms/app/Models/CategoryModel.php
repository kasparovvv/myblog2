<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    
    use HasFactory;
    protected $table = 'category';
    protected $primaryKey = 'id';
    protected $fillable = ["category_name","category_status"];



    public static function add($id){

        return static::select('*')->where(["id"=>$id])->get();

    }
}
