<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AppValidateRequest;
use App\Models\App;
use Illuminate\Http\Request;

class AppController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $apps = App::wherestatus(1)->get();
        return view('admin/apps/apps',['title'=>'All App Listing','apps'=> $apps]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/apps/add_apps_form',['title'=>'Add New App']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AppValidateRequest $request)
    {
        $request->validated();
        if($request->hasFile('img')) {
			$image = $request->file('img');
			$ext = $image->extension();
			$app_image_name = time().".".$ext;
			$image->storeAs('/public/admin_assets/apps' ,$app_image_name );
		}
        App::create([
            'title' => $request->title,
            'img' => $app_image_name,
            'description' => $request->description,
            'price' => $request->price,
            'f_point' => $request->f_point
        ]);
        $request->session()->flash('app_add_msg',"App Added Successfully");
		return redirect('admin/apps');
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
    public function edit( App $app )
    {
        return view('admin/apps/edit_app_form',['title'=>'Edit App','app'=> $app ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AppValidateRequest $request, $id)
    {
        $request->validated();
        $app = App::find($id);
        if($request->hasFile('img')) {
			$image = $request->file('img');
			$ext = $image->extension();
			$app_image_name = time().".".$ext;
			$image->storeAs('/public/admin_assets/apps' ,$app_image_name );
            $app->img = $app_image_name;
		}
       
        $app->title = $request->title;
        $app->description = $request->description;
        $app->price = $request->price;
        $app->f_point = $request->f_point;
        $app->save();
        $request->session()->flash('app_add_msg',"App Updated Successfully");
		return redirect('admin/apps');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request ,$id)
    {
        App::whereid($id)->update(['status'=> 0]);
        $request->session()->flash('app_add_msg',"App Deleted Successfully");
		return redirect('admin/apps');
    }
}
