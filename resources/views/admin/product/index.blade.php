@extends('admin.layout.app')

@section('title', 'Product')

@section('style')
@endsection


@section('content')
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">Product</h4>

          <div class="page-title-right">
            <button type="button" style="float:right" class="btn btn-primary float-right" onclick="window.location.href='{{url('admin/product/create')}}'"> <i class="material-icons">Add</i></button>
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
                  <th>Category</th>
                  <th>Sub Category</th>
                  <th>Product Brand</th>
                  <th>Name</th>
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

  var table = $('.data-table').DataTable({
        stateSave: true,
        processing: true,
        serverSide: true,
        ajax: {
            type: 'post',
            url: "{{url('admin/product/datatable')}}",
            headers: {
                'X-CSRF-TOKEN': "{{@csrf_token()}}"
            },
        },
        columns: [
            {data: 'DT_RowIndex', name:'id'},
            {data: 'category', name: 'category'},
            {data: 'sub_category', name: 'sub_category'},
            {data: 'product_brand', name: 'product_brand'},
            {data: 'name', name: 'name'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
  });
  
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

  $(document).on("click",".delete", function(e){
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
              url :"{{url('admin/product/delete')}}",
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
        }
      });
  }); 
});
</script>

@endsection