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
          <a class="nav-item nav-link active" href="javascript:void(0)">SETUP OR CONFIG / <strong> User Info</strong></a>
        </div>

        <form onsubmit="return false">
          <button class="btn btn-outline-success" onclick="showModal()" type="button">Add New User</button>
        </form>
      </div>
    </div>
  </nav>
  <hr class="" />
  <!-- Hoverable Table rows -->
  <div class="card">
    <h5 class="card-header">User Info</h5>
    <div class="table-responsive text-nowrap">
        <table class="table table-hover" id="userInfo-dataTabel">
            <thead>
              <tr>
                <th>Name</th>
                <th>Email (UserID)</th>
                <th>Phone</th>
                <th>Actions</th>
              </tr>
            </thead>
          </table>
    </div>
  </div>
  <div class="modal fade userInfoDataAdd" id="largeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel3">Modal title</h5>
          <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
            <form id="userInfoDataAdd" action="#" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row g-1">
                    <div class="col mb-0">
                      <input type="hidden" id="id" name="id"/>
                      <label for="name" class="form-label">Full Name</label>
                      <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name" />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-6">
                      <label for="phone" class="form-label">Mobile No</label>
                      <input type="text" id="phone" name="phone" class="form-control" placeholder="Enter Phone No" />
                    </div>
                    <div class="col mb-6">
                      <label for="email" class="form-label">Email</label>
                      <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email Address" />
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col mb-6">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" id="password" class="form-control" placeholder="xxxxxxx" name="password" />
                    </div>
                </div>
                
                <div class="row g-1">
                  <div class="col mb-0">
                    <label for="UserType" class="form-label">User Type</label>
                    <select class="form-select" id="UserType" name="UserType" aria-label="Default select example">
                        <option selected="">Select User Type</option>
                        <option value="ADMIN">ADMIN</option>
                        <option value="Department">Department</option>
                    </select>
                  </div>
                  <div class="col mb-0">
                    <label for="Status" class="form-label">User Status</label>
                    <select class="form-select" id="Status" name="Status" aria-label="Default select example">
                        <option selected="">Select Status</option>
                        <option value="Active">Active</option>
                        <option value="InActive">InActive</option>
                    </select>
                  </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" onclick="addUserType()" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
</div>
@endsection
@section('admin_page_js')
<script>

function showModal(){
    $('.userInfoDataAdd form')[0].reset();
    $('#UserID').val("");
    $('.userInfoDataAdd').modal('show');
}

var table1 = $('#userInfo-dataTabel').DataTable({
  processing: true,
  serverSide: true,
  ajax: '{!! route('getAllUserInfo') !!}',
  columns: [
      {data: 'name', name: 'name'},
      {data: 'email', name: 'email'},
      {data: 'phone', name: 'phone'},
      {data: 'action', name: 'action', orderable: false, searchable: false}
  ]
});


function addUserType() {
    url = "{{ url('UserInfo') }}";
    $.ajax({
        url: url,
        type: "POST",
        data: new FormData($(".userInfoDataAdd form")[0]),
        contentType: false,
        processData: false,
        success: function (data) {
            console.log(data);
            var dataResult = JSON.parse(data);
            if (dataResult.statusCode == 200) {
                $('.userInfoDataAdd').modal('hide');
                $('#userInfo-dataTabel').DataTable().ajax.reload();
                swal("Success", dataResult.statusMsg);
                $('.userInfoDataAdd form')[0].reset();
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

function showUserInfoData(id) {
  $.ajax({
      url: "{{ url('UserInfo') }}" + '/' + id,
      type: "GET",
      dataType: "JSON",
      success: function (data) {
          $('.userInfoDataAdd form')[0].reset();
          $('.userInfoDataAdd').modal('show');
          $('.modal-title').text(data[0].name+' Information');
          $('#id').val(data[0].id);
          $('#password').val(data[0].password);
          $('#name').val(data[0].name);
          $('#email').val(data[0].email);
          $('#phone').val(data[0].phone);
          $('#MobileNo').val(data[0].MobileNo);
          $('#Status').val(data[0].Status);
          $('#UserType').val(data[0].UserType);
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

function  deleteUserInfoData(id) {
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
                    url: "{{ url('UserInfo') }}" + '/' + id,
                    type: "POST",
                    data: {'_method': 'DELETE', '_token': csrf_token},
                    success: function (data) {
                        console.log(data);
                        var dataResult = JSON.parse(data);
                        if (dataResult.statusCode == 200) {
                            $('#userInfo-dataTabel').DataTable().ajax.reload();
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
var csrf_tokens = document.querySelector('meta[name="csrf-token"]').content;
url = "{{ url('ShowDepartment') }}";
$.ajax({
    url: url,
    type: 'POST',
    data: {'ViewType': 'ShowDepartment', "_token": csrf_tokens},
    datatype: 'JSON',
    success: function (data) {
        var survery_type = $.parseJSON(data);
        if (survery_type != '') {
            var markup = "<option value=''>Select Departments</option>";
            for (var x = 0; x < survery_type.length; x++) {
                markup += "<option value=" + survery_type[x].departments_id + ">" + survery_type[x].departments_name + "</option>";
            }
            $("#Department").html(markup).show();
        } else {
            var markup = "<option value=''>Select Departments</option>";
            $("#Department").html(markup).show();
        }
    }

});

$(".DepartmentDiv").hide();
$("#UserType").change(function () {
  var UserType = this.value;
  if(UserType=="Department"){
    $(".DepartmentDiv").show();
  }else{
    $(".DepartmentDiv").hide();
  }
});
</script>
@endsection