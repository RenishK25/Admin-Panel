<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SubcategoryController extends Controller
{
    protected $path = 'upload/subcategory/';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.subcategory.index');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function datatable()
    {
        $data = Subcategory::with('category')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('category', function (Subcategory $category) {
                return $category->category->name;
            })
            ->addColumn('image', function ($row) {
                return '<img src="' . url('storage/upload/subcategory/' . $row->image) . '" border="0" width="50" height="50" align="center" />';
            })
            ->addColumn('action', function ($row) {
                $btn = '<div>
        <a href="' . url("admin/subcategory/edit", $row->id) . '" title="Edit Record!"> <i class="bx bx-edit bx-sm" style="color:green;"></i></a>
        <a data-id=' . $row->id . ' class="delete" title="Delete Record!">    <i class="mdi mdi-delete mdi-24px" style="color:red;"></i>  </a></div>';
                return $btn;
            })
            ->rawColumns(['color', 'size', 'image', 'category', 'action'])
            ->make(true);
    }
    public function create()
    {
        $data['category'] = Category::get();
        return view('admin.subcategory.add')->with($data);
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
            'category_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        } else {
            if (isset($post_data['image']) && !empty($post_data['image'])) {
                $post_data['image'] = Helper::Image_upload($post_data['image'],$this->path);
            }
            $query = Subcategory::create($post_data);
            Helper::Activity_history("Add Subcategory");
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
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data['category']   = Category::get();
        $data['sub_category'] = Subcategory::find($id);

        return view('admin.subcategory.edit')->with($data);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $post_data = $request->all();
        $validator = Validator::make($post_data, [
            'name' => 'required',
            'category_id' => 'required',
            // 'image' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        } else {
            if (isset($post_data['image']) && !empty($post_data['image'])) {
                $old_image = Subcategory::where('id', $post_data['id'])->first();
                Helper::Image_delete($old_image['image'],$this->path);
            
                $post_data['image'] = Helper::Image_upload($post_data['image'],$this->path);
            }
            unset($post_data['_token']);
            $update = Subcategory::where('id', $post_data['id'])->update($post_data);
            Helper::Activity_history("Update Subcategory");
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
        $old_image = Subcategory::where('id', $request['id'])->first();
        Helper::Image_delete($old_image['image'],$this->path);

        $query = Subcategory::find($request['id'])->delete();
        Helper::Activity_history("Delete Subcategory");
        if ($query) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'not_delete']);
        }
    }
}
