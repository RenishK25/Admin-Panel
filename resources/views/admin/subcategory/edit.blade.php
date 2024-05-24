@extends("admin.layout.app")

@section("title","Update Sub - Category")

@section("content")
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">Update Sub Category</h4>
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
                    <input type="hidden" name="id" value="{{$sub_category->id}}">
                    <label for="">Name</label>
                    <input type="text" name="name" id="" class="form-control" value="{{$sub_category->name}}">
                    <div class="error"><span id="name" class="text-danger"></span></div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-6">
                  <div class="form-group">
                    <label for="name">Category</label>
                    <select class="form-control" name="category_id">
                      <option value="0">Select Category</option>
                      @foreach ($category as $category)
                      {{$sub_category->category_id == $category->id ? $sel ="selected" : $sel="" }}
                      <option value="{{ $category->id }}" {{$sel}}>{{ $category->name }}</option>
                      @endforeach
                    </select>
                    <div class="error"><span id="category_id" class="text-danger"></span></div>
                  </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-6">
                  <div class="form-group">
                    <label for="photoid" class="form-label">Image</label>
                    <input type="file" class="form-control" name="image" placeholder="!">
                    <br>
                    <a href="{{url('storage/upload/subcategory/'.$sub_category->image)}}">
                      <img src="{{url('storage/upload/subcategory/'.$sub_category->image)}}" width="100px" height="100px"></a>
                    <div class="error"><span id="image" class="text-danger"></span></div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="text-end">
                      <button type="submit" id="submit" class="btn btn-primary">Update</button>
                      <a type="submit" href="{{ url('admin/subcategory/index') }}" class="btn btn-danger">Cancel</a>
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
        var form_data = new FormData(this);
        $.ajaxSetup({
          headers: {
                'X-CSRF-TOKEN': "{{@csrf_token()}}"
            },
        });
        $.ajax({
          url :"{{url('admin/subcategory/edit')}}",
          type : "post",
          data: form_data,
          dataType: "json",
          processData:false,
          contentType:false,
          success : function (data) {
            if(data.status == "success"){
              swal("  ", {icon:"success",  title:"Updated Successful",  buttons: false})
            setTimeout(myGreeting, 800);
            function myGreeting() {
            window.location.href="{{url('admin/subcategory/index')}}"; }
            }else if(data.status == 'error'){
              $.each(data.error,function(key,val){
              $('div.error span#' + key).html(val);
            });
            }else{
              swal("Account Not Updated!", "Please Try Again!", "error");
            }
          }
        })
      });
    });        
</script>
@endsection