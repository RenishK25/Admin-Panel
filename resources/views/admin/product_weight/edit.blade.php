@extends('admin.layout.app')

@section('title', 'Update Product Weight')

@section('style')
<script src="{{ url('public/assets/admin/vendors/css/forms/select/select2.min.css') }}"></script>
<style>

</style>
@endsection


@section('content')
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Update Product Weight</h4>
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
                {{$product_weight->category_id == $category->id ? $sel ="selected" : $sel="" }}
                <option value="{{ $category->id }}" {{$sel}}>{{ $category->name }}</option>
                @endforeach
              </select>
              <div class="error"><span id="category_id" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-6">
            <div class="form-group">
              <label for="name">Sub Category</label>
              <input type="hidden" id="subcategory_value" value="{{$product_weight->sub_category_id}}">
              <select class="form-control" name="sub_category_id" id="sub_category_id">
                <option value="">Select Category</option>
              </select>
              <div class="error"><span id="sub_category_id" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-6">
            <div class="form-group">
              <label for="">Name</label>
              <input type="hidden" name="id" value="{{$product_weight->id}}">
              <input type="text" name="name" id="" class="form-control" value="{{ $product_weight->name }}">
              <div class="error"><span id="name" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-6">
            <div class="form-group">
              <label for="">Product Dimension</label>
              <input type="text" name="value" class="form-control" value="{{ $product_weight->value }}">
              <div class="error"><span id="value" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="text-end">
              <br>
              <button type="submit" id="submit" class="btn btn-primary">Update</button>
              <a type="submit" href="{{ url('admin/product_weight') }}" class="btn btn-danger">Cancel</a>
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
          url :"{{url('admin/product_weight/update')}}",
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
            window.location.href="{{url('admin/product_weight')}}";  
            }
            }
            else if(data.status == 'error'){
              $.each(data.error,function(key,val){
              $('div.error span#' + key).html(val);
            });
            }else{
              swal("Update Not Inserted!", "Please Try Again!", "error");
            }
          }
        })
      });
    // $('.js-example-basic-multiple').select2();
  });
</script>
<script src="{{ url('public/assets/admin/js/scripts/forms/select/form-select2.min.js') }}"></script>
<script src="{{ url('public/assets/admin/vendors/js/forms/select/select2.full.min.js"') }}"></script>

@endsection