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
          <a class="nav-item nav-link active" href="javascript:void(0)">SETUP OR CONFIG / <strong> Customer Info</strong></a>
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
    <h5 class="card-header">Customer Info</h5>
    <div class="table-responsive text-nowrap">
      <table class="table table-hover" id="customerTable-dataTabel">
        <thead>
          <tr>
            <th>Customer_Name</th>
            <th>Customer_Type</th>
            <th>Address</th>
            <th>License_No</th>
            <th>Business_Attn</th>
            <th>Business_Number</th>
            <th>Business_Address</th>
            <th>Business_Email</th>
            <th>Billing_Address</th>
            <th>Financial_Attn</th>
            <th>Actions</th>
          </tr>
        </thead>
      </table>
    </div>
  </div>
  <div class="modal fade CustomerInfoAdd" id="largeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
          <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
          <form action="#" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="row g-2">
                <div class="col mb-0">
                  <label for="Customer_Name" class="form-label">Customer Name</label>
                  <input type="hidden" id="Customer_Id" name="Customer_Id"/>
                  <input type="text" id="Customer_Name" class="form-control" placeholder="Customer Name" name="Customer_Name" />
                </div>
                <div class="col mb-0">
                  <label for="Customer_Type" class="form-label">Customer Type</label>
                  <input type="text" id="Customer_Type" class="form-control" placeholder="Customer Type" name="Customer_Type" />
                </div>
            </div>
            <div class="row g-1">
                <div class="col mb-0">
                  <label for="Address" class="form-label">Address</label>
                  <input type="text" id="Address" class="form-control" placeholder="Address" name="Address" />
                </div>
            </div>
            <hr>
            <div class="row g-1">
                <div class="col mb-0">
                  <label for="Business_Attn" class="form-label">Business Attn.</label>
                  <input type="text" id="Business_Attn" class="form-control" placeholder="Business Attn" name="Business_Attn" />
                </div>
            </div>
            <div class="row g-2">
              
                <div class="col mb-0">
                  <label for="Business_Number" class="form-label">Contact  Number</label>
                  <input type="text" id="Business_Number" class="form-control" placeholder="Business Number" name="Business_Number" />
                </div>
                <div class="col mb-0">
                  <label for="Business_Email" class="form-label">Email Address</label>
                  <input type="text" id="Business_Email" class="form-control" placeholder="Business Email" name="Business_Email" />
                </div>
            </div>
            <div class="row g-1">
              <div class="col mb-0">
                <label for="Business_Address" class="form-label">Address</label>
                <input type="text" id="Business_Address" class="form-control" placeholder="Business Address" name="Business_Address" />
              </div>
            </div>
            <hr>
            <div class="row g-1">
                <div class="col mb-0">
                  <label for="Billing_Address" class="form-label">Billing Address</label>
                  <input type="text" id="Billing_Address" class="form-control" placeholder="Billing Address" name="Billing_Address" />
                </div>
            </div>
            <hr>
            <div class="row g-1">
              <div class="col mb-0">
                <label for="Financial_Attn" class="form-label">Financial Attn.</label>
                <input type="text" id="Financial_Attn" class="form-control" placeholder="Financial Attn" name="Financial_Attn" />
              </div>
            </div>
            <div class="row g-2">
                <div class="col mb-0">
                  <label for="Financial_Number" class="form-label">Contact Number</label>
                  <input type="text" id="Financial_Number" class="form-control" placeholder="Financial Number" name="Financial_Number" />
                </div>
                <div class="col mb-0">
                  <label for="Financial_Email" class="form-label">Email Address</label>
                  <input type="text" id="Financial_Email" class="form-control" placeholder="Financial Email" name="Financial_Email" />
                </div>
            </div>
            <hr>
            <div class="row g-1">
              <div class="col mb-0">
                <label for="Account_Manager_Name" class="form-label">Account Manager Name</label>
                <input type="text" id="Account_Manager_Name" class="form-control" placeholder="Account Manager Name" name="Account_Manager_Name" />
              </div>
            </div>
            <div class="row g-2">
                <div class="col mb-0">
                  <label for="Account_Manager_Number" class="form-label">Contact Number</label>
                  <input type="text" id="Account_Manager_Number" class="form-control" placeholder="Account Manager Number" name="Account_Manager_Number" />
                </div>
                <div class="col mb-0">
                  <label for="Account_Manager_Email" class="form-label">Email Address</label>
                  <input type="text" id="Account_Manager_Email" class="form-control" placeholder="Account Manager Email" name="Account_Manager_Email" />
                </div>
            </div>
            <hr>
            <div class="row g-2">
                <div class="col mb-0">
                  <label for="VAT_REG_No" class="form-label">VAT REG No</label>
                  <input type="text" id="VAT_REG_No" class="form-control" placeholder="VAT REG No" name="VAT_REG_No" />
                </div>
                <div class="col mb-0">
                  <label for="License_No" class="form-label">License No</label>
                  <input type="text" id="License_No" class="form-control" placeholder="License No" name="License_No" />
                </div>
            </div>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
            Close
          </button>
          <button type="button" onclick="addCustomer()" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>
