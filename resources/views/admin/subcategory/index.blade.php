@extends('admin.layout.app')

@section('title', 'Sub Category')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" />

@endsection


@section('content')
    <div class="row">
      <div class="col-12">
          <div class="page-title-box d-sm-flex align-items-center justify-content-between">
              <h4 class="mb-sm-0">Sub - Category</h4>
    
              <div class="page-title-right">
                <button type="button" style="float:right" class="btn btn-primary float-right" onclick="window.location.href='{{url('admin/subcategory/add')}}'"> <i class="material-icons">Add</i></button>
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
              <th>Name</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
        </table>
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
            url: "{{url('admin/subcategory/datatable')}}",
            headers: {
                'X-CSRF-TOKEN': "{{@csrf_token()}}"
            },
        },
        columns: [
            {data: 'DT_RowIndex', name:'id'},
            {data: 'category', name: 'category'},
            {data: 'name', name: 'name'},
            {data: 'image', name: 'image'},
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
              url :"{{url('admin/subcategory/delete')}}",
              type : "POST",
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

  $("form").on("submit",function(e){


      e.preventDefault(); 
        $('.text-danger').text(" ");
        var form_data = new FormData(this);
        $.ajaxSetup({
          headers: {
                'X-CSRF-TOKEN': "{{@csrf_token()}}"
            },
        });
        $.ajax({
          url :"{{url('admin/subcategory/import')}}",
          type : "post",
          data: form_data,
          // data: $("form").serialize(),
          dataType: "json",
          processData:false,
          contentType:false,
          success : function (data) {
            if(data.status == "success"){
              swal("  ", {icon:"success",  title:"Import Successful",  buttons: false})
            setTimeout(myGreeting, 800);
            function myGreeting() {
            window.location.href="{{url('admin/subcategory/index')}}";  
            }
            }
            else if(data.status == 'error'){
              $.each(data.error,function(key,val){
              $('div.error span#' + key).html(val);
            });
            }else{
              swal("Account Not Inserted!", "Please Try Again!", "error");
            }
          }
        })
      });
 
  
});
</script>

@endsection