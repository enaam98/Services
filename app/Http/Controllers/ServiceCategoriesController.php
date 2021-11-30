<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoriesController extends Controller
{
    public function index()
    {
        $scategories = ServiceCategory::all();
        return view(
            'front.servicescategories',
            ['scategories' => $scategories]
        );
    }
}
