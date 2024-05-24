@extends("admin.layout.app")

@section("title","Color")

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"/>
@endsection

@section("content")

<div class="row">
  <div class="col-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">Color</h4>

          <div class="page-title-right">
            <button type="button" style="float:right" class="btn btn-primary float-right" onclick="window.location.href='{{url('admin/color/create')}}'"> <i class="material-icons">Add Color</i></button>
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
                <th>Name</th>
                <th>Color</th>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
   // DATATABLE
    var table = $('.data-table').DataTable({
        stateSave: true,
        processing: true,
        serverSide: true,
        ajax: {
            type: 'post',
            url: "{{url('admin/color/datatable')}}",
            headers: {
                'X-CSRF-TOKEN': "{{@csrf_token()}}"
            },
        },
        columns: [
            {data: 'DT_RowIndex', name:'id'},
            {data: 'name', name: 'name'},
            {data: 'color', name: 'color'},
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
            url :"{{url('admin/color/delete')}}",
            type : "DELETE",
            data : {id:delete_id},
            success : function(data) {
            if(data.status == "success"){
            swal("Delete!", "Color Deleted Successful !", "success");
            $('.data-table').DataTable().ajax.reload();
            }else{ 
                swal("Color Not Deleted!", "Please Try Again!", "error");
            }
            }
        });
      }else{
        swal("Your imaginary file is safe!");
      }
      });
      });

            $(document).on('blur', '.name_color', function() {
              $('.text-danger').text(" ");
            var id = $(this).data('id');
            var name = $("#name" + id).val();
            var color = $("#color" + id).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{@csrf_token()}}"
                }
            , });
            $.ajax({
                type: 'post'
                , dataType: 'JSON'
                , url: "{{url('admin/color/name_color_change')}}"
                , data: {
                    'name': name,
                    'value':color,
                     'id': id
                }
                , success: function(data) {
                    if (data.status == 'success') {
                      toastr.options.timeOut = 2000; // 1.5s
                        toastr.success('Color Update Successful ');

                    } else if (data.status == 'error') {
                        $.each(data.error, function(key, val) {
                          $('div.error span#'+ key + id).html(val);
                        });
                        // $('div.error span#'+keyid).html(val);
                    } else {
                        toastr.options.timeOut = 2000; // 1.5s
                        toastr.error('Color Not Updated');
                    }
                }
            })
        });
  });
  </script>
@endsection
