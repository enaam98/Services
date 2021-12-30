<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\support\Str;
use Illuminate\support\Carbon;
use Illuminate\Support\Facades\Session;
use Livewire\WithFileUploads;

class adminservicecategorycontroller extends Controller
{

    public function index()
    {
        $scategories = ServiceCategory::paginate(10);
        return view('admin.admin_service_category', [
            'scategories' => $scategories
        ]);
    }
    public function create()
    {
        return view('admin.add_service_category');
    }

    public function store(Request $request)
    {
        $ffpath1 = 'images/categories';
        $ffpath = public_path('images/categories');
        $filename = "";

        $fname = $request->get('name');
        $file = $request->file('img');
        $filename = $fname . '_' . $file->getClientOriginalName();
        $file->move($ffpath, $filename);


        $scategory = new ServiceCategory();
        $scategory->name = $request->input('name');
        $scategory->slug = Str::slug($scategory->name);
        $scategory->image = $ffpath1 . '/' .$filename;
        $scategory->featured = $request->input('featured');
        $scategory->save();
        Session()->flash('message',' successfully');
        return back();
    }

    public function destroy($id)
    {

        $scategory = ServiceCategory::findOrFail($id);
        $scategory->delete();
        return back()->with('massage', 'Item deleted successfully!');
    }

    public function edit($id)
    {
        $scategory = ServiceCategory::find($id);
        return view('admin.edit_service_category', compact('scategory'));
    }
    public function update(Request $request, $id)
    {
        $ffpath1 = 'images/categories';
        $ffpath = public_path('images/categories');
        $filename = "";

        $fname = $request->get('name');
        $file = $request->file('image');
        $filename = $fname . '_' . $file->getClientOriginalName();
        $file->move($ffpath, $filename);

        $scategory = ServiceCategory::findOrFail($id);
        $scategory->name = $request->input('name');
        $scategory->slug = Str::slug($scategory->name);
        $scategory->image = $ffpath1 . '/' .$filename;
        $scategory->featured = $request->input('featured');
        $scategory->save();

        return back()->with('message', 'Item updated successfully!');
    }
}



// $imageName = Carbon::now()->timestamp;
        // $this->image->storeAs('categories', $imageName);
        // $scategory->image = $imageName;




//         $res=ServiceCategory::find($id)->delete();
//         if ($res){
//             return back()->with('massage', 'Item deleted successfully!');
//         }else{

// die('error');
//         }


 // protected   $rules = [
    //     'name' => ['required', 'string', 'between:2,100'],
    //     'image' => ['nullable', 'image']
    // ];
