<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Productbrand;
use App\Models\ProductDetail;
use App\Models\Productdimension;
use App\Models\ProductImage;
use App\Models\Productmaterial;
use App\Models\ProductSizeColor;
use App\Models\ProductSpecialFeature;
use App\Models\Productweight;
use App\Models\Size;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index');
    }
    public function create2()
    {
        $data['categories'] = Category::get();
        $data['sub_categories'] = Subcategory::get();
        $data['color'] = Color::get();
        $data['size'] = Size::get();
        $data['product_brand'] = Productbrand::get();
        $data['product_dimension'] = Productdimension::get();
        $data['product_material'] = Productmaterial::get();
        $data['product_weight'] = Productweight::get();
        $data['product_special_feature'] = ProductSpecialFeature::get();
        $data['product_size_color'] = ProductSizeColor::with('detail')->get();


        return view('admin.product2.add')->with($data);
    }
    public function edit2($id)
    {
        $data['color'] = Color::get();
        $data['size'] = Size::get();
        $data['product_brand'] = Productbrand::get();
        $data['product_dimension'] = Productdimension::get();
        $data['product_material'] = Productmaterial::get();
        $data['product_weight'] = Productweight::get();
        $data['product_special_feature'] = ProductSpecialFeature::get();
        $data['category'] = Category::get();
        $data['sub_categories'] = Subcategory::get();
        $data['product_brand'] = Productbrand::get();
        $data['product_size_color'] = ProductSizeColor::with('detail')->get();
        $data['product'] = Product::find($id);

        return view('admin.product2.edit')->with($data);
    }


    public function product_update(Request $request){
        $post_data = $request->all();
        $validator = Validator::make($post_data, [
            'name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            // 'product_id' => 'required',
/*             'size_id' => 'required',
            'color_id' => 'required',
            'product_dimension_id' => 'required',
            'product_weight_id' => 'required',
            'product_material_id' => 'required',
            'product_special_feature_id' => 'required', */
            // 'available_stock' => 'required',
            // 'today\'s_deal' => 'required|in:yes',
            // 'product_size_color_id' => 'required',
            // 'quantity' => 'required',
            // 'title' => 'required',
            // 'description' => 'required',
            // 'mrp' => 'required',
            // 'discount' => 'required',
            // 'discount_type' => 'required',
            // 'discount_price' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        } else {
            // $update_data['id'] = $post_data['product_id'];
            $update_data['name'] = $post_data['name'];
            $update_data['category_id'] = $post_data['category_id'];
            $update_data['sub_category_id'] = $post_data['sub_category_id'];
            $update_data['brand_id'] = $post_data['brand_id'];
            
            // $product = Product::create($update_data);
            // dd($update_data);
            $product_id = Product::where('id', $post_data['product_id'])->update($update_data);
            // dd(($post_data));
            Helper::Activity_history("Update Product");
            if ($product_id) {

                // $products = ProductSizeColor::where('product_id', $post_data['product_id'])->select('id','color_id','size_id')->get();
                if(isset($post_data['product_size_color_id']) && !empty($post_data['product_size_color_id'])){

                }
                $product_details = ProductDetail::whereIn('product_size_color_id', $post_data['product_size_color_id'])->select('id','color_size_combination')->get();

                unset($update_data['name'], $update_data['category_id'], $update_data['sub_category_id'], $update_data['brand_id']);
                foreach ($post_data['new_color_size_combination'] as $index => $new_combination) {
                    // dd(($product_details['color_size_combination']));
                    $i=0;
                    // if($new_combination == $product_details[$index]['color_size_combination']){
                    $product_size_color_id = ProductSizeColor::where('product_id', $post_data['product_id'])->select('id')->get();
                    // dd(($product_size_color_id[0]->id));
                        ++$i;
                        // dd(($new_combination.$product_details[$index]['color_size_combination']));
                            // dd($post_data);                            
    
                            // $update_data['product_id'] = $post_data['product_id'];
                            $update_data['product_dimension_id'] = $post_data['product_dimension_id'];
                            $update_data['product_weight_id'] = $post_data['product_weight_id'];
                            $update_data['product_material_id'] = $post_data['product_material_id'];
                            $update_data['product_special_feature_id'] = $post_data['product_special_feature_id'];
                            if(isset($post_data['size_id'][$index])){
                                $update_data['size_id'] = $post_data['size_id'][$index];
                            }else{
                                $update_data['size_id'] = $post_data['size_id'][$index - 1];
                            }
                            if(isset($post_data['color_id'][$index])){
                                $update_data['color_id'] = $post_data['color_id'][$index];
                            }else{
                                $update_data['color_id'] = $post_data['color_id'][$index - 1];
                            }
                            // $update_data['color_id'] = $post_data['color_id'][$index];
                            // dd($update_data);                            

                            if(isset($post_data['available_stock']) && $post_data["available_stock"] == "yes"){$update_data['available_stock'] = $post_data['available_stock'];}
                            if(isset($post_data["today's_deal"]) && $post_data["today's_deal"] == "yes"){$update_data["today's_deal"] = $post_data["today's_deal"];}
                            // unset($update_data['color_size_combination'], $update_data['product_dimension_id'], $update_data['product_weight_id'], $update_data['product_material_id'], $update_data['product_special_feature_id'], $update_data['size_id'], $update_data['color_id']);
                            ProductSizeColor::where('id', $product_size_color_id[$index]->id)->update($update_data);
        
                            if(isset($update_data['available_stock'])){unset($update_data['available_stock']);}
                            if(isset($update_data["today's_deal"])){unset($update_data["today's_deal"]);}
                            unset($update_data['product_dimension_id'], $update_data['product_weight_id'], $update_data['product_material_id'], $update_data['product_special_feature_id'], $update_data['size_id'], $update_data['color_id']);
                           
                            $update_data['color_size_combination'] = $post_data['new_color_size_combination'][$index];
                            $update_data['mrp'] = $post_data['mrp'][$index];
                            $update_data['discount'] = $post_data['discount'][$index];
                            $update_data['discount_type'] = $post_data['discount_type'][$index];
                            $update_data['discount_price'] = $post_data['discount_price'][$index];
                            $update_data['quantity'] = $post_data['quantity'][$index];
                            // dd(($update_data));
                            // dd(($new_combination.$product_details[$index]['color_size_combination']));
                            // dd(($product_details[$index]['color_size_combination']));
                            // dd($post_data); 
                        if($new_combination == $product_details[$index]['color_size_combination']){

    
                        $product_update = ProductDetail::where('id', $product_details[$index]->id)->update($update_data);
                        unset($update_data['color_size_combination'], $update_data['mrp'], $update_data['discount'], $update_data['discount_type'], $update_data['discount_price'], $update_data['quantity']);

                    }else{
                        $exist_variant = "";
                        $not_exist_variant = "";
                        foreach($product_details as $product_detail){
                            // dd($product_detail['color_size_combination']);
                            if($product_detail['color_size_combination'] == $update_data['color_size_combination']){
                                $exist_variant = $product_detail['id'];
                            }else{
                                $not_exist_variant = $product_detail['id'];
                            }
                        }
                        if(isset($exist_variant) && !empty($exist_variant)){
                            $product_update = ProductDetail::where('id', $exist_variant)->update($update_data);
                        }else{
                            // dd($post_data);        
                        $update_data['product_id'] = $post_data['product_id'];
                        $update_data['product_dimension_id'] = $post_data['product_dimension_id'];
                        $update_data['product_weight_id'] = $post_data['product_weight_id'];
                        $update_data['product_material_id'] = $post_data['product_material_id'];
                        $update_data['product_special_feature_id'] = $post_data['product_special_feature_id'];
                        if(isset($post_data['available_stock']) && $post_data["available_stock"] == "yes"){$update_data['available_stock'] = $post_data['available_stock'];}
                        if(isset($post_data["today's_deal"]) && $post_data["today's_deal"] == "yes"){$update_data["today's_deal"] = $post_data["today's_deal"];}
                        $update_data['size_id'] = $post_data['size_id'][$index];
                        $update_data['color_id'] = $post_data['color_id'][$index];

                // foreach ($post_data['size_id'] as $size) {
                //     foreach ($post_data['color_id'] as $color) {
                //         $update_data['size_id'] = $size;
                //         $update_data['color_id'] = $color;
                //     }
                unset($update_data['color_size_combination'], $update_data['mrp'], $update_data['discount'], $update_data['discount_type'], $update_data['discount_price'], $update_data['quantity']);

                        $product_size_color = ProductSizeColor::create($update_data);
                        unset($update_data['product_id'], $update_data['product_dimension_id'], $update_data['product_weight_id'], $update_data['product_material_id'], $update_data['product_special_feature_id'], $update_data['size_id'], $update_data['color_id']);
                        
                        
                        // $product_size_color_id = ProductSizeColor::where('product_id', $post_data['product_id'])->select('id')->get();
                        if(isset($update_data['available_stock'])){unset($update_data['available_stock']);}
                            if(isset($update_data["today's_deal"])){unset($update_data["today's_deal"]);}
                            $update_data['product_size_color_id'] = $product_size_color->id;
                            $update_data['color_size_combination'] = $post_data['color_size_combination'][$index];
                            $update_data['mrp'] = $post_data['mrp'][$index];
                            $update_data['discount'] = $post_data['discount'][$index];
                            $update_data['discount_type'] = $post_data['discount_type'][$index];
                            $update_data['discount_price'] = $post_data['discount_price'][$index];
                            $update_data['quantity'] = $post_data['quantity'][$index];
                            $update_data['title'] = "test";
                            $update_data['description'] = "test";
                                $product_update = ProductDetail::create($update_data);
                                // $product_details = ProductDetail::where('id', $product_details[$index]['id'])->delete();
                                // $query = ProductDetail::find($not_exist_variant)->delete();
                }                    
                        }
                    }
                    unset($update_data['color_size_combination'], $update_data['mrp'], $update_data['discount'], $update_data['discount_type'], $update_data['discount_price'], $update_data['quantity']);

                    if(isset($post_data["image".$new_combination])){
                        foreach($post_data["image".$new_combination] as $image){
                        $update_image_data['image'] = Helper::Image_upload($image,"upload/product_image/");
                        $images = ProductImage::where('product_detail_id', $product_details)->update($update_image_data);
                        }
                    }
                    if($product_update){
                        return response()->json(['status'=>'success']);
                    }
                }

                
                // $detail = ProductDetail::whereIn('product_size_color_id',$post_data['product_size_color_id'])->get();
                // dd($color_size_combination[0]);
                
                
                
                
                
                // foreach ($post_data['color_size_combination'] as $index => $new_combination) {
                //     if($new_combination == $color_size_combination[$index]){

                //         if(isset($post_data["image".$new_combination])){
                //         foreach($post_data["image".$new_combination] as $image){
                //             $inser_data['image'] = Helper::Image_upload($image,"upload/product_image/");

                //         }
                //         }

                //     } 
                // }


                // foreach ($products as $product) {
                    //  echo $product['color_id'];
                    //  dd($product['color_id']);
                    // foreach ($post_data['size_id'] as $size) {
                    //     foreach ($post_data['color_id'] as $color) {
                    //         if($product['color_id'] != $color && $product['size_id'] != $size){
                    //         // $product_size_color[] = ProductSizeColor::create($update_data);
                    //         $product_size_color = ProductSizeColor::where('id', $product['id'])->update($update_data);
                    //         }
                    //         break;
                    //     }
                    //     break;
                    // }
                // }
            // }
        }
       

    }

    public function size_color(Request $request)
    {
        $post_data = $request->all();
        $product_size_color = ProductSizeColor::where('product_id',$post_data['product_id'])->distinct()->pluck($post_data['get_value']);
        // dd($product_size_color);
        if($post_data['get_value'] == 'size_id'){
            $values = Size::get();
        $data = '<option value="" disabled>Select Product Size</option>';
        } else if($post_data['get_value'] == 'color_id'){
            $values = Color::get();
        $data = '<option value="" disabled>Select Product Color</option>';
        } else if($post_data['get_value'] == 'product_dimension_id'){
            $values = Productdimension::get();
        $data = '<option value="" disabled>Select Product Dimension</option>';
        } else if($post_data['get_value'] == 'product_weight_id'){
            $values = Productweight::get();
        $data = '<option value="" disabled>Select Product Weight</option>';
        } else if($post_data['get_value'] == 'product_special_feature_id'){
            $values = ProductSpecialFeature::get();
        $data = '<option value="" disabled>Select Product Special Feature</option>';
        } else if($post_data['get_value'] == 'product_material_id'){
            $values = Productmaterial::get();
        $data = '<option value="" disabled>Select Product Matarial</option>';
        }
        // $data = '<option value="" disabled>Select Product Dimension</option>';
        $count = 0;
        foreach($values as $value){
        if(isset($product_size_color[$count]) && $product_size_color[$count] == $value->id){
            $sel ="selected";
            $count++;
        } else{
            $sel ="";
        }
            $data .= '<option value="'.$value->id.'" '.$sel.'>'.$value->name.'</option>';
        }
        return response()->json(['status'=>'success','data'=>$data]);
    }

    public function is_available(Request $request){
        $post_data = $request->all();
        $is_available = ProductSizeColor::where('product_id',$post_data['product_id'])->value($post_data['get_value']);
        // dd($available_stock);
        if(isset($is_available) && $is_available == 'yes'){
            $checked ="checked";
            // $count++;
        } else{
            $checked ="";
        }
        return response()->json(['status'=>'success','data'=>$checked]);
    }

    public function detail(Request $request){
        $post_data = $request->all();
        $detail_id = ProductSizeColor::where('product_id',$post_data['product_id'])->pluck('id');
        $detail = ProductDetail::whereIn('product_size_color_id',$detail_id)->get();
        
        // dd($detail);
        
        return response()->json(['status'=>'success','data'=>$detail]);
    }
    // public function color(Request $request)
    // {`
    //     $post_data = $request->all();
    //     // $product_size_color = ProductSizeColor::where('product_id',$post_data['product_id'])->select('color_id')->get();
    //     $product_size_color = ProductSizeColor::where('product_id',$post_data['product_id'])->pluck('color_id');
    //     // dd($product_size_color[0]['color_id']);
    //     // dd($product_size_color[]);
    //     $color = Color::get();
    //     $data = '<option value="" disabled>Select Color</option>';
    //     $count = 0;
    //     foreach($color as $color){
    //     if(isset($product_size_color[$count]) && $product_size_color[$count] == $color->id){
    //         $sel ="selected";
    //         $count++;
    //     } else{
    //         $sel ="";
    //     }
    //     // dd($product_size_color[$count]['color_id'].$sel);
    //         $data .= '<option value="'.$color->id.'" '.$sel.'>'.$color->name.'</option>';
    //     }
    //     return response()->json(['status'=>'success','data'=>$data]);
    // }

    public function color_size_name_get(Request $request)
    {
        $post_data = $request->all();
        foreach ($post_data['color_id'] as $color_id) {
            $color[] = Color::where(['id' => $color_id,])->get();
        }
        
        foreach ($post_data['size_id'] as $size_id) {
            $size[] = Size::where(['id' => $size_id,])->get();
        }
        return response()->json(['color' => $color, 'size' => $size]);
    }

    public function product(Request $request)
    {
        $post_data = $request->all();
        $validator = Validator::make($post_data, [
            'name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
            // 'product_id' => 'required',
            'size_id' => 'required',
            'color_id' => 'required',
            'product_dimension_id' => 'required',
            'product_weight_id' => 'required',
            'product_material_id' => 'required',
            'product_special_feature_id' => 'required',
            // 'available_stock' => 'required',
            // 'today\'s_deal' => 'required|in:yes',
            // 'product_size_color_id' => 'required',
            // 'quantity' => 'required',
            // 'title' => 'required',
            // 'description' => 'required',
            // 'mrp' => 'required',
            // 'discount' => 'required',
            // 'discount_type' => 'required',
            // 'discount_price' => 'required',
        ]);
        $inser_data['name'] = $post_data['name'];
        $inser_data['category_id'] = $post_data['category_id'];
        $inser_data['sub_category_id'] = $post_data['sub_category_id'];
        $inser_data['brand_id'] = $post_data['brand_id'];
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        } else {
            $product = Product::create($inser_data);
            Helper::Activity_history("Add Product");
            if ($product) {
                unset($inser_data['name'], $inser_data['category_id'], $inser_data['sub_category_id'], $inser_data['brand_id']);
                $inser_data['product_id'] = $product->id;
                $inser_data['product_dimension_id'] = $post_data['product_dimension_id'];
                $inser_data['product_weight_id'] = $post_data['product_weight_id'];
                $inser_data['product_material_id'] = $post_data['product_material_id'];
                $inser_data['product_special_feature_id'] = $post_data['product_special_feature_id'];
                if(isset($post_data['available_stock']) && $post_data["available_stock"] == "yes"){$inser_data['available_stock'] = $post_data['available_stock'];}
                if(isset($post_data["today's_deal"]) && $post_data["today's_deal"] == "yes"){$inser_data["today's_deal"] = $post_data["today's_deal"];}
                foreach ($post_data['size_id'] as $size) {
                    foreach ($post_data['color_id'] as $color) {
                        $inser_data['size_id'] = $size;
                        $inser_data['color_id'] = $color;
                        $product_size_color[] = ProductSizeColor::create($inser_data);
                    }
                }
                if ($product_size_color) {
                    unset($inser_data['product_id'], $inser_data['size_id'], $inser_data['color_id'], $inser_data['product_dimension_id'], $inser_data['product_weight_id'], $inser_data['color_size_combination'], $inser_data['product_material_id'], $inser_data['product_special_feature_id']);
                    foreach ($product_size_color  as $index => $product_size_color) {
                        $inser_data['product_size_color_id'] = $product_size_color->id;
                        $inser_data['title'] = $post_data['title'];
                        $inser_data['description'] = $post_data['description'];
                        $inser_data['color_size_combination'] = $post_data['color_size_combination'][$index];
                        $inser_data['quantity'] = $post_data['quantity'][$index];
                        $inser_data['mrp'] = $post_data['mrp'][$index];
                        $inser_data['discount'] = $post_data['discount'][$index];
                        $inser_data['discount_type'] = $post_data['discount_type'][$index];
                        $inser_data['discount_price'] = $post_data['discount_price'][$index];
                        $product_details[] = ProductDetail::create($inser_data);
                    }
                    if ($product_details) {
                            unset($inser_data['product_size_color_id'],$inser_data['title'],$inser_data['color_size_combination'],$inser_data['description'],$inser_data['quantity'],$inser_data['mrp'],$inser_data['discount'],$inser_data['discount_type'],$inser_data['discount_price']);
                            foreach ($product_details  as $index => $product_details){
                                $comb = $post_data['product_size_color'][$index];
                                $inser_data['product_detail_id'] = $product_details->id;
                                foreach($post_data["image".$comb] as $image){
                                    $inser_data['image'] = Helper::Image_upload($image,"upload/product_image/");
                                    $images = ProductImage::create($inser_data);
                                }
                            }
                            if ($images) {
                                return response()->json(['status' => 'success']);   
                            } else {
                                return response()->json(['status' => 'not_add']);
                            }
                    } else {
                        return response()->json(['status' => 'not_add']);
                    }

                } else {
                    return response()->json(['status' => 'not_add']);
                }
            } else {
                return response()->json(['status' => 'not_add']);
            }
        }
    }

    public function datatable()
    {
        $data = Product::with('category', 'sub_category', 'brand')->get();
        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('category', function (Product $category) {
                return $category->category->name;
            })
            ->addColumn('sub_category', function (Product $subcatategory) {
                return    $subcatategory->sub_category->name;
            })
            ->addColumn('product_brand', function (Product $productbrand) {
                return   $productbrand->brand->name;
            })
            ->addColumn('action', function ($row) {
                $btn = '<div>
            <a href="' . url("admin/product/" . $row->id . "/edit") . '" title="Edit Record!"> <i class="bx bx-edit bx-sm" style="color:green;"></i> </a>
            <a data-id=' . $row->id . ' class="delete" title="Delete Record!">  <i class="mdi mdi-delete mdi-24px" style="color:red;"></i> </a></div>';
                return $btn;
            })
            ->rawColumns(['category', 'sub_category', 'product_brand', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['category'] = Category::get();
        $data['sub_category'] = Subcategory::get();
        $data['product_brand'] = Productbrand::get();

        return view('admin.product.add')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post_data = $request->all();

        $validator = Validator::make($post_data, [
            'name' => 'required',
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'brand_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        } else {
            $query = Product::create($post_data);
            Helper::Activity_history("Add Product");

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

        $data['category'] = Category::get();
        $data['sub_category'] = Subcategory::get();
        $data['product_brand'] = Productbrand::get();
        $data['product'] = Product::find($id);

        return view('admin.product.edit')->with($data);
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
            'sub_category_id' => 'required',
            'brand_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        } else {
            unset($post_data['_token'], $post_data['_method']);
            $update = Product::where('id', $post_data['id'])->update($post_data);
            Helper::Activity_history("Update Product");
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
        $query = Product::find($request['id'])->delete();
        Helper::Activity_history("Delete Product Dimension");

        if ($query) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'not_delete']);
        }
    }
}
