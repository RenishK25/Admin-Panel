<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProductImageController extends Controller
{
    protected $path = 'upload/product_image/';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product_image.index');
    }

    public function datatable(){
       $data = ProductDetail::with('image')->select('id','color_size_combination')->whereIn('product_detail.id', function($query){
                        $query->select('product_detail_id')->from('product_images');
                    })->get();

        return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('images', function ($row) {
                    $count = "<span style='font-weight:bold;margin-left:3px;'> +".count($row->image)-2 ." more Images<span>";
                    if(count($row->image) <= 2){
                        $count ="";
                    }
                   $img ="";
                   $i=1;
                    foreach($row->image as $image){                        
                        if ($i <= 2) {
                            $img .=  '<img src="' . url('storage/upload/product_image/' . $image['image']) . '" border="0" width="50" height="50" align="center" style="margin-left:10px" />';       
                        }
                        $i++;
                    }
                    return $img.$count;
                })
                ->addColumn('action', function ($row) {
                $btn ='<div>
                <a href="' . url("admin/product_image/".$row->id."/edit") . '" title="Edit Record!"> <i class="bx bx-edit bx-sm" style="color:green;"></i> </a>
                <a data-id=' . $row->id . ' class="delete" title="Delete Record!">  <i class="mdi mdi-delete mdi-24px" style="color:red;"></i>  </a></div>';             
                return $btn;
                })
                ->rawColumns(['images', 'action'])
                ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['product'] = ProductDetail::get();

        return view('admin.product_image.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post_data = $request->all();
        $validator = Validator::make($post_data, [
            'product_id' => 'required',
            'image' => 'required'
        ]);
        $validator2 = Validator::make($post_data, [
            'image.*' => 'mimes:jpeg,png,jpg,gif,webp,svg'
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        }
        else if ($validator2->fails()) {
                    return response()->json(['status' => 'error2', 'error2' => $validator2->errors()->toArray()]);
        }
         else {
            // if ($validator->fails()) {
            //     return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
            // }else{
                if(isset($post_data['image']) && !empty($post_data['image'])){
                        foreach($post_data['image'] as $image){
                            $post_data['image'] = Helper::Image_upload($image,$this->path);
                            $query = ProductImage::create($post_data);
                        }
                        if ($query) {
                            return response()->json(['status' => 'success']);   
                        } else {
                            return response()->json(['status' => 'not_add']);
                        }
                }
            // }
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
        $data['product'] = ProductDetail::get();
        $data['images'] = ProductImage::where('product_detail_id', $id)->get();
        // $data['image'] = ProductImage::get();
        // dd($data['image']);
        return view('admin.product_image.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $post_data = $request->all(); 
        if (isset($post_data['image']) && !empty($post_data['image'])) {
            $old_images = ProductImage::where('product_id', $post_data['product_id'])->get();
                    foreach($old_images as $old_image){
                    Helper::Image_delete($old_image['image'],$this->path);
                    $query = ProductImage::where('product_id', $post_data['product_id'])->delete();
                    }
                if($images = $post_data['image']){      
                    foreach($images as $image){
                    $post_data['image'] = Helper::Image_upload($image,$this->path);
                    $query = ProductImage::create($post_data);
                    }
                    if ($query) {
                        return response()->json(['status' => 'success']);
                        
                    } else {
                            return response()->json(['status' => 'not_update']);
                    }
                }
                
            }
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
