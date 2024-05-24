@extends('admin.layout.app')

@section('title', 'Update Product Brand')

@section('style')
<style>

</style>
@endsection


@section('content')
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">Update Product Brand</h4>
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
                  <input type="hidden" name="id" value="{{$product_brand->id}}">
                  <label for="">Name</label>
                  <input type="text" name="name" class="form-control" value="{{$product_brand->name}}">
                  <div class="error"><span id="name" class="text-danger"></span></div>
                </div>
              </div>
              <div class="col-sm-12 col-md-4 col-lg-6">
                <div class="form-group">
                  <label for="">Description</label>
                  <textarea type="text" name="description" rows="4" cols="50"
                    class="form-control">{{$product_brand->description}}</textarea>
                  <div class="error"><span id="description" class="text-danger"></span></div>
                </div>
              </div>
              <div class="col-sm-12 col-md-4 col-lg-6">
                <div class="form-group">
                  <label for="photoid" class="form-label">Logo</label>
                  <input type="file" class="form-control" name="logo" placeholder="!">
                  <br>
                  <a href="{{url('storage/upload/product_brand/'.$product_brand->logo)}}" >
                    <img src="{{url('storage/upload/product_brand/'.$product_brand->logo)}}" width="100px" height="100px"></a>
                  <div class="error"><span id="logo" class="text-danger"></span></div>
                </div>
              </div>
                <div class="col-lg-12">
                  <div class="text-end">
                      <button type="submit" id="submit" class="btn btn-primary">Update</button>
                      <a type="submit" href="{{ url('admin/product_brand/index') }}" class="btn btn-danger">Cancel</a>
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
          url :"{{url('admin/product_brand/update')}}",
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
              window.location.href="{{url('admin/product_brand/')}}";  
              }
            }else if(data.status == 'error'){
              $.each(data.error,function(key,val){
              $('div.error span#' + key).html(val);
              });
            }else{
              swal("Size Not Updated!", "Please Try Again!", "error");
            }
                
          }
          })
      });
  });      
</script>
@endsection