<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class StoreSubCategory extends Model
{
    use HasFactory;

    public function category(){
        return $this->hasOne(StoreCategory::class,'id','parent_id');
    }

    protected $table = "ro_store_subcategory";
}
