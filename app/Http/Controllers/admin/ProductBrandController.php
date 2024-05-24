<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Productbrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProductBrandController extends Controller
{
    protected $path = 'upload/product_brand/';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product_brand.index');
    }


    public function datatable(){
        $data = Productbrand::select('id', 'name','logo','description')->get();
        return DataTables::of($data)->addIndexColumn()
        ->addColumn('logo', function ($row) {
            return '<img src="' . url('storage/upload/product_brand/' . $row->logo) . '" border="0" width="50" height="50" align="center" />';
        })
            ->addColumn('action', function ($row) {
                $btn ='<div>
                <a href="' . url("admin/product_brand/".$row->id."/edit") . '" title="Edit Record!"><i class="bx bx-edit bx-sm" style="color:green;"></i> </a>
                <a data-id=' . $row->id . ' class="delete" title="Delete Record!">  <i class="mdi mdi-delete mdi-24px" style="color:red;"></i>   </a></div>';             
            return $btn;
                
            })
            ->rawColumns(['action','logo'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product_brand.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post_data = $request->all();
        $validator = Validator::make($post_data, [
            'name' => 'required',
            'logo' => 'required',
            'description' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        } else {
            if (isset($post_data['logo']) && !empty($post_data['logo'])) {
                $post_data['logo'] = Helper::Image_upload($post_data['logo'],$this->path);
            }
            $query = Productbrand::create($post_data);
            Helper::Activity_history("Add Product Brand");

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
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['product_brand'] = Productbrand::find($id);
        return view('admin.product_brand.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { 
        $post_data = $request->all();

        $validator = Validator::make($post_data, [
            'name' => 'required',
            // 'logo' => 'required',
            'description' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        }else{
            if (isset($post_data['logo']) && !empty($post_data['logo'])) {
                $post_data['logo'] = Helper::Image_upload($post_data['logo'],$this->path);
                
                $old_image = Productbrand::where('id', $post_data['id'])->first();
                Helper::Image_delete($old_image['logo'],$this->path);
            }
            unset($post_data['_token'],$post_data['_method']);
            $update = Productbrand::where('id', $post_data['id'])->update($post_data);
            Helper::Activity_history("Update Product Brand");
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

        $old_image = Productbrand::where('id', $request['id'])->first();
        Helper::Image_delete($old_image['logo'],$this->path);

        $query = Productbrand::find($request['id'])->delete();
        Helper::Activity_history("Delete Product Brand");
        
        if ($query) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'not_delete']);
        }
    }
}
