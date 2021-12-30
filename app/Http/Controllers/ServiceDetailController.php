<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceDetailController extends Controller
{

    public $service_slug;

    public function mount($service_slug)
    {
        $this->service_slug = $service_slug;
    }

    public function index(){
        $service= Service::where('slug',$this->service_slug)->first();
        return view('front.serviceDetail',['service' => $service]);
    }
}
