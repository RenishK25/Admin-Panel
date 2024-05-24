@extends('admin.layout.app')

@section('title', 'Product Brand')

@section('style')
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Product Brand</h4>
  
            <div class="page-title-right">
                <button type="button" style="float:right" class="btn btn-primary float-right" onclick="window.location.href='{{url('admin/product_brand/create')}}'"> <i class="material-icons">Add</i></button>
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
                            <th>name</th>
                            <th>Description</th>
                            <th>Logo</th>
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
    $(document).ready(function() {
        // DATATABLE
        var table = $('.data-table').DataTable({
            stateSave: true
            , processing: true
            , serverSide: true
            , ajax: {
                type: 'post'
                , url: "{{url('admin/product_brand/datatable')}}"
                , headers: {
                    'X-CSRF-TOKEN': "{{@csrf_token()}}"
                }
            , }
            , columns: [
                {data: 'DT_RowIndex', name: 'id' },
                {data: 'name', name: 'name'}, 
                {data: 'description', name: 'description'}, 
                {data: 'logo', name: 'logo', orderable: false, searchable: false}, 
                {data: 'action', name: 'action', orderable: false, searchable: false }
            , ]
        });


        $(document).on("click", ".delete", function(e) {
            e.preventDefault();
            var delete_id = $(this).data("id");
            var element = this;
            swal({
                    title: "Are you sure?"
                    , text: "Once Deleted, You Will Not Be Able To Recover This Data !"
                    , icon: "warning"
                    , buttons: true
                    , dangerMode: true
                , })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajaxSetup({
                        headers: {
                          'X-CSRF-TOKEN': "{{@csrf_token()}}"
                        },
                        });
                        $.ajax({
                            url: "{{url('admin/product_brand/delete')}}"
                            , type: "DELETE"
                            , data: {
                                id: delete_id
                            },
                            success: function(data) {
                              if (data.status == "success") {
                                swal("Delete!", "Size Deleted Successful !", "success");
                                $('.data-table').DataTable().ajax.reload();
                              } else {
                                swal("Size Not Deleted!", "Please Try Again!", "error");
                              }
                            }
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
        });
        

    });

</script>

@endsection
