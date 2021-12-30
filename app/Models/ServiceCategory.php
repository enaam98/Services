<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;


class ServiceCategory extends Model
{

    use HasFactory;
    // use SoftDeletes;
    // protected $fillable = ['name','slug','image'];


    protected $table = "service_categories";

public function services()
    {
        return $this->hasMany(Service::class);
    }
}
