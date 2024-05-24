<?php

namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Contracts\Session\Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return view('user.login');
    }


    public function login(Request $request){
        // dd($request->name);
        // $allSessions = session()->all();
        // dd($allSessions);
        
        // $http = new \GuzzleHttp\Client;
        // $response = $http->post('http://localhost/laravel/n_level_project/api/user',[
        //     'header'=>[
        //         // 'Authorization'=>'Bearer'.session()->get('token')
        //         'Authorization'=>'Bearer'.'17d42344e19ad7e6c264205c19c56fe35fc64b4e35aab95f886a6c97e97d3048'
        //         // 'Authorization'=>'Bearer'.session()->get('token.access_token')
        //     ],
        //     'query'=>[
        //         'name'=>$request->name,
        //         'password'=>$request->password
        //     ]
        // ]);
        $response = Http::post('http://localhost/laravel/n_level_project/api/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);
        

        if ($response->successful()) {
            $token = $response->json('token');
            session(['token' => $token]);

            // Perform actions with the token (e.g., store it, use it for subsequent requests)
            return response()->json(['token' => $token]);
        }

        $errorMessage = $response->json('message');
        return response()->json(['error' => $errorMessage]);


    }

    public function n_level(Request $request)
    {
        $response = Http::withHeaders([
            // 'Authorization'=>'Bearer'.'17d42344e19ad7e6c264205c19c56fe35fc64b4e35aab95f886a6c97e97d3048',
            'Authorization'=>'Bearer '.session()->get('token'),
        ])->post('http://localhost/laravel/n_level_project/api/user');

        if ($response->successful()) {
        $color = $response->json('color');

            return response()->json(['success' => $color]);
        }else{
            return response()->json(['not success' => "Not success"]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Color::get();

        return $user;
    }
   

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post_data = $request->all();
        $validator = Validator::make($post_data, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        } else {
            $query = User::create($post_data);
            if ($query) {
                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'not_add']);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['color'] = User::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $query = User::find($request['id'])->delete();
        if ($query) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'not_delete']);
        }
    }
}
