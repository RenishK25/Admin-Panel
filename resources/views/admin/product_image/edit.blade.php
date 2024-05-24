@extends('admin.layout.app')

@section('title', 'Update Image')

@section('style')
<style>

</style>
@endsection


@section('content')
@foreach($images as $image)
            {{-- @foreach($ids as $id) --}}
            @endforeach
<div class="row">
    <div class="col-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Update Product Images</h4>
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
                <label for="name">Product</label>
                <select class="form-control" name="product_detail_id" id="product_detail_id">
                  <option value="">Select Product</option>
                  @foreach ($product as $product)
                  {{$image->product_detail_id == $product->id ? $sel ="selected" : $sel="" }}
                  <option value="{{ $product->id }}" {{$sel}}>{{ $product->color_size_combination }}</option>
                  @endforeach
                </select>
                <div class="error"><span id="product_detail_id" class="text-danger"></span></div>
              </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-6">
                <div class="form-group">
                  <label for="">Image</label>
                  <input type="file" class="form-control" name="image[]" multiple>
                  <div class="error"><span id="image" class="text-danger"></span></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-6">
                <div class="form-group">
                  <br>
                    @foreach($images as $image)
                        <a href="{{url('storage/upload/product_image/'.$image->image)}}" target="_blank"><img src="{{url("storage/upload/product_image/".$image->image)}}" width="100px" height="100px">
                    @endforeach
                </div>
            </div>
            <div class="col-lg-12">
              <div class="text-end">
                <br>
                <button type="submit" id="submit" class="btn btn-primary">Update</button>
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
    $(document).ready(function() {
        $("form").on("submit", function(e) {
            $('.text-danger').text(" ");
            e.preventDefault();
            var form_data = new FormData(this);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{@csrf_token()}}"
                }
            , });
            $.ajax({
                url: "{{url('admin/product_image/update')}}"
                , type: "post",
                data: form_data
                , dataType: "json"
                , processData: false
                , contentType: false
                , success: function(data) {
                    if (data.status == "success") {
                        swal("  ", {
                            icon: "success"
                            , title: "Update Successful"
                            , buttons: false
                        })
                        setTimeout(function myGreeting() {
                            window.location.href = "{{url('admin/product_image/')}}";
                        }, 800);

                    } else if (data.status == 'error') {
                        $.each(data.error, function(key, val) {
                            $('div.error span#' + key).html(val);
                        });
                    } else {
                        swal("Account Not Updated!", "Please Try Again!", "error");
                    }
                }
            })
        });
    });

</script>

@endsection
