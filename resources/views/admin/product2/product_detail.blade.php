@extends("admin.layout.app")
@section("title","Add P.Detail")
@section("content")
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Add P.Detail</h4>
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
              <label for="name">Product Size Color </label>
              <select class="form-control" name="product_size_color_id" id="product_size_color_id" class="product_size_color_id">
                <option value="" disabled selected>Select Product</option>
                @foreach ($product_size_color as $product_size_color)
                {{-- {{dd($product_size_color->detail[0]->name)}} --}}
                <option value="{{ $product_size_color->id }}">{{ $product_size_color->detail[0]->name }}</option>
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
          <div class="col-sm-12 col-md-4 col-lg-6">
            <div class="form-group">
              <label for="name">Description </label>
              <input class="form-control" type="text" name="description" id="description">
              <div class="error"><span id="description" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-6">
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
              <div class="error"><span id="discount_price" class="text-danger"></span></div>
            </div>
          </div>        
          {{-- <div class="col-sm-12 col-md-4 col-lg-6">
            <div class="form-group">
              <label for="name">Selling Price </label>
              <input type="number" class="form-control" name="selling_price" id="selling_price">
              <div class="error"><span id="selling_price" class="text-danger"></span></div>
            </div>
          </div>                 --}}
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
          url :"{{url('admin/product/detail')}}",
          type : "post",
          data: form_data,
          dataType: "json",
          processData:false,
          contentType:false,
          success : function (data){
            if(data.status == "success"){
              swal("  ", {icon:"success",  title:"Add Successful",  buttons: false})
              setTimeout(function () {
                window.location.href="{{url('/admin/product/detail')}}";  
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