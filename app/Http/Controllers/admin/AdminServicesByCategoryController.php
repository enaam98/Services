<?php

namespace App\Http\Controllers\admin;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminServicesByCategoryController extends Controller
{
    public $category_slug;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
    }

    public function index($category_slug)
    {


        // $services = Service::where('slug', $category_slug)->first();
        // //  dd($scategory);
        //   return view('admin.admin_service_by_category', ['services' => $services]);

        $category = ServiceCategory::where('slug', $this->category_slug)->first();
        $services = Service::all();
        return view('admin.admin_service_by_category', ['category' => $category,'services'=>$services]);


        // $category = ServiceCategory::where('slug', $this->category_slug)->first();
        // $services = Service::where('service_category_id',$category->id)->paginate(10);
        // return view('admin.admin_service_by_category', ['category_name' => $category->name,'services'=>$services]);
    }
}
