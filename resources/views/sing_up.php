
<?php

include "../resources/views/templates/resourcesFile.php";
?>
<head>
<title>Sign up</title>
<style>
.reg_txt{
    font-size:200%;
    color:black;
    font-weight:bold;
}
</style>
</head>
<body>
<?php include "../resources/views/header.blade.php"; ?>


<div class="container" style="padding-left:15%;padding-right:15%">
<div class="reg_txt">Registration From</div><br>
<ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#user">User</a></li>
            <li><a data-toggle="tab" href="#company">Company</a></li>
  </ul>
    <div class="tab-content">
        <div id="user" class="tab-pane fade in active">
            <form method="post" enctype="multipart/form-data" action="/signup_user" >

            
                <input type="text" name="u_name" value="" class="form-control" placeholder="Full Name" required><br>
                <input type="text" name="u_email" value="" class="form-control" placeholder="Email" required><br>
                <input type="password" name="u_password" value="" class="form-control" placeholder="Password" required><br>
                
                <input type="submit" name="" class="btn btn-primary" value="Sign up" style="width:100%;"><br>
            </form>
        </div>
        <div id="company" class="tab-pane fade">
            <form method="post" enctype="multipart/form-data" action="/signup_company" class="">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                <input type="text" name="c_name" value="" class="form-control" placeholder="Company Name" required><br>
                <input type="text" name="c_email" value="" class="form-control" placeholder="Email" required><br>
                <input type="password" name="c_password" value="" class="form-control" placeholder="Password" required><br>
                
                <input type="submit" name="" class="btn btn-primary" value="Sign up" style="width:100%;"><br>
            </form>
        </div>
    </div>
    </div>
    </body>