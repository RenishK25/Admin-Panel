@extends("admin.layout.app")

@section("title","Activity History")

@section("style")
@section("content")

<!-- start page title -->
<div class="row">
  <div class="col-12">
      <div class="page-title-box d-sm-flex align-items-center justify-content-between">
          <h4 class="mb-sm-0">Activity History</h4>
          <div class="page-title-right">
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
                    <th>Changes</th>
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
              url: "{{url('admin/dashboard/activity_history/datatable')}}",
              headers: {
                  'X-CSRF-TOKEN': "{{@csrf_token()}}"
              },
          },
          columns: [
              {data: 'DT_RowIndex', name:'name'},
              {data: 'admin_name', name: 'admin_name'},
              {data: 'changes', name: 'changes'},
          ]
      });
    });
  </script>
@endsection
