@extends("admin.layout.app")

@section("title","")


@section("style")

<link href="{{ url('public/assets/admin/cdn.jsdelivr.net/npm/select2%404.1.0-rc.0/dist/css/select2.min.css') }}" rel="stylesheet" />
<link href="{{url('')}}/public/assets/admin/libs/quill/quill.core.css" rel="stylesheet" type="text/css" />
<link href="{{url('')}}/public/assets/admin/libs/quill/quill.bubble.css" rel="stylesheet" type="text/css" />
<link href="{{url('')}}/public/assets/admin/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"/> --}}

<style>

</style>
@endsection

@section("content")



<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Add Product</h4>
    </div>
  </div>
</div>
<!-- end page title -->

<div class="row">
  <div class="col-xxl-12">
    <div class="card">
      <div class="card-header align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Product</h4>
      </div><!-- end card header -->

      <div class="card-body">
        {{-- <div class="live-preview"> --}}
          <form>
            @csrf
            <div class="col-md-">
              {{-- <div class="card"> --}}
                {{-- <div class="card-body"> --}}
                  <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">Category</label>
                        <select class="form-control" name="category_id" id="category_id" class="category_id">
                          <option value="" disabled selected>Select Category</option>
                          @foreach ($categories as $category)
                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                        </select>
                        <div class="error"><span id="category_id" class="text-danger"></span></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">Sub Category</label>
                        <select class="form-control" name="sub_category_id" id="sub_category_id">
                          <option value="">Select Subcategory</option>
                          @foreach ($sub_categories as $sub_category)
                          <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                          @endforeach
                        </select>
                        <div class="error"><span id="sub_category_id" class="text-danger"></span></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="">Product Brand</label>
                        <select class="form-control" name="brand_id" id="brand_id">
                          <option value="">Select Subcategory</option>
                          @foreach ($product_brand as $product_brand)
                          <option value="{{ $product_brand->id }}">{{ $product_brand->name }}</option>
                          @endforeach
                        </select>
                        <div class="error"><span id="brand_id" class="text-danger"></span></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" name="name" id="" class="form-control" value="{{old('name')}}">
                        <div class="error"><span id="name" class="text-danger"></span></div>
                      </div>
                    </div>
                  </div>
                  {{--
                </div> --}}
                {{-- </div> --}}
            </div>
          </form>
          {{--
        </div> --}}
      </div>
    </div>
  </div> <!-- end col -->

  <div class="col-xxl-12">
    <div class="card">
      <div class="card-header align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">PRODUCT Size Color</h4>
      </div><!-- end card header -->
      <div class="card-body">
        <div class="live-preview">
          <form>
            @csrf
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">Size </label>
                        {{-- <select class="form-control" name="size_id" id="size_id" class="size_id"> --}}
                        <select class="js-example-basic-multiple" name="size_id[]" id="size_id" multiple="multiple">
                          <option value="" selected disabled>Select Product Size</option>
                          @foreach ($size as $size)
                          <option value="{{ $size->id }}">{{
                            $size->name .' => '.$size->value }}</option>
                          @endforeach
                        </select>
                        <div class="error"><span id="size_id" class="text-danger"></span></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">Color </label>
                        {{-- <select class="form-control" name="color_id" id="color_id" class="color_id"> --}}
                        <select class="js-example-basic-multiple" name="color_id[]" id="color_id" multiple="multiple">
                          <option value="" disabled selected>Select Product Color</option>
                          @foreach ($color as $color)
                          <option value="{{ $color->id }}" style="background-color:{{$color->value}};color:visible;">{{
                            $color->name .' => '.$color->value }}</option>

                          @endforeach
                        </select>
                        <div class="error"><span id="color_id" class="text-danger"></span></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">Product Dimension </label>
                        <select class="form-control" name="product_dimension_id" id="product_dimension_id"
                          class="product_dimension_id">
                          <option value="" disabled selected>Select Product Dimension</option>

                        </select>
                        <div class="error"><span id="product_dimension_id" class="text-danger"></span></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">Product Weight </label>
                        <select class="form-control" name="product_weight_id" id="product_weight_id"
                          class="product_weight_id">
                          <option value="" disabled selected>Select Product Weight</option>

                        </select>
                        <div class="error"><span id="product_weight_id" class="text-danger"></span></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">Product Material </label>
                        <select class="form-control" name="product_material_id" id="product_material_id"
                          class="product_material_id">
                          <option value="" disabled selected>Select Product Material</option>

                        </select>
                        <div class="error"><span id="product_material_id" class="text-danger"></span></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">Product Special Feature </label>
                        <select class="form-control" name="product_special_feature_id" id="product_special_feature_id"
                          class="product_special_feature_id">
                          <option value="" disabled selected>Select Product Special Feature</option>

                        </select>
                        <div class="error"><span id="product_special_feature_id" class="text-danger"></span></div>
                        <br>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">Is Stock Available</label>
                        <input type="checkbox" value="yes" name="available_stock" id="available_stock">
                        <div class="error"><span id="available_stock" class="text-danger"></span></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">Today's Deal</label>
                        <input type="checkbox" value="yes" name="today's_deal" id="today's_deal">
                        <div class="error"><span id="today's_deal" class="text-danger"></span></div>
                        <br>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-12">
                      <div id="product_variant_detail" style="dispaly:block">
                        {{-- <table class="table table-bordered" style="border:2px solid black">
                          <thead>
                            <tr class="" style="border:2px solid black">
                              <td class="text-center">Variant </td>
                              <td class="text-center"> Price </td>
                              <td class="text-center"> Discount </td>
                              <td class="text-center"> Discount Type </td>
                              <td class="text-center"> Discount Price </td>
                              <td class="text-center"> Quantity </td>
                              <td class="text-center"> Photo </td>
                            </tr>
                          </thead>
                          <tbody> --}}
                            {{-- <tr id="row">
                              <td>
                                <label>AliceBlue</label>
                              </td>
                              <td>
                                <div class="form-group">
                                  <input type="number" class="form-control" name="mrp" id="mrp">
                                  <div class="error"><span id="mrp" class="text-danger"></span></div>
                                </div>
                              </td>
                              <td>
                                <div class="form-group">
                                  <input class="form-control" type="text" name="discount" id="discount">
                                  <div class="error"><span id="discount" class="text-danger"></span></div>
                                </div>
                              </td>
                              <td>
                                <div class="form-group">
                                  <select class="form-control" name="discount_type" id="discount_type"
                                    class="discount_type">
                                    <option value="" disabled selected>Select Product</option>
                                    <option value="percentage">Percentage</option>
                                    <option value="flat">Flat</option>
                                  </select>
                                  <div class="error"><span id="discount_type" class="text-danger"></span></div>
                                </div>
                              </td>
                              <td>
                                <div class="form-group">
                                  <input type="number" class="form-control" name="discount_price" id="discount_price">
                                  <div class="error"><span id="discount_price" class="text-danger"></span></div>
                                </div>
                              </td>
                              <td>
                                <div class="form-group">
                                  <input type="number" name="quantity" id="quantity" min="0" class="form-control"
                                    required="">
                                  <div class="error"><span id="quantity" class="text-danger"></span></div>
                                </div>
                              </td>
                              <td>
                                <input type="file" name="image" id="image">
                              </td>
                            </tr> --}}
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> <!-- end col -->
</div>
<!--end row-->

