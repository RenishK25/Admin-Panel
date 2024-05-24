@extends('admin.layout.app')

@section('title', 'Product Dimension')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />
{{-- <link rel="stylesheet" src="{{ url('public/assets/admin/css/font-awesome.min.css') }}" rel="stylesheet" /> --}}

@endsection


@section('content')
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">Product Dimension</h4>

          <div class="page-title-right">
            <button type="button" style="float:right" class="btn btn-primary float-right" onclick="window.location.href='{{url('admin/product_dimension/create')}}'"> <i class="material-icons">Add</i></button>
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
                  <th>Name</th>
                  <th>Product Dimension</th>
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
    $('.data-table').on('draw.dt', function() {
    $('[data-toggle="tooltip"]').tooltip({ placement: 'bottom'});
})
    
var table = $('.data-table').DataTable({
        stateSave: true,
        processing: true,
        serverSide: true,
        ajax: {
            type: 'post',
            url: "{{url('admin/product_dimension/datatable')}}",
            headers: {
                'X-CSRF-TOKEN': "{{@csrf_token()}}"
            },
        },
        columns: [
            {data: 'DT_RowIndex', name:'id'},
            {data: 'category', name: 'category'},
            {data: 'sub_category', name: 'sub_category'},
            {data: 'name', name: 'name'},
            {data: 'value', name: 'value'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
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
              url :"{{url('admin/product_dimension/delete')}}",
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
});
</script>

@endsection