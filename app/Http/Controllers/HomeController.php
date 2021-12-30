<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $scategories = ServiceCategory::inRandomOrder()->take(18)->get();
        $fservice = Service::where('featured', 1)->inRandomOrder()->take(8)->get();
        $fcategory = ServiceCategory::where('featured', 1)->take(8)->get();

        return view(
            'front.home',
            [
                'scategories' => $scategories,
                'fservice' => $fservice,
                'fcategory' => $fcategory
            ]
        );
    }

    public function autocomplete(Request $request)
    {
        $data = Service::select('name')->where("name", "LIKE", "%{$request->input('query')}%")->get();
        return response()->json($data);
    }

    public function searchService(Request $request)
    {
        $service_slug = Str::slug($request->q, '-');
        if ($service_slug) {
            return redirect ('/service/' . $service_slug);
        } else {
            return back();
        }
    }

    //  public function showcategory()
    //     {

    //         $scategories = ServiceCategory::inRandomOrder()->take(18)->get();
    //         $fservice =Service::where('featured',1)->inRandomOrder()->take(8)->get();
    //         return view('front.home',['scategories'=>$scategories, 'fservice'=>$fservice]);
    //     }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
