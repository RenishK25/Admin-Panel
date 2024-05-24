<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Activityhistory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    protected $path = 'upload/category/';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.category.index');
    }


    public function datatable(){
        $data = Category::select('id', 'name','image')->get();
        return DataTables::of($data)->addIndexColumn()
        ->addColumn('image', function ($row) {
            return '<img src="' . url('storage/upload/category/' . $row->image) . '" class="image-fluid"  border="0" width="50" height="50" align="center" />';
        })
        ->addColumn('action', function ($row) {
            $btn ='<div>
            <a href="' . url("admin/category/edit", $row->id) . '" title="Edit Record"> <i class="bx bx-edit bx-sm" style="color:green;"></i> </a>
            <a data-id=' . $row->id . ' class="delete" title="Delete Record">  <i class="mdi mdi-delete mdi-24px" style="color:red;"></i> </a></div>';             
            return $btn;
 
            //     $action = '<div class="dropdown d-inline-block">
            //     <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            //         <i class="ri-more-fill align-middle"></i>
            //     </button>
            //     <ul class="dropdown-menu dropdown-menu-end">
            //         <li><a href="' . url("admin/category/edit", $row->id) . '" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
            //         <li>
            //             <a href="javascript:void(0)" data-id="' . $row->id . '" class="delete dropdown-item remove-item-btn">
            //                 <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</>
            //             </a>
            //         </li>
            //     </ul>
            // </div>';
            // return $action;
            })
            
        ->rawColumns(['action','image'])
        ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post_data = $request->all();
        $validator = Validator::make($post_data, [
            'name' => 'required',
            'image' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        }else{  
            if (isset($post_data['image']) && !empty($post_data['image'])) {
                $post_data['image'] = Helper::Image_upload($post_data['image'],$this->path);
            }
            $query = Category::create($post_data);
            Helper::Activity_history("Add Category");
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['category'] = Category::find($id);
        return view('admin.category.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $post_data = $request->all();
        $validator = Validator::make($post_data, [

            'name' => 'required',
            // 'image' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        }else{
            if (isset($post_data['image']) && !empty($post_data['image'])) {
                $old_image = category::where('id', $post_data['id'])->first();
                Helper::Image_delete($old_image['image'],$this->path);
            
                $post_data['image'] = Helper::Image_upload($post_data['image'],$this->path);
            }
            unset($post_data['_token']);
            $update = category::where('id', $post_data['id'])->update($post_data);
            Helper::Activity_history("Update Category");
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
       
        $old_image = category::where('id', $request['id'])->first();
        Helper::Image_delete($old_image['image'],$this->path);

        $query = category::find($request['id'])->delete();
        $change = "Delete Category";
        Helper::Activity_history($change);
        if ($query) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'not_delete']);
        }
    }
}
