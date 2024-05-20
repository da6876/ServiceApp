@extends('layout.adminapp')

@section('admin_page_css')
@endsection
@section('usercontent')


<nav class="navbar navbar-example navbar-expand-lg bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="javascript:void(0)"></a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbar-ex-3"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar-ex-3">
        <div class="navbar-nav me-auto">
          <a class="nav-item nav-link active" href="javascript:void(0)">SETUP OR CONFIG / <strong> Service Info</strong></a>
        </div>

        <form onsubmit="return false">
          <button class="btn btn-outline-success" onclick="showModal()" type="button">Add New</button>
        </form>
      </div>
    </div>
  </nav>
  <hr class="" />
  <!-- Hoverable Table rows -->
  <div class="card">
    <h5 class="card-header">Service Info</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover" id="dataTabel">
        <thead>
          <tr>
            <th>Service Name</th>
            <th>Service Unit</th>
            <th>Service Day Cost</th>
            <th>Service Rate</th>
            <th>status</th>
            <th>Actions</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
  <div class="modal fade ProductTypeDataAdd" id="largeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
          <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
            <form action="#" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row g-1">
                    <div class="col mb-0">
                      <label for="service_name" class="form-label">Service Name</label>
                      <input type="hidden" id="service_id" name="service_id"/>
                      <input type="text" id="service_name" class="form-control" placeholder="Enter Service Name" name="service_name" />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                      <label for="service_unit" class="form-label">Service Unit</label>
                      <input type="text" id="service_unit" class="form-control" placeholder="Enter Service Unit" name="service_unit" />
                    </div>
                    <div class="col mb-0">
                      <label for="service_day_cost" class="form-label">Service Day Cost</label>
                      <input type="text" id="service_day_cost" class="form-control" placeholder="Enter Service Cost Day" name="service_day_cost" />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-0">
                      <label for="service_rate" class="form-label">Service Rate</label>
                      <input type="text" id="service_rate" class="form-control" placeholder="Enter Service Rate" name="service_rate" />
                    </div>
                    <div class="col mb-0">
                      <label for="emailLarge" class="form-label">Service Status</label>
                      <select class="form-select" id="status" name="status" aria-label="Default select example">
                          <option selected="">Select Status</option>
                          <option value="Active">Active</option>
                          <option value="InActive">InActive</option>
                      </select>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="button" onclick="addProductType()" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>
@endsection
@section('admin_page_js')
<script>

  function showModal(){
      $('.ProductTypeDataAdd form')[0].reset();
      $('#service_id').val("");
      $('.ProductTypeDataAdd').modal('show');
  }
  var table1 = $('#dataTabel').DataTable({
  processing: true,
  serverSide: true,
  ajax: '{!! route('all.Service') !!}',
  columns: [
      {data: 'service_name', name: 'service_name'},
      {data: 'service_unit', name: 'service_unit'},
      {data: 'service_day_cost', name: 'service_day_cost'},
      {data: 'service_rate', name: 'service_rate'},
      {data: 'status', name: 'status'},
      {data: 'action', name: 'action', orderable: false, searchable: false}
  ]
});

function addProductType() {
  url = "{{ url('ServiceInfo') }}";
  $.ajax({
      url: url,
      type: "POST",
      data: new FormData($(".ProductTypeDataAdd form")[0]),
      contentType: false,
      processData: false,
      success: function (data) {
          console.log(data);
          var dataResult = JSON.parse(data);
          if (dataResult.statusCode == 200) {
              $('.ProductTypeDataAdd').modal('hide');
              $('#dataTabel').DataTable().ajax.reload();
              swal("Success", dataResult.statusMsg);
              $('.ProductTypeDataAdd form')[0].reset();
          } else if (dataResult.statusCode == 201) {
              swal({
                  title: "Oops",
                  text: dataResult.statusMsg,
                  icon: "error",
                  timer: '1500'
              });
          }
      }, error: function (data) {
          console.log(data);
          swal({
              title: "Oops",
              text: "Error occured",
              icon: "error",
              timer: '1500'
          });
      }
  });
  return false;
};

function showproduct_type_idData(id) {
  $.ajax({
      url: "{{ url('ServiceInfo') }}" + '/' + id,
      type: "GET",
      dataType: "JSON",
      success: function (data) {
          $('.ProductTypeDataAdd form')[0].reset();
          $('.ProductTypeDataAdd').modal('show');
          $('.modal-title').text(data[0].product_type_name + ' Information');
          $('#service_id').val(data[0].service_id);
          $('#service_name').val(data[0].service_name);
          $('#service_use_day').val(data[0].service_use_day);
          $('#service_usage').val(data[0].service_usage);
          $('#service_rate').val(data[0].service_rate);
          $('#status').val(data[0].status);
      }, error: function () {
          swal({
              title: "Oops",
              text: "aa",
              icon: "error",
              timer: '1500'
          });
      }
  });
}


//Delete User Type Data By Ajax
function  deleteproduct_type_idData(id) {
  var csrf_token = $('meta[name="csrf-token"]').attr('content');
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  }).then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  url: "{{ url('ServiceInfo') }}" + '/' + id,
                  type: "POST",
                  data: {'_method': 'DELETE', '_token': csrf_token},
                  success: function (data) {
                      console.log(data);
                      var dataResult = JSON.parse(data);
                      if (dataResult.statusCode == 200) {
                          $('#dataTabel').DataTable().ajax.reload();
                          swal({
                              title: "Delete Done",
                              text: "Poof! Your data file has been deleted!",
                              icon: "success",
                              button: "Done"
                          });
                      } else {
                          swal("Your imaginary file is safe!");
                      }
                  }, error: function (data) {
                      console.log(data);
                      swal({
                          title: "Opps...",
                          text: "Error occured !",
                          icon: "error",
                          button: 'Ok ',
                      });
                  }
              });
          } else {
              swal("Your imaginary file is safe!");
          }
      });
}

</script>
@endsection