@extends("admin.layout.app")

@section("title","")


@section("style")

<link href="{{ url('public/assets/admin/cdn.jsdelivr.net/npm/select2%404.1.0-rc.0/dist/css/select2.min.css') }}"rel="stylesheet" />
<link href="{{url('')}}/public/assets/admin/libs/quill/quill.core.css" rel="stylesheet" type="text/css" />
<link href="{{url('')}}/public/assets/admin/libs/quill/quill.bubble.css" rel="stylesheet" type="text/css" />
<link href="{{url('')}}/public/assets/admin/libs/quill/quill.snow.css" rel="stylesheet" type="text/css" />
{{--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" /> --}}

<style>

</style>
@endsection

@section("content")

<form>
  @csrf
<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Update Product</h4>
    </div>
  </div>
</div>
<!-- end page title -->
  <div class="row">
    <div class="col-xxl-12">
      <div class="card">
        <div class="card-header align-items-center d-flex">
          <h4 class="card-title mb-0 flex-grow-1">Product 2</h4>
        </div><!-- end card header -->

        <div class="card-body">            
            <div class="col-md-">
                  <div class="row">
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="">Name</label>
                        <input type="hidden" name="product_id" id="product_id" value="{{$product->id}}">
                        <input type="text" name="name" id="" class="form-control" value="{{ $product->name }}">
                        <div class="error"><span id="name" class="text-danger"></span></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="">Product Brand</label>
                        <select class="form-control" name="brand_id" id="brand_id">
                          <option value="">Select Subcategory</option>

                          @foreach ($product_brand as $product_brand)
                        {{$product->brand_id == $product_brand->id ? $sel ="selected" : $sel="" }}
                        <option value="{{ $product_brand->id }}" {{$sel}}>{{ $product_brand->name }}</option>
                        @endforeach
                        </select>
                        <div class="error"><span id="brand_id" class="text-danger"></span></div>
                      </div>
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-6">
                      <div class="form-group">
                        <label for="name">Category</label>
                        <select class="form-control" name="category_id" id="category_id" class="category_id">
                          <option value="" disabled selected>Select Category</option>
                          @foreach ($category as $category)
                          {{$product->category_id == $category->id ? $sel ="selected" : $sel="" }}
                          <option value="{{ $category->id }}" {{$sel}}>{{ $category->name }}</option>
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
                          {{$product->sub_category_id == $sub_category->id ? $sel ="selected" : $sel="" }}
                          <option value="{{ $sub_category->id }}" {{$sel}}>{{ $sub_category->name }}</option>
                          @endforeach
                        </select>
                        <div class="error"><span id="sub_category_id" class="text-danger"></span></div>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
        </div>
      </div>
    </div><!-- end col -->

<div class="col-xxl-12">
  <div class="card">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">PRODUCT Size Color</h4>
    </div><!-- end card header -->
    <div class="card-body">
      <div class="live-preview">
        {{-- <form> --}}
          {{-- @csrf --}}
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-12 col-md-4 col-lg-6">
                    <div class="form-group">
                      <label for="name">Size </label>
                      {{-- <input type="hidden" name="size_id" id="size_id" value="{{$product->size_id}}"> --}}
                      <select class="js-example-basic-multiple" name="size_id[]" id="size_id" multiple="multiple">
                      </select>
                      <div class="error"><span id="size_id" class="text-danger"></span></div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-6">
                    <div class="form-group">
                      <label for="name">Color </label>
                      <select class="js-example-basic-multiple" name="color_id[]" id="color_id" multiple="multiple">
                        {{-- <option value="" disabled selected>Select Product Color</option> --}}
                        {{-- @foreach ($color as $color)
                        <option value="{{ $color->id }}" style="background-color:{{$color->value}};color:visible;">{{
                          $color->name .' => '.$color->value }}</option>
                        @endforeach --}}
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
                      <select class="form-control" name="product_weight_id" id="product_weight_id" class="product_weight_id">
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
                      {{-- {{dd($product)}} --}}
                      <input type="checkbox" value="yes" name="available_stock" id="available_stock">
                      <div class="error"><span id="available_stock" class="text-danger"></span></div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-6">
                    <div class="form-group">
                      <label for="name">Today's Deal</label>
                      <input type="checkbox" value="yes" name="today's_deal" id="today_deal">
                      <div class="error"><span id="today's_deal" class="text-danger"></span></div>
                      <br>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-12">
                    <div id="product_variant_detail"></div>
                  </div>
                  <div class="col-sm-12 col-md-4 col-lg-12">
                    <div id="product_size_color_id_div" class="product_size_color_id_div">
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
</div> <!-- end col -->


<div class="row">
  <div class="col-xxl-12">
    <div class="card">
      <div class="card-header align-items-center d-flex">
        <h4 class="card-title mb-0 flex-grow-1">Product Detail</h4>

      </div><!-- end card header -->
      <div class="card-body">
            <div class="col-md-12">
                  <div class="row">
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
                        <textarea class="ckeditor-classic form-control" name="description" id="description"></textarea>
                        <div class="error"><span id="description" class="text-danger"></span></div>
                      </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="text-end">
                        <br>
                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                        <a type="submit" href="{{ url('admin/product/psc') }}" class="btn btn-danger">Cancel</a>
                      </div>
                    </div>
                  </div>
            </div>
      </div>
    </div>
  </div>
</div>
</form>

@endsection


@section("script")

    <script src="assets/js/pages/form-editor.init.js"></script>
<script type="text/javascript">
          $.ajaxSetup({
          headers: {
                  'X-CSRF-TOKEN': "{{@csrf_token()}}"
                  },
          });
        var product_id = $("#product_id").val();
          $.ajax({
              type: 'post',
              dataType: 'JSON',
              url :"{{url('admin/product/size_color')}}",
              data: {'product_id': product_id, 'get_value':'size_id'},
              success: function(data) {
              $("#size_id").html(data.data);
              }
          });
          $.ajax({
              type: 'post',
              dataType: 'JSON',
              url :"{{url('admin/product/size_color')}}",
              data: {'product_id': product_id, 'get_value':'color_id'},
              success: function(data) {
              $("#color_id").html(data.data);
              }
          });
          $.ajax({
              type: 'post',
              dataType: 'JSON',
              url :"{{url('admin/product/size_color')}}",
              data: {'product_id': product_id, 'get_value':'product_dimension_id'},
              success: function(data) {
              $("#product_dimension_id").html(data.data);
              }
          });
          $.ajax({
              type: 'post',
              dataType: 'JSON',
              url :"{{url('admin/product/size_color')}}",
              data: {'product_id': product_id, 'get_value':'product_weight_id'},
              success: function(data) {
              $("#product_weight_id").html(data.data);
              }
          });
          $.ajax({
              type: 'post',
              dataType: 'JSON',
              url :"{{url('admin/product/size_color')}}",
              data: {'product_id': product_id, 'get_value':'product_material_id'},
              success: function(data) {
              $("#product_material_id").html(data.data);
              }
          });
          $.ajax({
              type: 'post',
              dataType: 'JSON',
              url :"{{url('admin/product/size_color')}}",
              data: {'product_id': product_id, 'get_value':'product_special_feature_id'},
              success: function(data) {
              $("#product_special_feature_id").html(data.data);
              }
          });
          $.ajax({
              type: 'post',
              dataType: 'JSON',
              url :"{{url('admin/product/is_available')}}",
              data: {'product_id': product_id, 'get_value':'available_stock'},
              success: function(data) {
              $("#available_stock").attr(data.data,' ');
              }
          });
          $.ajax({
              type: 'post',
              dataType: 'JSON',
              url :"{{url('admin/product/is_available')}}",
              data: {'product_id': product_id, "get_value":"today's_deal"},
              success: function(data) {
              $("#today_deal").attr(data.data,' ');
              }
          });
          
    $(document).ready(function () {
          var cols = '';
          function variant(){
            cols += '<table class="table table-bordered" style="border:2px solid black"><thead><tr class="" style="border:2px solid black"><td class="text-center">Variant </td><td class="text-center"> Price </td><td class="text-center"> Discount </td><td class="text-center"> Discount Type </td><td class="text-center"> Discount Price </td><td class="text-center"> Quantity </td><td class="text-center"> Photo </td></tr></thead>';
          }

          function variant_detail_db(){
            
          $('#product_variant_detail').html(cols);
          var color = $('#color_id').val();
          var size = $('#size_id').val();
          cols = '<table class="table table-bordered" style="border:2px solid black"><thead><tr class="" style="border:2px solid black"><td class="text-center">Variant </td><td class="text-center"> Price </td><td class="text-center"> Discount </td><td class="text-center"> Discount Type </td><td class="text-center"> Discount Price </td><td class="text-center"> Quantity </td><td class="text-center"> Photo </td></tr></thead>';
            $('#color_id option').each(function () {
              if ($(this).prop("selected") == true) {
                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': "{{@csrf_token()}}"
                        },
                });
                $.ajax({
                  type: "post",
                  url :"{{url('admin/product/detail')}}",
                  data: {'product_id': product_id},
                  dataType: "JSON",
                  success: function (response) {
                    $('#product_variant_detail').html(cols);
                    var cols3 = '';
                            cols3 = '<table class="product_size_color_id_value">';
                            $('#product_size_color_id_div').html(cols3);
                    // alert(response);
                    $.each(response.data,function(key,value){
                      // alert();
                     if(value.discount_type == "percentage"){
                      var sel = "selected";
                     }else if(value.discount_type == "flat"){
                      var sel2 = "selected";
                     }else{
                      var sel = "";
                      var sel2 = "";
                     }
                        var cols2 = '';
                        var product_size_color = "";
                        cols2 +='<tr class="mrp" data-mrpid="'+ value.id +'"><td><label id="variant" class="variant">'+value.color_size_combination+'</label></td>'+
                                '<td><div class="form-group"><input type="number" value="'+value.mrp+'" class="form-control"name="mrp[]" id="mrp'+ value.id +'"><div class="error"><span id="mrp'+ value.id +'" class="text-danger"></span></div></div></td>'+
                                '<td><div class="form-group"><input class="form-control" type="text" name="discount[]" value="'+value.discount+'" id="discount'+value.id +'"><div class="error"><span id="discount'+ value.id +'" class="text-danger"></span></div></div></td>'+
                                '<td><div class="form-group"><select class="form-control" name="discount_type[]" id="discount_type'+ value.id +'"class="discount_type"><option value="" disabled selected>Select Discount Type</option><option '+sel+' value="percentage">Percentage</option><option '+sel2+' value="flat">Flat</option></select><div class="error"><span id="discount_type" class="text-danger"></span></div></div></td>'+
                                '<td><div class="form-group"><input type="number" class="form-control" name="discount_price[]" value="'+value.discount_price+'" id="discount_price'+ value.id +'"><div class="error"><span id="discount_price'+ value.id +'" class="text-danger"></span></div></div></td>'+
                                '<td><div class="form-group"><input type="number" name="quantity[]" id="quantity" value="'+value.quantity+'" min="0" class="form-control"required=""><div class="error"><span id="quantity'+ value.id +'" class="text-danger"></span></div></div></td>'+
                                '<td><input type="file" name="image'+ value.id +'[]" id="image" multiple></td></tr>';
                                // alert(cols2);
                        $('.table').append(cols2);


                            var cols4 = '';
                            cols4 +='<tr><td><input type="hidden" name="color_size_combination[]" value="'+value.color_size_combination+'"></td>'+
                                    '<td><input type="hidden" name="product_detail_id[]" value="'+ value.id +'"></td>'+
                                    '<td><input type="hidden" name="product_size_color_id[]" value="'+ value.product_size_color_id +'"></td></tr>';
                                    // alert(cols4);
                        $('.product_size_color_id_value').append(cols4);
                        
                        // var cols3 = '';
                        
                        // cols3 += '<input type="hidden" name="color_size_combination[]" value="'+value.color_size_combination+'">'+
                        //             '<input type="hidden" name="product_detail_id[]" value="'+ value.id +'">'+
                        //             '<input type="hidden" name="product_size_color_id[]" value="'+ value.product_size_color_id +'">';
                        // // alert(cols3);
                        // $('#product_size_color_id_div').html(cols4);
                        // $('.product_size_color_id_value').append(cols3);
                    })
                  }
                });
              }else{
              $('#product_variant_detail').html('');
              }
            })
          }

          function variant_detail(){
            var cols = '';
            cols += '<table class="table table-bordered" style="border:2px solid black"><thead><tr class="" style="border:2px solid black"><td class="text-center">Variant </td><td class="text-center"> Price </td><td class="text-center"> Discount </td><td class="text-center"> Discount Type </td><td class="text-center"> Discount Price </td><td class="text-center"> Quantity </td><td class="text-center"> Photo </td></tr></thead>';
          $('#product_variant_detail').html('');
        var color = $('#color_id').val();
        var size = $('#size_id').val();
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
                        cols2 +='<tr><tbody><td><label id="variant" class="variant">'+size_id[0].name+'-'+value[0].name+'</label></td>'+
                                '<input type="hidden" name="new_color_size_combination[]" value="'+ size_id[0].name +' - ' + value[0].name +'">'+
                                '<input type="hidden" name="product_size_color[]" value="'+ product_size_color +'">'+
                                '<td><div class="form-group"><input type="number" class="mrp form-control" data-mrpid="'+ product_size_color +'" name="mrp[]" id="mrp'+ product_size_color +'"><div class="error"><span id="mrp'+ product_size_color +'" class="text-danger"></span></div></div></td>'+
                                '<td><div class="form-group"><input class="form-control" type="text" name="discount[]" id="discount'+ product_size_color +'"><div class="error"><span id="discount'+ product_size_color +'" class="text-danger"></span></div></div></td>'+
                                '<td><div class="form-group"><select class="form-control" name="discount_type[]" id="discount_type'+ product_size_color +'"class="discount_type"><option value="" disabled selected>Select Discount Type</option><option value="percentage">Percentage</option><option value="flat">Flat</option></select><div class="error"><span id="discount_type" class="text-danger"></span></div></div></td>'+
                                '<td><div class="form-group"><input type="number" class="form-control" name="discount_price[]" id="discount_price'+ product_size_color +'"><div class="error"><span id="discount_price'+ product_size_color +'" class="text-danger"></span></div></div></td>'+
                                '<td><div class="form-group"><input type="number" name="quantity[]" id="quantity" min="0" class="form-control"required=""><div class="error"><span id="quantity'+ product_size_color +'" class="text-danger"></span></div></div></td>'+
                                '<td><input type="file" name="image'+product_size_color+'[]" id="image" multiple></td></tr>';
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
        variant_detail();
        
        });
      $("#size_id").on("change", function () {
        variant_detail();
        });
        variant_detail_db();
    });

       $("form").on("submit",function(e){
          e.preventDefault(); 
        $('.text-danger').text(" ");         
        var form_data = new FormData(this);
        $.ajaxSetup({
          headers: {
                'X-CSRF-TOKEN': "{{@csrf_token()}}"
            },
        });
        $.ajax({
          url :"{{url('admin/product/product_update')}}",
          type : "post",
          data: form_data,
          dataType: "json",
          processData:false,
          contentType:false,
          success : function (data){
            if(data.status == "success"){
              swal("  ", {icon:"success",  title:"Update Successful",  buttons: false})
              setTimeout(function () {
                window.location.href="{{url('/admin/product/add2')}}";  
              }, 800);
            }else if(data.status == 'error'){
              $.each(data.error,function(key,val){
                $('div.error span#' + key).html(val);
              });
            }else{
              swal("Product Not Inserted!", "Please Try Again!", "error");
            }
          }
        })
      });



    </script>
<script type="text/javascript" src="{{ url('public/assets/admin/js/discount_type.min.js') }}"></script>

    <script src="{{ url('public/assets/admin/js/select/form-select2.min.js') }}"></script>
    {{-- <script src="{{ url('public/assets/admin/js/select/select2.full.min.js"') }}"></script> --}}
    
    {{-- <script src="{{ url('public/assets/admin/js/pages/select2.init.js') }}"></script> --}}
    

<script src="{{ url('public/assets/admin/cdn.jsdelivr.net/npm/select2%404.1.0-rc.0/dist/js/select2.min.js') }}"></script>

<script src="{{ url('public/assets/admin/js/pages/select2.init.js') }}"></script>
<script src="{{url('')}}/public/assets/admin/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js"></script>
<script src="{{url('')}}/public/assets/admin/libs/quill/quill.min.js"></script>
<script src="{{url('')}}/public/assets/admin/js/pages/form-editor.init.js"></script>


@endsection