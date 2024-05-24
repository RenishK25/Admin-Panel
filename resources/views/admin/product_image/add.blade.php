@extends('admin.layout.app')

@section('title', 'Add Image')

@section('style')
<style>

</style>
@endsection


@section('content')
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Add Product Images</h4>
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
              <select class="form-control" name="product_detail_id" id="product_detail_id" class="product_detail_id">
                <option value="" disabled selected>Select Product</option>
                @foreach ($product as $product)
                <option value="{{ $product->id }}">{{ $product->color_size_combination }}</option>
                @endforeach
              </select>
              <div class="error"><span id="product_detail_id" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-6">
            <div class="form-group">
              <label for="">Product Images</label>
              <input type="file" class="form-control" name="image[]" multiple>
              <div class="error"><span id="image" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="text-end">
              <br>
              <button type="submit" id="submit" class="btn btn-primary">Submit</button>
              <a type="submit" href="{{ url('admin/product_image') }}" class="btn btn-danger">Cancel</a>
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
          url :"{{url('admin/product_image/')}}",
          type : "post",
          data: form_data,
          dataType: "json",
          processData:false,
          contentType:false,
          success : function (data) {
            if(data.status == "success"){
              swal("  ", {icon:"success",  title:"Add Successful",  buttons: false})
              setTimeout(myGreeting, 800);
              function myGreeting() {
              window.location.href="{{url('admin/product_image/')}}";  
              }
              }else if(data.status == 'error'){
              $.each(data.error,function(key,val){
              $('div.error span#' + key).html(val);
            });
              }else if(data.status == 'error2'){
              $.each(data.error2,function(key,val){
              $('div.error span#image').html(val);
            });
            }else{
              swal("Image Not Inserted!", "Please Try Again!", "error");
            }
          }
        })
      });
});      
</script>
@endsection