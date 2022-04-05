<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

      <title>BGHMC Linen Management System</title>

  <!-- Custom fonts for this template-->
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link href="{{ asset('css/all.min.css') }}" rel="stylesheet" type="text/css">

  <link rel="stylesheet" href="../css/login.css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
  
  
  <!-- Custom styles for this template-->
  {{-- <link href="{{ asset('css/sb-admin-2.css') }}" rel="stylesheet"> --}}
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
   
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    
  
<script>

$( document ).ready(function() {
    console.log( "ready!" );
    console.log($('#verifyHomisAccountIfExist').val());

           $('#cancelCreationButton').click(function (){
                 
                  window.location ="/home";
            });
        
        if($('#verifyHomisAccountIfExist').val() == "homis_not_exist"){
            $('#noRecordModal').modal('show');
            console.log('create modal open');
        }
        
        if($('#verifyHomisAccountIfExist').val() == "homis_exist"){          
          $('#successCreation').modal('show');
            console.log('successCreation create modal open');
            $('#successCreationButton').click(function (){
                  $("#successCreation").modal("hide");
                  window.location ="/home";
            });
        }

        if($('#verifyHomisAccountIfExist').val() == "linen_duplicate"){
          
          console.log('linenAccountExist create modal open');
            $("#linenAccountExist").modal("show");
                
        }

        
});

$(function(){
    $("#wardRadio, #officeRadio").change(function(){
        $("#wardText, #officeText").val("").attr("readonly",true);
        if($("#wardRadio").is(":checked")){
            $("#wardText").removeAttr("readonly");
            $("#wardRadio").attr("required",true);
            $("#wardText").attr("required",true);
            $("#wardText").prop('disabled', false);
            $("#wardText").focus();
        }
        else if($("#officeRadio").is(":checked")){
            $("#officeText").removeAttr("readonly");
            $("#officeRadio").attr("required",true);
            $("#officeText").attr("required",true);
            $("#officeText").prop('disabled', false);
            $("#officeText").focus();   
        }
    });
});


function showConfirmPassword() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

  var x = document.getElementById("confirm_password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Password match!';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Password does not match';
  }
}



</script>

</head>
<body>
<div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-md-offset-4">
                
                <div class="register-account-wall">
                     
                    <img class="profile-img" src="../bghmc.png" alt="" height="40" width="40">
                    <h1 class="text-center register-title"><strong>BGHMC | Linen Management System</strong></h1>
                    <center><h4><strong>Create account for LINEN</strong></h4>
                    <h5>Please use your HOMIS account</h5></center>
                    
                    <input type="hidden" class="form-control" id="verifyHomisAccountIfExist"  value="{{$verifyHomisAccountIfExist}}"  disabled > 
                    <form class="form-signin" method="POST" action="/register/validateUser">
                        @csrf
                    
                    <input type="text" class="form-control" name="username" placeHolder="&#xf007; Username:" style="font-family:Arial, FontAwesome" required autofocus>
                    <input type="password" class="form-control" name="password" id="password" placeHolder="&#xf023; Password:" style="font-family:Arial, FontAwesome" required onkeyup='check();'>
                    <input type="password" class="form-control" name="confirmPassword" id="confirm_password" placeHolder="&#xf084; Confirm Password:" style="font-family:Arial, FontAwesome" required  onkeyup='check();'>
                    <div class="sticky-top"> 
                         <span style="font-size:14px" id='message'></span>    
                         <div  style='float:right;'>
                        <input type="checkbox" onclick="showConfirmPassword()"> Show Password 
                    </div>                                            
                     </div>
                    
                    <br>
                    
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="ward_office" id="wardRadio" required >
                      <label class="form-check-label" for="wardRadio">
                        Ward
                      </label>                      
                      <select class="form-control form-control-lg" id="wardText" name="ward_id"  disabled readonly>
                            <option value="" selected disabled hidden> Choose Ward</option>
                            @foreach($wardList as $ward)                                                                
		                        <option value="{{$ward->id}}">
                                    {{$ward->ward_name}}
                                 </option>
                             @endforeach
                        </select>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="ward_office" id="officeRadio" required>
                      <label class="form-check-label" for="officeRadio">
                        Office 
                      </label>
                      <select class="form-control form-control-lg" id="officeText" name="office_id"  disabled readonly>
                            <option value="" selected disabled hidden> Choose Office</option>
                            @foreach($officeList as $office)                                                                
		                        <option value="{{$office->id}}">
                                    {{$office->office_name}}
                                 </option>
                             @endforeach
                        </select>
                    </div>
                    
                   
                   <br>
                        <button class="btn btn-lg btn-secondary btn-block" type="submit" >
                            Register
                        </button>

                        <button class="btn btn-lg btn-secondary btn-block" type="button" id="cancelCreationButton" >
                            Cancel
                        </button>

                      
                       
                    
                    </form>
                    
                    
                </div>    
            </div>                
              
        </div>
            
    </div>
</div>

<!-- Homis account does not exist modal -->
<div class="modal" tabindex="-1" role="dialog" id="noRecordModal">
    <div class="modal-dialog bg-info" role="document">
      <div class="modal-content bg-info">
        <div class="modal-header bg-info">
          <h3 class="modal-title"><strong>Error!</strong></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <h3>NO HOMIS ACCOUNT FOUND !!</h3>
          <span style="font-size:20px" > Please contact your administrator.</span> 
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
        </div>
      </div>
    </div>
</div>

<!-- successful creation linen account modal -->
<div class="modal" tabindex="-1" role="dialog" id="successCreation">
    <div class="modal-dialog bg-info" role="document">
      <div class="modal-content bg-info">
        <div class="modal-header bg-info">
          <h3 class="modal-title"><strong>Success!</strong></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <h3>Linen Account Successfully Created</h3>
         
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-secondary"  id="successCreationButton">Proceed to Log in</button>
        </div>
      </div>
    </div>
</div>


<!-- Linen account already  exist modal -->
<div class="modal" tabindex="-1" role="dialog" id="linenAccountExist">
    <div class="modal-dialog bg-info" role="document">
      <div class="modal-content bg-info">
        <div class="modal-header bg-info">
          <h3 class="modal-title"><strong>Error!</strong></h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <h3>LINEN Account already exist !!</h3>
          <span style="font-size:20px" > Please contact your administrator.</span> 
        </div>
        <div class="modal-footer">
          
          <button type="button" class="btn btn-primary" data-dismiss="modal" >Close</button>
        </div>
      </div>
    </div>
</div>


</body>

</html>
