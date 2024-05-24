@extends('admin.layout.app')

@section('title', 'Add Size')

@section('style')
<style>

</style>
@endsection


@section('content')
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Add Size</h4>

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
                <label for="name">Category</label>
                <select class="form-control" name="category_id" id="category_id" class="category_id">
                  <option value="" disabled selected>Select Category</option>
                  @foreach ($category as $category)
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
                  @foreach ($sub_category as $sub_category)
                  <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                  @endforeach
                </select>
                <div class="error"><span id="sub_category_id" class="text-danger"></span></div>
              </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-6">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" class="form-control" value="{{old('name')}}">
              <div class="error"><span id="name" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-6">
            <div class="form-group">
              <label for="">Size</label>
              <input type="text" name="value" class="form-control" value="{{old('value')}}">
              <div class="error"><span id="value" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="text-end">
              <br>
              <button type="submit" id="submit" class="btn btn-primary">Submit</button>
              <a type="submit" href="{{ url('admin/size') }}" class="btn btn-danger">Cancel</a>
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

    $(document).on('change', '#category_id', function(){
        var category_id = $("#category_id").val();  
        $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': "{{@csrf_token()}}"
                  },
        });
        $.ajax({
            type: 'post',
            dataType: 'JSON',
            url :"{{url('admin/subcategory_select')}}",
            data: {'category_id': category_id},
            success: function(data) {
              $("#sub_category_id").html(data.data);
            }
          })
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
          url :"{{url('admin/size/')}}",
          type : "post",
          data: form_data,
          dataType: "json",
          processData:false,
          contentType:false,
          success : function (data){
            if(data.status == "success"){
              swal("  ", {icon:"success",  title:"Add Successful",  buttons: false})
              setTimeout(myGreeting, 800);
              function myGreeting() {
              window.location.href="{{url('/admin/size')}}";  
              }
            }else if(data.status == 'error'){
              $.each(data.error,function(key,val){
              $('div.error span#' + key).html(val);
              });
            }else{
              swal("Size Not Inserted!", "Please Try Again!", "error");
            }
          }
        })
      });
  });      
</script>
@endsection