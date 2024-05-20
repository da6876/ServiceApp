@extends('layout.public')
@section('content')
    <!-- Content -->
    <div class="container-xxl" style="width: 500px">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body UserLogin">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                  <h3 class="justify-content-center">
                    Service App Login
                  </h3>
              </div>
              <hr>
              <!-- /Logo -->
              <h5 class="mb-2 text-center">Welcome to <strong> Admin!</strong> 👋</h5>

              <form action="#" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Enter your email or username" autofocus/>
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                  </div>
                  <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password"/>
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                {{-- <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember-me" />
                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                  </div>
                </div> --}}
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" id="myButton" type="button" onclick="checkLogin()">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>
    <!-- / Content -->
@endsection
@section('page_js')

<script>

    document.getElementById("idpassword")
        .addEventListener("keyup", function(event) {
            event.preventDefault();
            if (event.keyCode === 13) {
                document.getElementById("myButton").click();
            }
        });

</script>
<script>

    function checkLogin() {
        var UseId  = $("#inemail").val();
        var UseUser  = $("#idpassword").val();

        if (UseId!=''){
            if (UseUser!=''){
                loginNow();
            } else{
                swal({
                    text: "Enter Your Password Here !!",
                    icon: "error",
                    timer: '3000'
                });
            }
        } else{
            swal({
                text: "Enter Your Email Here !!",
                icon: "error",
                timer: '3000'
            });
        }

    }

    function loginNow() {
        url = "{{ url('UserLoginRe') }}";
        $.ajax({
            url: url,
            type: "POST",
            data: new FormData($(".UserLogin form")[0]),
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
                var dataResult = JSON.parse(data);
                if (dataResult.statusCode == 200) {

                    window.location.href = 'Dashboard';
                    $('.UserLogin form')[0].reset();
                } else if (dataResult.statusCode == 201) {
                    swal({
                        text: "Login Failed",
                        icon: "error",
                        timer: '1500'
                    });
                }
            }, error: function (data) {
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
</script>
@endsection