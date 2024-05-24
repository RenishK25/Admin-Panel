@extends('admin.layout.app')

@section('title', 'Update Product')

@section('style')
<style>

</style>
@endsection


@section('content')
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Update Product</h4>
    </div>
  </div>
</div>
<form>
  {{ method_field('PUT') }}
  @csrf
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12 col-md-4 col-lg-6">
            <div class="form-group">
              <label for="name">Category</label>
              <select class="form-control" name="category_id" id="category_id">
                <option value="">Select Category</option>
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
              <input type="hidden" id="subcategory_value" value="{{$product->sub_category_id}}">
              <select class="form-control" name="sub_category_id" id="sub_category_id">
                <option value="">Select Category</option>
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
                {{$product->brand_id == $product_brand->id ? $sel ="selected" : $sel="" }}
                <option value="{{ $product_brand->id }}" {{$sel}}>{{ $product_brand->name }}</option>
                @endforeach
              </select>
              <div class="error"><span id="brand_id" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-6">
            <div class="form-group">
              <label for="">Name</label>
              <input type="hidden" name="id" value="{{$product->id}}">
              <input type="text" name="name" id="" class="form-control" value="{{ $product->name }}">
              <div class="error"><span id="name" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="text-end">
              <br>
              <button type="submit" id="submit" class="btn btn-primary">Update</button>
              <a type="submit" href="{{ url('admin/product') }}" class="btn btn-danger">Cancel</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>


@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function () {
      function select_subcategory(){
        var category_id = $("#category_id").val();  
        var subcategory_id =  $("#subcategory_value").val();
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': "{{@csrf_token()}}"
                  },
        });
        $.ajax({
            type: 'post',
            dataType: 'JSON',
            url :"{{url('admin/subcategory_select')}}",
            data: {'category_id': category_id, 'subcategory_id' : subcategory_id},
            success: function(data) {
              $("#sub_category_id").html(data.data);
            }
          })
      }
      select_subcategory();
      $(document).on('change', '#category_id', function(){
        select_subcategory();
      });
     
      // START for form submit 
      $("form").on("submit",function(e){
        $('.text-danger').text(" ");
      e.preventDefault(); 
        var form_data = new FormData(this);
        $.ajaxSetup({
          headers: {
                'X-CSRF-TOKEN': "{{@csrf_token()}}"
            },
        });
        $.ajax({
          url :"{{url('admin/product/update')}}",
          type : "post",
          data: form_data,
          dataType: "json",
          processData:false,
          contentType:false,
          success : function (data) {
            if(data.status == "success"){
              swal("  ", {icon:"success",  title:"Update Successful",  buttons: false})
            setTimeout(myGreeting, 800);
            function myGreeting() {
            window.location.href="{{url('admin/product')}}";  
            }
            }
            else if(data.status == 'error'){
              $.each(data.error,function(key,val){
              $('div.error span#' + key).html(val);
            });
            }else{
              swal("Update Not Successfull!", "Please Try Again!", "error");
            }
          }
        })
      });
  });
</script>
@endsection