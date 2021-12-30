<?php

namespace App\Http\Controllers;

use App\Models\ServiceCategory;

use Illuminate\Http\Request;

class ServicByeCategoriesController extends Controller
{
    public $category_slug;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
    }

    public function index($category_slug)
    {
        $scategory = ServiceCategory::where('slug', $category_slug)->first();
      //  dd($scategory);
        return view('front.servisesbycategories', ['scategory' => $scategory]);
    }
}
