<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function index(){

    return view('admin.login');

    }
    public function login(Request $request){
        $post_data = $request->all();

        $validator = Validator::make($post_data, [
            'email' => 'required',
            'password' => 'required',
        ]);
        // dd($post_data);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        } else {
            $admin_data = Admin::where('email',$post_data['email'])->first();
            if ($admin_data) {
                $admin_data['password'] = Crypt::decrypt($admin_data['password']);
                if ($post_data['password'] === $admin_data['password']) {
                    Session::put('admin', $admin_data);
                    return response()->json(['status' => 'success']);
                } else {
                    return response()->json(['status' => 'faile', 'message' => 'Password Doen`t Match']);
                }
            } else {
                return response()->json(['status' => 'faile', 'message' => 'Account Doen`t Exist']);
            }
        }
    }

    public function logout(){
        session::flush();
        return redirect('/admin/login');
    }
}
