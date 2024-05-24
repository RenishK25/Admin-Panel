<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.size.index');
    }

    public function product(Request $request)
    {
        $post_data = $request->all();
        $size =  Size::where('category_id', $post_data['category_id'])->get();
        // $data = '<option value="" selected disabled>Select Product Size</option>';
        $data = '';
        // dd($post_data);
        foreach($size as $size){
            if(isset($post_data['size_id']) && $post_data['size_id'] == $size->id){
                $sel ="selected";
            } else{
                $sel ="";
            }
        $data .= '<option value="'.$size->id.'" '.$sel.'>'.$size->name.'=>'.$size->value.'</option>';
        }
        return response()->json(['status'=>'success','data'=>$data]);
    }
    
    public function datatable(){
        $data = Size::with('category','sub_category')->get();
        return DataTables::of($data)->addIndexColumn()
        ->addColumn('category', function (Size $category) {
            return $category->category->name;
        })
        ->addColumn('sub_category', function (Size $subcatategory) {
            return    $subcatategory->sub_category->name;
        })
        
        ->addColumn('value', function ($row) {
        $size = "<div class='form-group'>
            <input type='text' class='name_value form-control' id='value". $row->id ."'  data-id='". $row->id ." ' name='value' value='". $row->value ."'>
            <div class='error'><span id='value". $row->id ."' class='text-danger'></span></div>
            </div>";
            return $size;
        })
        ->addColumn('name', function ($row) {
            $name = "<div class='form-group'>
                <input type='text' class='name_value form-control' id='name". $row->id ."'  data-id='". $row->id ." ' name='name' value='". $row->name ."'>
                <div class='error'><span id='name". $row->id ."' class='text-danger'></span></div>
                </div>";
                return $name;
            })
        ->addColumn('action', function ($row) {
            $btn ='<div>
                <a href="' . url("admin/size/".$row->id."/edit") . '" title="Edit Record"><i class="bx bx-edit bx-sm" style="color:green;"></i> </a>
                <a data-id=' . $row->id . ' class="delete" title="Delete Record">    <i class="mdi mdi-delete mdi-24px" style="color:red;"></i> </a></div>';             
            return $btn;
            
        })
        ->rawColumns(['name','value','action'])
        ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['category'] = Category::get();
        $data['sub_category'] = Subcategory::get();

        return view('admin.size.add')->with($data);
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
        }else{
            $query = Size::create($post_data);
            Helper::Activity_history("Add Product Size");        
            if ($query) {
                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'not_add']);
            }
        }      }

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
        $data['size'] = Size::find($id);
        return view('admin.size.edit')->with($data);    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post_data = $request->all();
        $validator = Validator::make($post_data, [
            'name' => 'required',
            'value' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        } else {
            unset($post_data['_token'],$post_data['_method']);
            $update = Size::where('id', $post_data['id'])->update($post_data);
            Helper::Activity_history("Update Product Size");        
            if ($update) {
                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'not_update']);
            }
        }      
    }

    public function name_size_change(Request $request)
    {
        $post_data = $request->all();
        $validator = Validator::make($post_data, [
            'name' => 'required',
            'value' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        }
        Size::where('id', $post_data['id'])->update($post_data);
        Helper::Activity_history("Update Product Size");        
        return response()->json(['status' => 'success', 'success' => 'Status change successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request){

        // $is_delete = Size::find($request['id'])->delete();
        if(Size::find($request['id'])->delete()){
            Helper::Activity_history("Delete Product Size");        
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'not_delete']);
        }
    }
}