<div class="row">
  <div class="col-xxl-12">
    <div class="card">
      <div class="card-header align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Product Detail</h4>

      </div><!-- end card header -->
      <div class="card-body">
        {{-- <div class="live-preview"> --}}
          <form>
            @csrf
            <div class="col-md-12">
              {{-- <div class="card">
                <div class="card-body"> --}}
                  <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">Product Size Color </label>
                        <select class="form-control" name="product_size_color_id" id="product_size_color_id"
                          class="product_size_color_id">
                          <option value="" disabled selected>Select Product</option>
                          @foreach ($product_size_color as $product_size_color)
                          <option value="{{ $product_size_color->id }}">{{ $product_size_color->detail[0]->name }}
                          </option>
                          @endforeach
                        </select>
                        <div class="error"><span id="product_size_color_id" class="text-danger"></span></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">Title</label>
                        <input class="form-control" type="text" name="title" id="title">
                        <div class="error"><span id="title" class="text-danger"></span></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-12">
                      <div class="form-group">
                        <label for="name">Description </label>
                        {{-- <div class="ckeditor-classic">HELLLedjhfih</div> --}}
                        <textarea class="ckeditor-classic form-control" name="description" id="description"></textarea>
                        {{-- <input class="form-control" type="text" name="description" id="description"> --}}
                        <div class="error"><span id="description" class="text-danger"></span></div>
                      </div>
                    </div>
                    {{-- <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">Quantity </label>
                        <input class="form-control" type="text" name="quantity" id="quantity">
                        <div class="error"><span id="quantity" class="text-danger"></span></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">MRP </label>
                        <input type="number" class="form-control" name="mrp" id="mrp">
                        <div class="error"><span id="mrp" class="text-danger"></span></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">Discount </label>
                        <input class="form-control" type="text" name="discount" id="discount">
                        <div class="error"><span id="discount" class="text-danger"></span></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">Discount Type </label>
                        <select class="form-control" name="discount_type" id="discount_type" class="discount_type">
                          <option value="" disabled selected>Select Product</option>
                          <option value="percentage">Percentage</option>
                          <option value="flat">Flat</option>
                        </select>
                        <div class="error"><span id="discount_type" class="text-danger"></span></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">Discount Price </label>
                        <input type="number" class="form-control" name="discount_price" id="discount_price">
                        <br>
                        {{-- <div class="error"><span id="discount_price" class="text-danger"></span></div> --}}
                      {{-- </div>
                    </div> --}} 
                    {{-- <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">Selling Price </label>
                        <input type="number" class="form-control" name="selling_price" id="selling_price">
                        <div class="error"><span id="selling_price" class="text-danger"></span></div>
                      </div>
                    </div> --}}
                    <div class="col-lg-12">
                      <div class="text-end">
                        <br>
                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                        <a type="submit" href="{{ url('admin/product/psc') }}" class="btn btn-danger">Cancel</a>
                      </div>
                    </div>
                  </div>
                  {{--
                </div>
              </div> --}}
            </div>
          </form>
          {{--
        </div> --}}
        <div class="d-none code-view">
        </div>
      </div>
    </div>
  </div>
  <div class="col-xxl-12">
    <div class="card">
      <div class="card-header align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Horizontal Form</h4>
      </div><!-- end card header -->
      <div class="card-body">
        
        <div class="live-preview">
        {{-- <p class="text-muted">Use <code>ckeditor-classic</code> class to set ckeditor classic editor.</p>
        <div class="ckeditor-classic"></div> --}}
    {{-- </div><!-- end card-body --> --}}
        </div>
        <div class="d-none code-view">
          <pre class="language-markup" style="height: 375px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->


@endsection


@section("script")
{{-- <script src="assets/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script> --}}

    <!-- quill js -->
    {{-- <script src="assets/libs/quill/quill.min.js"></script> --}}

    <!-- init js -->
    {{-- <script src="assets/js/pages/form-editor.init.js"></script> --}}
<script type="text/javascript">
    $(document).ready(function () {
      $(document).on('change', '#category_id', function(){
        // alert();
          var category_id = $("#category_id").val();  
          $.ajaxSetup({
          headers: {
                  'X-CSRF-TOKEN': "{{@csrf_token()}}"
                  },
          });
          $.ajax({
              type: 'post',
              dataType: 'JSON',
              url :"{{url('admin/size/product')}}",
              data: {'category_id': category_id},
              success: function(data) {
              $("#size_id").html(data.data);
              }
          })
          $.ajax({
              type: 'post',
              dataType: 'JSON',
              url :"{{url('admin/product_dimension/product')}}",
              data: {'category_id': category_id},
              success: function(data) {
              $("#product_dimension_id").html(data.data);
              }
          })

          $.ajax({
              type: 'post',
              dataType: 'JSON',
              url :"{{url('admin/product_weight/product')}}",
              data: {'category_id': category_id},
              success: function(data) {
              $("#product_weight_id").html(data.data);
              }
          })
          $.ajax({
              type: 'post',
              dataType: 'JSON',
              url :"{{url('admin/product_material/product')}}",
              data: {'category_id': category_id},
              success: function(data) {
              $("#product_material_id").html(data.data);
              }
          });
          $.ajax({
              type: 'post',
              dataType: 'JSON',
              url :"{{url('admin/product_special_feature/product')}}",
              data: {'category_id': category_id},
              success: function(data) {
              $("#product_special_feature_id").html(data.data);
              }
          })
          });
      function variant(){
        // $('#product_variant_detail').html('');
        var color = $('#color_id').val();
        var size = $('#size_id').val();
            var cols = '';
            cols += '<table class="table table-bordered" style="border:2px solid black"><thead>';
            cols += '<tr class="" style="border:2px solid black">';
            cols += '<td class="text-center">Variant </td>';
            cols += '<td class="text-center"> Price </td>';
            cols += '<td class="text-center"> Discount </td>';
            cols += '<td class="text-center"> Discount Type </td>';
            cols += '<td class="text-center"> Discount Price </td>';
            cols += '<td class="text-center"> Quantity </td><td class="text-center"> Photo </td>';
            cols += '</tr></thead>';
            $('#color_id option').each(function () {
              if ($(this).prop("selected") == true) {
                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': "{{@csrf_token()}}"
                        },
                });
                $.ajax({
                  type: "post",
                  url :"{{url('admin/product/color_size_name_get')}}",
                  data: {'color_id': color, 'size_id':size},
                  dataType: "JSON",
                  success: function (response) {
                    $('#product_variant_detail').html(cols);
                    $.each(response.color,function(key,value){
                      var product_color = value[0].id ;
                      $.each(response.size,function(keys,size_id){
                        var product_size_color = product_color + "-" + size_id[0].id;
                        console.log('#variant'+product_size_color);
                        var cols2 = '';
                        cols2 +='<tr><tbody><td><label id="variant" class="variant">'+ size_id[0].name +' - ' + value[0].name +'</label></td>'+
                                  '<td><div class="form-group"><input type="number" class="mrp form-control" data-mrpid="'+ product_size_color +'" name="mrp" id="mrp'+ product_size_color +'"><div class="error"><span id="mrp'+ product_size_color +'" class="text-danger"></span></div></div></td>'+
                                  '<td><div class="form-group"><input class="form-control" type="text" data-discount="'+ product_size_color +'" name="discount" id="discount'+ product_size_color +'"><div class="error"><span id="discount'+ product_size_color +'" class="text-danger"></span></div></div></td>'+
                                  '<td><div class="form-group"><select class="form-control" data-type="'+ product_size_color +'" name="discount_type" id="discount_type'+ product_size_color +'"class="discount_type"><option value="" disabled selected>Select Discount Type</option><option value="percentage">Percentage</option><option value="flat">Flat</option></select><div class="error"><span id="discount_type" class="text-danger"></span></div></div></td>'+
                                  '<td><div class="form-group"><input type="number" class="form-control" data-discountprice="'+ product_size_color +'" name="discount_price" id="discount_price'+ product_size_color +'"><div class="error"><span id="discount_price'+ product_size_color +'" class="text-danger"></span></div></div></td>'+
                                  '<td><div class="form-group"><input type="number" name="quantity" id="quantity" min="0" class="form-control"required=""><div class="error"><span id="quantity'+ product_size_color +'" class="text-danger"></span></div></div></td>'+
                                  '<td><input type="file" name="image" id="image"></td></tr>';
                        $('.table').append(cols2);
                      })
                    })
                  }
                });
              }else{
              $('#product_variant_detail').html('');
              }
            })
      }
      $("#color_id").on("change", function () {
        variant();
        
        });
      $("#size_id").on("change", function () {
        variant();
        });
    });
    </script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.js"></script> --}}
    {{-- <script src="{{ url('public/assets/admin/cdn.jsdelivr.net/npm/select2%404.1.0-rc.0/dist/js/select2.min.js') }}"></script> --}}
    {{-- <script src="{{ url('public/assets/admin/js/select/form-select2.min.js') }}"></script> --}}
    {{-- <script src="{{ url('public/assets/admin/js/select/select2.full.min.js"') }}"></script> --}}
    
    {{-- <script src="{{ url('public/assets/admin/js/pages/select2.init.js') }}"></script> --}}
    

<script type="text/javascript" src="{{ url('public/assets/admin/js/discount_type.min.js') }}"></script>

    <!--jquery cdn-->
    <!-- <script src="../../../../code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <!--select2 cdn-->
<script src="{{ url('public/assets/admin/cdn.jsdelivr.net/npm/select2%404.1.0-rc.0/dist/js/select2.min.js') }}"></script>

<script src="{{ url('public/assets/admin/js/pages/select2.init.js') }}"></script>
<script src="{{url('')}}/public/assets/admin/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<script src="{{url('')}}/public/assets/admin/libs/quill/quill.min.js"></script>
<script src="{{url('')}}/public/assets/admin/js/pages/form-editor.init.js"></script>


@endsection