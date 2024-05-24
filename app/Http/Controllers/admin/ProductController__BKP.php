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
        // $data['categories'] = Category::get();
        // $data['sub_categories'] = Subcategory::get();
        $data['color'] = Color::get();
        $data['size'] = Size::get();
        // $data['product'] = Product::find($id);
        // // dd($data['product']);
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
    public function psc()
    {
        $data['color'] = Color::get();
        $data['size'] = Size::get();
        $data['product'] = Product::get();
        $data['product_dimension'] = Productdimension::get();
        $data['product_material'] = Productmaterial::get();
        $data['product_weight'] = Productweight::get();
        $data['product_special_feature'] = ProductSpecialFeature::get();

        return view('admin.product2.psc')->with($data);
    }
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

    public function psc_store(Request $request)
    {
        $post_data = $request->all();
        $validator = Validator::make($post_data, [

            'product_id' => 'required',
            'size_id' => 'required',
            'color_id' => 'required',
            'product_dimension_id' => 'required',
            'product_weight_id' => 'required',
            'product_material_id' => 'required',
            'product_special_feature_id' => 'required',
            // 'available_stock' => 'required',
            // 'today\'s_deal' => 'required|in:yes',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        } else {

            $query = ProductSizeColor::create($post_data);
            Helper::Activity_history("Add Product Dimension");

            if ($query) {
                return response()->json(['status' => 'success']);
            } else {
                return response()->json(['status' => 'not_add']);
            }
        }
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
                        $product_detail[] = ProductDetail::create($inser_data);
                    }
                    if ($product_detail) {
                            unset($inser_data['product_size_color_id'],$inser_data['title'],$inser_data['color_size_combination'],$inser_data['description'],$inser_data['quantity'],$inser_data['mrp'],$inser_data['discount'],$inser_data['discount_type'],$inser_data['discount_price']);
                            foreach ($product_detail  as $index => $product_detail){
                                $comb = $post_data['product_size_color'][$index];
                                $inser_data['product_detail_id'] = $product_detail->id;
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

    public function detail()
    {
        $data['product_size_color'] = ProductSizeColor::with('detail')->get();
        return view('admin.product2.product_detail')->with($data);
    }

    public function detail_store(Request $request)
    {
        $post_data = $request->all();
        // dd($post_data);

        $validator = Validator::make($post_data, [
            'product_size_color_id' => 'required',
            'quantity' => 'required',
            'title' => 'required',
            'description' => 'required',
            'mrp' => 'required',
            'discount' => 'required',
            'discount_type' => 'required',
            'discount_price' => 'required',
            // 'selling_price' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['status' => 'error', 'error' => $validator->errors()->toArray()]);
        } else {

            $query = ProductDetail::create($post_data);
            Helper::Activity_history("Add Product Detail");

            if ($query) {
                return response()->json(['status' => 'success']);
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
