<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreCategory extends Model
{
    use HasFactory;
    protected $table = "ro_store_category";

    public function subCategory(){
        return $this->hasMany(StoreSubCategory::class, 'parent_id','id');
    }


}
