<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $fillable = ["title","content","summary","post_status","image_path","view"];


    public function phc()
    {
        return $this->hasMany(PhcModel::class,'id_post')
            ->join('category', 'category.id', '=', 'posts_has_category.id_category');
    }

}
