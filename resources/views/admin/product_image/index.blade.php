@extends('admin.layout.app')

@section('title', 'Product Images')

@section('style')
<style>

</style>
@endsection


@section('content')
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">Product Image</h4>

          <div class="page-title-right">
            <button type="button" style="float:right" class="btn btn-primary float-right" onclick="window.location.href='{{url('admin/product_image/create')}}'"> <i class="material-icons">Add</i></button>
          </div>
      </div>
  </div>
</div>
<div class="col-md-12">
  <div class="card">
    <div class="card-body">
        <form>
          @csrf
          <table id="table scroll-vertical" class="data-table table table-bordered dt-responsive nowrap align-middle mdl-data-table">
            <thead>
              <tr>
                <th>Index</th>
                <th>Product Name</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </form>
    </div>
  </div>
</div>
  
@endsection

@section('script')

<script type="text/javascript">
$(document).ready( function () {
    // $('.data-table').on('click.dt', function() {
    // $('[data-toggle="tooltip"]').tooltip({ placement: 'bottom'});
    // })
    
    var table = $('.data-table').DataTable({
        stateSave: true,
        processing: true,
        serverSide: true,
        ajax: {
            type: 'post',
            url: "{{url('admin/product_image/datatable')}}",
            headers: {
                'X-CSRF-TOKEN': "{{@csrf_token()}}"
            },
        },
        columns: [
              {data: 'DT_RowIndex', name:'id'},
              {data: 'color_size_combination', name: 'color_size_combination'},
              {data: 'images', name: 'images'},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
        });


$(document).on("click",".delete1", function(e){
        e.preventDefault(); 
        var delete_id = $(this).data("id");
        var element = this;
        swal({
    title: "Are you sure?",
    text: "Once Deleted, You Will Not Be Able To Recover This Data !",
    icon: "warning",
    buttons: true,
    dangerMode: true,})
    .then((willDelete) => {
      if (willDelete) {
      $.ajaxSetup({
        headers: {
              'X-CSRF-TOKEN': "{{@csrf_token()}}"
          },
      });
        $.ajax({
          url :"{{url('admin/image/delete')}}",
          // url : '/laravel/example-app/user/delete',
          type : "DELETE",
          data : {id:delete_id},
          success : function(data) {
          if(data.status == "success"){
          swal("Delete!", "Data Deleted Successful !", "success");
          $('.data-table').DataTable().ajax.reload();
          }else{ 
              swal("Data Not Deleted!", "Please Try Again!", "error");
          }
          }
        });
    }else{
    swal("Your imaginary file is safe!");
    }
      });
});
      

$('.js-example-basic-multiple').select2();

});      
</script>
@endsection