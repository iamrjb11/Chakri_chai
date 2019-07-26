
<?php

include "../resources/views/templates/resourcesFile.php";
?>

<ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#user">User</a></li>
            <li><a data-toggle="tab" href="#company">Company</a></li>
  </ul>
    <div class="tab-content">
        <div id="user" class="tab-pane fade in active">
            <form method="post" enctype="multipart/form-data" action="{{ URL::to('/signup') }}" class="signup_form">

            {{ csrf_field() }}
            <input type="text" name="u_name" value="" class="form-control" placeholder="Full Name" required><br>
            <input type="text" name="u_email" value="" class="form-control" placeholder="Email" required><br>
            <input type="text" name="u_password" value="" class="form-control" placeholder="Password" required><br>
            
            <input type="submit" name="" class="btn btn-primary" value="Sign up" style="width:100%;"><br>
            </form>
        </div>
        <div id="company" class="tab-pane fade">
            <form method="post" enctype="multipart/form-data" action="{{ URL::to('/signup') }}" class="signup_form">

            {{ csrf_field() }}  
            <input type="text" name="u_name" value="" class="form-control" placeholder="Company Name" required><br>
            <input type="text" name="u_email" value="" class="form-control" placeholder="Email" required><br>
            <input type="text" name="u_password" value="" class="form-control" placeholder="Password" required><br>
            
            <input type="submit" name="" class="btn btn-primary" value="Sign up" style="width:100%;"><br>
            </form>
        </div>
    </div>