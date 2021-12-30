<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\support\Str;
use Livewire\WithFileUploads;


class AdminAddServicesController extends Controller
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $service_category_id;
    public $image;

    public function index()
    {
        $scategories = ServiceCategory::all();
        return view('admin.add_services', [
            'scategories' => $scategories
        ]);
    }

    public function store(Request $request)
    {

        $ffpath1 = 'images/services';
        $ffpath = public_path('images/services');
        $filename = "";

        $fname = $request->get('name');
        $file = $request->file('img');
        $filename = $fname . '_' . $file->getClientOriginalName();
        $file->move($ffpath, $filename);

        $service = new Service();
        $service->name = $request->input('name');
        $service->slug = Str::slug($service->name);
        $service->image = $ffpath1 . '/' . $filename;
        $service->service_category_id = $request->input('service_category_id');
        $service->save();

        return back()->with('message', 'Item created successfully!');
    }

    public function destroy($id)
    {

        $service = Service::where('id', $id);
        $service->delete();
        return back()->with('massage', 'Item deleted successfully!');
    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.edit_service', ['service' => $service ] );
    }

    public function update(Request $request, $id)
    {
        $ffpath1 = 'images/services';
        $ffpath = public_path('images/services');
        $filename = "";

        $fname = $request->get('name');
        $file = $request->file('image');
        $filename = $fname . '_' . $file->getClientOriginalName();
        $file->move($ffpath, $filename);

        $service = Service::findOrFail($id);
        $service->name = $request->input('name');
        $service->slug = Str::slug($service->name);
        $service->image = $ffpath1 . '/' .$filename;
        $service->featured = $request->input('featured');
        $service->save();

        return back()->with('message', 'Item updated successfully!');
    }
}
