<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\App;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index(Request $request)
    {
        $allUsers = User::all()->count();
        $allApps = App::wherestatus(1)->count();
        return view('admin.dashboard.dashboard',['title'=>'Admin dashboard','allUsers'=>$allUsers,'allApps'=>$allApps]);
    }

    public function login(Request $request)
    {
       
        return view('admin.login.login',['title'=>"Admin Login Form"]);
    }

    public function auth(AdminRequest $request)
    {
        $request->validated();
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('admin/dashboard');
        }
        $request->session()->flash('errorMsg','Invalid Credentials');
        return redirect('admin/login');
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->flash('logoutMsg','Logout Successfully');
        return redirect('admin/login');
      
}

}
