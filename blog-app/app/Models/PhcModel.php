<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhcModel extends Model
{
    use HasFactory;
    protected $table = 'posts_has_category';
    protected $primaryKey = 'id';
    protected $fillable = ["id_category","id_post","phc_status"];

    public function phc()
    {
        return $this->hasMany(PhcModel::class);
    }
}
