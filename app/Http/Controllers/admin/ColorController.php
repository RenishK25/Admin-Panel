<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Activityhistory;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.color.index');
    }

    public function datatable(){
        $data = Color::select('id', 'name','value')->get();
        return DataTables::of($data)->addIndexColumn()
            ->addColumn('color', function ($row) {
            $color = "<form id='form_color'><div class='form-group'>
                <input type='color' class='name_color  form-control' id='value". $row->id ."'  data-id='". $row->id ." ' name='value' value='". $row->value ."'>
                <div class='error'><span id='color". $row->id ."' class='text-danger'></span></div>
              </div></form>";
                return $color;
            })
            ->addColumn('name', function ($row) {
            $name = "<div class='form-group'>
                <input type='text' class='name_color form-control' id='name". $row->id ."'  data-id='". $row->id ." ' name='name' value='". $row->name ."'>
                <div class='error'><span id='name". $row->id ."' class='text-danger'></span></div>
              </div>";
                return $name;
            })
            ->addColumn('action', function ($row) {
                $btn ='<div>
                <a href="' . url("admin/color/".$row->id."/edit") . '" title="Edit Record!"> <i class="bx bx-edit bx-sm" style="color:green;"></i> </a>
                <a data-id=' . $row->id . ' class="delete" title="Delete Record!">  <i class="mdi mdi-delete mdi-24px" style="color:red;"></i> </a></div>';             
                 return $btn;
            })
            ->rawColumns(['action','name','color'])
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.color.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post_data = $request->all();
        $validator = Validator::make($post_data, [
            'name' => 'required',
            'value' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        } else {
            $query = Color::create($post_data);
            Helper::Activity_history("Add Color");

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
    public function edit($id)
    {
        $data['color'] = Color::find($id);
        return view('admin.color.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $post_data = $request->all();
        $validator = Validator::make($post_data, [
            'name' => 'required',
            'value' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        }else{
            unset($post_data['_token'] , $post_data['_method']);
            $update = Color::where('id', $post_data['id'])->update($post_data);
            Helper::Activity_history("Update Color");
            if ($update){
                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'not_update']);
            }   
        }    
    }

    public function name_color_change(Request $request)
    {
        $post_data = $request->all();
        // dd($post_data);
            $validator = Validator::make($post_data, [
                'name' => 'required',
                'value' => 'required',

            ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        }     
        Color::where('id', $post_data['id'])->update($post_data);
        Helper::Activity_history("Update Name Or Color");
        return response()->json(['status' => 'success', 'success' => 'Status change successfully.']);
    }
    // public function color(Request $request)
    // {
    //     $post_data = $request->all();
    //     dd($post_data);
    //     Color::where('id', $post_data['id'])->update($post_data);
    //     Activityhistory::create(['admin_id' => session('admin.id'), 'admin_name' => session('admin.name'), 'changes' => 'Update Color Value']);

    //     return response()->json(['status' => 'success', 'success' => 'Status change successfully.']);
    // }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        if(Color::find($request['id'])->delete()){
            Helper::Activity_history("Delete Color");
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'not_delete']);
        }    
    }
}
