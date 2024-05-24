@extends('admin.layout.app')

@section('title', 'Size')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Size</h4>
  
            <div class="page-title-right">
              <button type="button" style="float:right" class="btn btn-primary float-right" onclick="window.location.href='{{url('admin/size/create')}}'"> <i class="material-icons">Add</i></button>
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
                        <th>name</th>
                        <th>Size</th>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        // DATATABLE
        var table = $('.data-table').DataTable({
        stateSave: true,
        processing: true,
        serverSide: true,
        ajax: {
            type: 'post',
            url: "{{url('admin/size/datatable')}}",
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
                            url: "{{url('admin/size/delete')}}"
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
        $(document).on('blur', '.name_value', function() {
          $('.text-danger').text(" ");
            var id = $(this).data('id');
            var name = $("#name" + id).val();
            var value = $("#value" + id).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{@csrf_token()}}"
                }
            , });
            $.ajax({
                type: 'post'
                , dataType: 'JSON'
                , url: "{{url('admin/size/name_size_change')}}"
                , data: {
                    'name': name,
                    'value': value
                    , 'id': id
                }
                , success: function(data) {
                    if (data.status == 'success') {
                        toastr.options.timeOut = 2000; // 1.5s
                        toastr.success('Update Successful ');


                    } else if (data.status == 'error') {
                        $.each(data.error, function(key, val) {
                            $('div.error span#' + key + id).html(val);
                        });
                    } else {
                        toastr.options.timeOut = 2000; // 1.5s
                        toastr.error('Not Updated');
                    }
                }
            })
        });

    });

</script>

@endsection
