<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\App;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin/users/users',['title'=>'All Users Listing','users'=> $users]);
    }

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
    public function show(User $user)
    {
        
        $remainApps = App::whereNotIn('id',$user->apps->pluck('id'))->get();
        $allReferels = User::where('refer_by',$user->refrel_code)->where('refer_by','!=',null)->get();
        return view('admin/users/view_single_user',['title'=> 'User Profile' , 'user'=>$user , 'remainApps' => $remainApps ,'allReferels' => $allReferels ]);
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

    public function updateUserApps(Request $request)
    {
       $user = User::find($request->user);
       $app = App::find($request->app);
       try {
        $user->apps()->attach($app,['download_at'=> now() ]);
        $request->session()->flash('succMsg','Update User Apps Successfully');
        return response()->json([
            'success' => true,
            'user' => $user->id,
            'message' => 'User Apps Updated',
            ]
            , 200);
       }
       catch(Exception $ex) {
        return response()->json([
            'success' => false,
            'message' => 'Internel error',
            ]
            , 500);
       }

    }

  
}
