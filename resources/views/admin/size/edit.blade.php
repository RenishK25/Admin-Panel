@extends('admin.layout.app')

@section('title', 'Update Size')

@section('style')
<style>

</style>
@endsection


@section('content')
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">Update Size</h4>
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
                <input type="hidden" name="id" value="{{$size->id}}">
                <label for="">name</label>
                <input type="text" name="name" class="form-control" value="{{$size->name}}">
                <div class="error"><span id="name" class="text-danger"></span></div>
              </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-6">
              <div class="form-group">
                <label for="">Size</label>
                <input type="text" name="value" class="form-control" value="{{$size->value}}">
                <div class="error"><span id="value" class="text-danger"></span></div>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="text-end">
                <br>
                  <button type="submit" id="submit" class="btn btn-primary">Update</button>
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
          url :"{{url('admin/size/update')}}",
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
              window.location.href="{{url('admin/size/')}}";  
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