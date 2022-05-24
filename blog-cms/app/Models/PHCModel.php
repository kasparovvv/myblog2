<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PHCModel extends Model
{
   use HasFactory;
    protected $table = 'posts_has_category';
    protected $primaryKey = 'id';
    protected $fillable = ["id_category","id_post","phc_status"];
}
