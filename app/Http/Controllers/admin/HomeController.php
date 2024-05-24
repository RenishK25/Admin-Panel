<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Activityhistory;
use App\Models\Category;
use App\Models\Product;
use App\Models\Productbrand;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HomeController extends Controller
{
    public function index()
    {
      $data['product'] = Product::count();
      $data['category'] = Category::count();
      $data['subcategory'] = Subcategory::count();
      $data['product_brand'] = Productbrand::count();
      return view('admin.index')->with($data);
    }

    public function subcategory(Request $request){
      $post_data = $request->all();
      $subcategory =  Subcategory::where('category_id', $post_data['category_id'])->get();
      $data = '<option value="" selected disabled>Select Subcategory</option>';
      // dd($post_data);
      foreach($subcategory as $subcategory){
          if(isset($post_data['subcategory_id']) && $post_data['subcategory_id'] == $subcategory->id){
              $sel ="selected";
          } else{
              $sel ="";
          }
      $data .= '<option value="'.$subcategory->id.'" '.$sel.'>'.$subcategory->name.'</option>';
      }
      return response()->json(['status'=>'success','data'=>$data]);
    }

    public function show(){
      return view('admin.activity_history.index');
    }
    public function datatable(){
    $data = Activityhistory::get();
    return DataTables::of($data)->addIndexColumn()->make(true);
    }
}