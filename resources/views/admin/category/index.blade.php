@extends("admin.layout.app")

@section("title","Category")

@section("content")

<style>
 
  </style>

<!-- start page title -->
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">Category</h4>
          <div class="page-title-right">
            <button type="button" style="float:right" id="font_right" class="btn btn-primary" onclick="window.location.href='{{url('admin/category/add')}}'"> <i class="material-icons">Add </i></button>
          </div>
      </div>
  </div>
</div>
<!-- end page title -->
<div class="col-md-12">
  <div class="card">
    <div class="card-body">
        <form>
            @csrf
              <table id="table scroll-vertical" class="data-table table table-bordered dt-responsive nowrap align-middle mdl-data-table">
                <thead>
                  <tr>
                    <th>Index</th>
                    <th>Name</th>
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
@section("script")
<script type="text/javascript">
    $(document).ready( function () {
     // DATATABLE
      var table = $('.data-table').DataTable({
          stateSave: true,
          processing: true,
          serverSide: true,
          ajax: {
              type: 'post',
              url: "{{url('admin/category/datatable')}}",
              headers: {
                  'X-CSRF-TOKEN': "{{@csrf_token()}}"
              },
          },
          columns: [
              // {data: 'name', name: 'name'},
              {data: 'DT_RowIndex', name:'name'},
              {data: 'name', name: 'name'},
              {data: 'image', name: 'image', orderable: false, searchable: false},
              {data: 'action', name: 'action', orderable: false, searchable: false},
          ]
      });
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
              url :"{{url('admin/category/delete')}}",
              type : "POST",
              data : {id:delete_id},
              success : function(data) {
              if(data.status == "success"){
              swal("Delete!", "Category Deleted Successful !", "success");
              $('.data-table').DataTable().ajax.reload();
              }else{ 
                  swal("Category Not Deleted!", "Please Try Again!", "error");
              }
              }
          });
        }
        });
    });
  </script>
@endsection
