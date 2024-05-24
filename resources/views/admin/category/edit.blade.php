@extends("admin.layout.app")

@section("title","Update Category")

@section("content")

<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">Update Category</h4>
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
              <label for="">Name</label>
              <input type="hidden" name="id" value="{{$category->id}}">
              <input type="text" name="name" class="form-control" value="{{$category->name}}">
              <div class="error"><span id="name" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-sm-12 col-md-4 col-lg-6">
            <div class="form-group">
              <label for="">Image</label>
              <input type="file" name="image" class="form-control">
              <br>
              <a href="{{url('storage/upload/category/'.$category->image)}}"><img
                  src="{{url('storage/upload/category/'.$category->image)}}" width="100px" height="100px"></a>
              <div class="error"><span id="image" class="text-danger"></span></div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="text-end">
              <br>
              <button type="submit" id="submit" class="btn btn-primary">Update</button>
              <a type="submit" href="{{ url('admin/category/index') }}" class="btn btn-danger">Cancel</a>
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
        $('.text-danger').text(" ");
      e.preventDefault(); 
        // $("form").serialize()
        var form_data = new FormData(this);
        $.ajaxSetup({
          headers: {
                'X-CSRF-TOKEN': "{{@csrf_token()}}"
            },
        });
        $.ajax({
          url :"{{url('admin/category/edit')}}",
          type : "post",
          // data: $("form").serialize(),
          data: form_data,
          dataType: "json",
          processData:false,
          contentType:false,
          success : function (data) {
            if(data.status == "success"){
              swal("  ", {icon:"success",  title:"Update Successful",  buttons: false})
              setTimeout(myGreeting, 800);
              function myGreeting() {
              window.location.href="{{url('admin/category/index')}}";  
              }
            }else if(data.status == 'error'){
              $.each(data.error,function(key,val){
                $('div.error span#' + key).html(val);
              });
            }else{
              swal("Category Not Updated!", "Please Try Again!", "error");
            }    
          }
          })
      });
    });      
</script>
@endsection