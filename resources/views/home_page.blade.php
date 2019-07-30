@extends('layouts.app')

@section('content')

<div style="text-align:center;"> 
<?php
include "../resources/views/templates/image_slide.php"; ?> 
</div>

<div class="container">
<h2>Find your right job</h2>
  <table class="table table-striped">
  <thead>
  <tr>
    <td>Job Title</td>
    <td>Company Name</td>
    <td>Location</td>
    <td>Experience</td>
    <td>Deadline</td>
  
  </tr>
  </thead>
  <tbody>
  @foreach($circulars as $dt)
  
  <tr class='clickable-row'  data-href="{{Session::get('host_name')}}/circular_details/{{$dt->cir_id}}" style="cursor:pointer;font-size: 150%;height:90px;" >



    <td>{{$dt->job_title}}</td>
    <td>{{$dt->name}}</td>
    <td>{{$dt->job_location}}</td>
    <td>{{$dt->job_experience}}</td>
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


@endsection