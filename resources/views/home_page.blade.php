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
  <script>
  $(document).ready(function($) {
    $(".clickable-row").on({

      click: function() {
        window.location = $(this).data("href");
    },
    mouseenter: function(){
      $(this).css({"background-color": "lightgray", "font-size": "200%"});
    },
    mouseleave: function(){
      $(this).css({"background-color": "", "font-size": "150%"});
    }

    })
});
  
  </script>
</head>


    
<body style="background-color:white;">
<?php include "../resources/views/header.blade.php"; ?>
<div style="text-align:center;"> 
<?php
include "../resources/views/templates/image_slide.php"; ?> 
</div>
<li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        rr <span class="caret"></span>
    </a>

    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>
<div class="container">
<h2>Find your right job</h2>
  <table class="table table-striped">
  <thead>
  <tr>
    <td>Job Title</td>
    <td>Conpany Name</td>
    <td>Location</td>
    <td>Deadline</td>
  
  </tr>
  </thead>
  <tbody>
  @foreach($circulars as $dt)
  
  <tr class='clickable-row' data-href="{{Session::get('host_name')}}/circular_details/{{$dt->cir_id}}" style="cursor:pointer;font-size: 150%" >



    <td>{{$dt->job_title}}</td>
    <td>{{$dt->c_name}}</td>
    <td>{{$dt->job_location}}</td>
    <td>{{$dt->deadline}}</td>
  
  </tr>

  @endforeach
  </tbody>
  </table>

  </div>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          
        </div>
        <div class="modal-body" style="padding-left:5%;padding-right:5%;">
          <div class="signupTxt">Log in</div><br>
            <ul class="nav nav-tabs">
                      <li class="active"><a data-toggle="tab" href="#user">User</a></li>
                      <li><a data-toggle="tab" href="#company">Company</a></li>
            </ul>
              <div class="tab-content">
                  <div id="user" class="tab-pane fade in active">
          
              <form method="post" enctype="multipart/form-data" action="/login_user'" class="">

              @csrf
              <input type="text" name="u_email" value="" class="form-control" placeholder="Email" required><br>
              <input type="text" name="u_password" value="" class="form-control" placeholder="Password" required><br>
            
            <input type="submit" name="" class="btn btn-primary" value="Log in" style="width:100%;"><br>
            </form>
            </div>
            <div id="company" class="tab-pane fade">
            <form method="post" enctype="multipart/form-data" action="/login_company" class="">

            @csrf
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
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      </div>
    </div>
  </div><br><br>

  <?php include "../resources/views/footer.blade.php"; ?>

</body>
