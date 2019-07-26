<?php

include "../resources/views/templates/resourcesFile.php";
// if(count($errors)>0){
//   Session::put('msg_overlap_pblm',1);
//   Session::put('msg_code',"fail");
//   Session::put('msg_text',"Failed to sing up !");
//   blogController::reloadME();
// }
?>

<head>
  <style>
  .box{
    margin: auto;
    float:right;
    position:auto;
    padding-right:6%;
    padding-left:2%;
    padding-top:1%;
    padding-bottom:5%;
    width:150%;
    border-left: 5px solid #9b2;
    box-shadow: 0 0 20px rgba(0,0,0,.15);
    background-color:#b6ccef;
  }
  .signup_form{
    padding-left:3%;
    padding-right:3%;
    float:right;
    
  }
  .signupTxt{
    border-bottom: 2px solid black;
    font-size:30px;
    font-weight:bold;
    color:#138906;
  }
  @media only screen and (max-width: 700px){
    .box{
      margin: auto;
      position:auto;
      padding-left:2%;
      padding-top:1%;
      padding-bottom:3%;
      width:100%;
      border-left: 5px solid #9b2;
      border-right: 5px solid #9b2;
      box-shadow: 0 0 20px rgba(0,0,0,.15);
      
    }
    .signup_form{
      float:none;
      width:100%;
    }
    .web_name{
      width:100%;
      padding-left:20%;
    }
  } 
  </style>  
</head>


    
<body style="background-color:white;">
<?php include "../resources/views/header.blade.php"; ?> 

@if(count($errors) > 0)

@endif
<br><br>
<div style="float:left">
  <img src="/images/chakri_chai.jpg" style="padding-top:30px;width:90%;padding-left:5%;"><br>
 
</div>
<div style="float:right;padding-right:15%;padding-top:3%">
  
  
  <div class="signupTxt">Log in</div><br>
  <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#user">User</a></li>
            <li><a data-toggle="tab" href="#company">Company</a></li>
  </ul>
    <div class="tab-content">
        <div id="user" class="tab-pane fade in active">
        
            <form method="post" enctype="multipart/form-data" action="{{ URL::to('/login_user') }}" class="">

            {{ csrf_field() }}
            <input type="text" name="u_email" value="" class="form-control" placeholder="Email" required><br>
            <input type="text" name="u_password" value="" class="form-control" placeholder="Password" required><br>
            
            <input type="submit" name="" class="btn btn-primary" value="Log in" style="width:100%;"><br>
            </form>
        </div>
        <div id="company" class="tab-pane fade">
            <form method="post" enctype="multipart/form-data" action="{{ URL::to('/login_company') }}" class="">

            {{ csrf_field() }}  
            <input type="text" name="c_email" value="" class="form-control" placeholder="Email" required><br>
            <input type="text" name="c_password" value="" class="form-control" placeholder="Password" required><br>
            
            <input type="submit" name="" class="btn btn-primary" value="Log in" style="width:100%;"><br>
            @if(count($errors)>0)
            <p style="color:red;padding-top:10px;">* Failed to login. Please check all the information.</p>
            @endif
            </form>
        </div>
    </div>

  </div>

</body>
