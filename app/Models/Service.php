<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    // use SoftDeletes;


    // protected $fillable = [
    //     'name', 'slug', 'tagline',
    //     'service_category_id', 'price',
    //     'discount', 'discount_type',
    //     'image', 'thumbnail', 'description',
    //     'inclusion', 'exclusion', 'status',
    // ];

    protected $table = "services";

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }
}
