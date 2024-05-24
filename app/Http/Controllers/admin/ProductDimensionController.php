<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Productdimension;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProductDimensionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product_dimension.index');    
    }
    public function product(Request $request)
    {
        $post_data = $request->all();
        $product_dimension =  Productdimension::where('category_id', $post_data['category_id'])->get();
        $data = '<option value="" selected disabled>Select Product Dimension</option>';
        // dd($post_data);
        foreach($product_dimension as $product_dimension){
            if(isset($post_data['product_dimension_id']) && $post_data['product_dimension_id'] == $product_dimension->id){
                $sel ="selected";
            } else{
                $sel ="";
            }
        $data .= '<option value="'.$product_dimension->id.'" '.$sel.'>'.$product_dimension->name.'</option>';
        }
        return response()->json(['status'=>'success','data'=>$data]);
    }


    public function datatable(){
        $data = Productdimension::with('category','sub_category')->get();
        return DataTables::of($data)
        ->addIndexColumn()
        ->addColumn('category', function (Productdimension $category) {
            return $category->category->name;
        })
        ->addColumn('sub_category', function (Productdimension $subcatategory) {
            return    $subcatategory->sub_category->name;
        })
               ->addColumn('action', function ($row) {
                
                    $btn ='<div>
                    <a href="' . url("admin/product_dimension/".$row->id."/edit") . '" title="Edit Record!"> <i class="bx bx-edit bx-sm" style="color:green;"></i> </a>
                    <a data-id=' . $row->id . ' class="delete" title="Delete Record!">   <i class="mdi mdi-delete mdi-24px" style="color:red;"></i>  </a></div>';             
                return $btn;
               

               })
               ->rawColumns(['category','sub_category','action'])
               ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['category'] = Category::get();
        $data['sub_category'] = Subcategory::get();

        return view('admin.product_dimension.add')->with($data);
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
            'category_id' => 'required',
            'sub_category_id' => 'required',
            

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        } else {
            
            $query = Productdimension::create($post_data);
            Helper::Activity_history("Add Product Dimension");

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
        $data['category'] = Category::get();
        $data['sub_category'] = Subcategory::get();
        $data['product_dimension'] = Productdimension::find($id);

        return view('admin.product_dimension.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $post_data = $request->all();
        $validator = Validator::make($post_data, [

            'category_id' => 'required',
            'sub_category_id' => 'required',
            'name' => 'required',
            'value' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        }else{
          
            unset($post_data['_token'],$post_data['_method']);
            $update = Productdimension::where('id', $post_data['id'])->update($post_data);
            Helper::Activity_history("Update Product Dimension");
            if ($update) {
                return response()->json(['status' => 'success']);
    
            } else {
                return response()->json(['status' => 'not_update']);
            }
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $query = Productdimension::find($request['id'])->delete();
        Helper::Activity_history("Delete Product Dimension");
        
        if ($query) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'not_delete']);
        }    
    }
}
