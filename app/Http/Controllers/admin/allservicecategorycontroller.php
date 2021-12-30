<?php

namespace App\Http\Controllers\admin;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class allservicecategorycontroller extends Controller
{
    public function index()
    {
       $services = Service::paginate(10);
      //  $services = Service::all();
        $cat = ServiceCategory::all();
       // dd($services);
        return view('admin.all_service_category', [
            'services' => $services,
            'cat' => $cat,
        ]);
    }
}