@endsection
@section('admin_page_js')
<script>

  function showModal(){
      $('.CustomerInfoAdd form')[0].reset();
      $('#customer_info_id').val("");
      $('.CustomerInfoAdd').modal('show');
  }

var table1 = $('#customerTable-dataTabel').DataTable({
    processing: true,
    serverSide: true,
    ajax: '{!! route('all.CustomerInfo') !!}',
    columns: [
        {data: 'Customer_Name', name: 'Customer_Name'},
        {data: 'Customer_Type', name: 'Customer_Type'},
        {data: 'Address', name: 'Address'},
        {data: 'License_No', name: 'License_No'},
        {data: 'Business_Attn', name: 'Business_Attn'},
        {data: 'Business_Number', name: 'Business_Number'},
        {data: 'Business_Address', name: 'Business_Address'},
        {data: 'Business_Email', name: 'Business_Email'},
        {data: 'Billing_Address', name: 'Billing_Address'},
        {data: 'Financial_Attn', name: 'Financial_Attn'},
        {data: 'action', name: 'action', orderable: false, searchable: false}
    ]
});

function addCustomer() {
  url = "{{ url('CustomerInfo') }}";
  $.ajax({
      url: url,
      type: "POST",
      data: new FormData($(".CustomerInfoAdd form")[0]),
      contentType: false,
      processData: false,
      success: function (data) {
          console.log(data);
          var dataResult = JSON.parse(data);
          if (dataResult.statusCode == 200) {
              $('.CustomerInfoAdd').modal('hide');
              $('#customerTable-dataTabel').DataTable().ajax.reload();
              swal("Success", dataResult.statusMsg);
              $('.CustomerInfoAdd form')[0].reset();
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

function showcustomer_infoData(id) {
  $.ajax({
      url: "{{ url('CustomerInfo') }}" + '/' + id,
      type: "GET",
      dataType: "JSON",
      success: function (data) {
          $('.CustomerInfoAdd form')[0].reset();
          $('.CustomerInfoAdd').modal('show');
          $('.modal-title').text(data[0].Customer_Name + ' Information');
          $('#Customer_Id').val(data[0].Customer_Id);
          $('#Customer_Name').val(data[0].Customer_Name);
          $('#Customer_Type').val(data[0].Customer_Type);
          $('#Address').val(data[0].Address);
          $('#License_No').val(data[0].License_No);
          $('#Business_Attn').val(data[0].Business_Attn);
          $('#Business_Number').val(data[0].Business_Number);
          $('#Business_Address').val(data[0].Business_Address);
          $('#Business_Email').val(data[0].Business_Email);
          $('#Billing_Address').val(data[0].Billing_Address);
          $('#Financial_Attn').val(data[0].Financial_Attn);
          $('#Financial_Number').val(data[0].Financial_Number);
          $('#Financial_Email').val(data[0].Financial_Email);
          $('#VAT_REG_No').val(data[0].VAT_REG_No);
          $('#Account_Manager_Name').val(data[0].Account_Manager_Name);
          $('#Account_Manager_Number').val(data[0].Account_Manager_Number);
          $('#Account_Manager_Email').val(data[0].Account_Manager_Email);
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
function  deletecustomer_infoData(id) {
  var csrf_token = $('meta[name="csrf-token"]').attr('content');
  swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this imaginary file!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
  })
      .then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  url: "{{ url('CustomerInfo') }}" + '/' + id,
                  type: "POST",
                  data: {'_method': 'DELETE', '_token': csrf_token},
                  success: function (data) {
                      console.log(data);
                      var dataResult = JSON.parse(data);
                      if (dataResult.statusCode == 200) {
                          $('#customerTable-dataTabel').DataTable().ajax.reload();
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