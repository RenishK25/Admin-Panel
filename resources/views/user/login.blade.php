<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap Simple Login Form</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
  	font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>
<body>
<div class="login-form">
    {{-- <form action="{{url('api/login_form')}}" method="post"> --}}
      <form>  
      @csrf
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" class="form-control" name="email" placeholder="Username" required="required">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="password" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <label class="float-left form-check-label"><input type="checkbox"> Remember me</label>
            <a href="#" class="float-right">Forgot Password?</a>
        </div>        
    </form>
    <p class="text-center"><a href="#">Create an Account</a></p>
    <button type="buttons" class="n_level">Get data from N level</button>

</div>
</body>
<script type="text/javascript">
    $(document).ready( function () {
      $(".n_level").on("click",function(){
        $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': "{{@csrf_token()}}"
              },
          });
        $.ajax({
          url :"{{url('api/n_level')}}",
          method:"post",
          dataType: "json",
          success : function (data) {
          
        }
      }) 
      })
      $("form").on("submit",function(e){
      e.preventDefault(); 
        $("form").serialize();
        $('div.error span.text-danger').html("");
        $.ajaxSetup({
            headers: {
                  'X-CSRF-TOKEN': "{{@csrf_token()}}"
              },
          });
        $.ajax({
            url :"{{url('api/login_form')}}",
          method:"post",
          data: $("form").serialize(),
          dataType: "json",
          success : function (data) {
          if(data.status == 'success'){
            //   swal("  ", {icon:"success",  title:"Login Successful",  buttons: false})
            //     setTimeout(myGreeting, 900);
            //     function myGreeting() {
            //     // window.location.href="{{url('//dashboard/')}}";  
            //     }
              }else if(data.status == 'error') {
              $.each(data.error,function(key,val){
                $('div.error span#' + key).html(val);
              });
            }else if(data.status == 'faile'){
            //   swal(data.message, "Please Try Again!", "error");
              } 
          }
        })
      });
    });
  </script>
</html>