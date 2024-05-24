@extends("admin.layout.app")
@section("title","Add P.S.C")
@section("content")
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Add P.S.C</h4>
      <div class="page-title-right">
      </div>
    </div>
  </div>
</div>
<form>
  @csrf
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12 col-md-4 col-lg-6">
            <div class="form-group">
              <label for="name">Product </label>
              <select class="form-control" name="product_id" id="product_id" class="product_id">
                <option value="" disabled selected>Select Product</option>
                @foreach ($product as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
              </select>
              <div class="error"><span id="product_id" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-6">
            <div class="form-group">
              <label for="name">size </label>
              <select class="form-control" name="size_id" id="size_id">
                <option value="" disabled selected>Select size</option>
                @foreach ($size as $size)
                <option value="{{ $size->id }}">{{ $size->name .' => '.$size->value }}</option>
                @endforeach
              </select>
              <div class="error"><span id="size_id" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-6">
            <div class="form-group">
              <label for="name">size </label>
              <select class="form-control" name="color_id" id="color_id" class="color_id">
                <option value="" disabled selected>Select cOLOR</option>
                @foreach ($color as $color)
                <option value="{{ $color->id }}">{{ $color->name .' => '.$color->value }}</option>
                @endforeach
              </select>
              <div class="error"><span id="color_id" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-6">
            <div class="form-group">
              <label for="name">Product Dimension </label>
              <select class="form-control" name="product_dimension_id" id="product_dimension_id" class="product_dimension_id">
                <option value="" disabled selected>Select Product Dimension</option>
                @foreach ($product_dimension as $product_dimension)
                <option value="{{ $product_dimension->id }}">{{ $product_dimension->name .' => '. $product_dimension->value}}</option>
                @endforeach
              </select>
              <div class="error"><span id="product_dimension_id" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-6">
            <div class="form-group">
              <label for="name">Product Weight </label>
              <select class="form-control" name="product_weight_id" id="product_weight_id" class="product_weight_id">
                <option value="" disabled selected>Select Product Weight</option>
                @foreach ($product_weight as $product_weight)
                <option value="{{ $product_weight->id }}">{{ $product_weight->name .' => '. $product_weight->value }}</option>
                @endforeach
              </select>
              <div class="error"><span id="product_weight_id" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-6">
            <div class="form-group">
              <label for="name">Product Material </label>
              <select class="form-control" name="product_material_id" id="product_material_id" class="product_material_id">
                <option value="" disabled selected>Select Product Material</option>
                @foreach ($product_material as $product_material)
                <option value="{{ $product_material->id }}">{{ $product_material->name .' => '. $product_material->value }}</option>
                @endforeach
              </select>
              <div class="error"><span id="product_material_id" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-6">
            <div class="form-group">
              <label for="name">Product Special Feature </label>
              <select class="form-control" name="product_special_feature_id" id="product_special_feature_id" class="product_special_feature_id">
                <option value="" disabled selected>Select Product Special Feature</option>
                @foreach ($product_special_feature as $product_special_feature)
                <option value="{{ $product_special_feature->id }}">{{ $product_special_feature->name .' => '. $product_special_feature->value }}</option>
                @endforeach
              </select>
              <div class="error"><span id="product_special_feature_id" class="text-danger"></span></div>
              <br>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-6">
              <div class="form-group">
                  {{-- <div class="form-control"> --}}
                  <label for="name">Is Stock Available</label>
              <input type="checkbox" value="yes" name="available_stock" id="available_stock">
              {{-- </div> --}}
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
</form>

@endsection
@section("script")

<script type="text/javascript">
  $(document).ready(function () {
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
          url :"{{url('admin/product/psc')}}",
          type : "post",
          data: form_data,
          dataType: "json",
          processData:false,
          contentType:false,
          success : function (data){
            if(data.status == "success"){
              swal("  ", {icon:"success",  title:"Add Successful",  buttons: false})
              setTimeout(function () {
                window.location.href="{{url('/admin/product/psc')}}";  
              }, 800);
            }else if(data.status == 'error'){
              $.each(data.error,function(key,val){
                $('div.error span#' + key).html(val);
              });
            }else{
              swal("Category Not Inserted!", "Please Try Again!", "error");
            }
          }
        })
      });
    });      
</script>
@endsection