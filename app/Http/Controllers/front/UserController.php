<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserValidate;
use App\Http\Resources\AppResource;
use App\Http\Resources\AppResourceCollection;
use App\Http\Resources\UserResource;
use App\Models\App;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
   
    public function login(Request $request)
    {
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password ])) { 
           $userData = new UserResource(Auth::user());
          
            return response()->json([
            'success' => true,
            'message' => 'Logged in successfully',
            'user' => $userData], 
            200); 
        } 
        else{ 
            return response()->json([
                'success' => false,
                'message' => 'Invalid credentials !',
                ]
                , 401); 
        } 
    }

    public function register(UserValidate $request)
    {
        // Add a header in postman --  X-Requested-With:XMLHttpRequest for using custom request
        $request->validated();
        if ( $request->refer_by!=null && ! checkValidReferer($request->refer_by)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Referel Code',
                ]
                , 400);
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'refrel_code' => substr(str_shuffle( strtoupper($request->name).$request->phone."ABCDEFGHIJKLMNOPQRSTUVWXYZ"), -6),
            'mac' => getMacAddress(),
            'refer_by' => $request->refer_by
        ]);
        return response()->json([
            'success' => true,
            'message' => 'User Register Successfull',
            ]
            , Response::HTTP_CREATED); 
    }
    public function allApps(Request $request)
    {
        $apps = App::wherestatus(1)->get();
        $apps = new AppResourceCollection($apps);
        return $apps;
    }
    public function getSingleApp( $id )
    {
        $app = App::find($id);
        if ($app) {
            $app = new AppResource($app);
            return response()->json([
                'success' => true,
                'message' => 'App Details',
                'app' => $app
                ]
                , 200); 
        }
        else {
            return response()->json([
                'success' => true,
                'message' => 'No App Found',
                'app' => $app
                ]
                , 200); 
        }
    }
    public function allUserApps(Request $request)
    {
       $apps =  Auth::user()->apps;
       if ($apps) {
        $apps =(new AppResourceCollection($apps))->additional([ 'success' => true,'message' => 'App Details',]);
        return $apps;
    }
    }
    public function userProfile(Request $request)
    {
        $remainApps = App::whereNotIn('id',Auth::user()->apps->pluck('id'))->get();
        $allReferels = User::where('refer_by',Auth::user()->refrel_code)->where('refer_by','!=',null)->get();
        return response()->json([
            'success' => true,
            'message' => 'User Profile',
            'remainApps' => $remainApps,
            'allReferels' => $allReferels
            ]
            , 200); 
    }
}
