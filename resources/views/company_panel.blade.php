@extends('layouts.app')


@section('content')
<div style="text-align:center;"> <span class="company_txt">Company Name : {{$c_name[0]->name}} </span>
<div>

<div class="panel_side_menu">
<ul class="nav flex-column">
  <li class="active" ><a  id="cl" class="atag" data-toggle="pill" href="#home">Post Circular</a></li>
  <li><a class="atag"  data-toggle="pill" href="{{Session::get('host_name')}}">Applicants List</a></li>
  <li><a class="atag"   href="{{Session::get('host_name')}}/user_panel">User Panel</a></li>
  
</ul>
</div><br>
<p onload="clickAtag">
</p>


</div>
<div style="float:left;padding-left:3%">
<div class="tab-content" >
  <div id="home" class="tab-pane fade in active">
    <h3>Create a job circular :</h3>
    <form  enctype="multipart/form-data" 
    @if($cir_id > 0)
    method="get"
    action="/update_circular/{{$cir_id}}" 
    @else
    method="post"
    action="/create_circular"
    @endif
     class="form-horizontal col-sm-14"  >
        <input type="text" class="form-control" name="job_title" placeholder="Job Title" required
        @if($cir_id > 0)
        value="{{$edit_data[0]->job_title}}"
        @endif
        
        ><br>
        <input type="text" class="form-control" name="salary" placeholder="Salary" required
        @if($cir_id > 0)
        value="{{$edit_data[0]->job_salary}}"
        @endif
        ><br>
        <textarea  rows="4" cols="50" class="form-control" name="job_description"
         placeholder="Job Description" required>@if($cir_id > 0){{$edit_data[0]->job_description}}
        @endif</textarea><br>
        <textarea  rows="4" cols="50" class="form-control" name="location" 
        placeholder="Location" required>@if($cir_id > 0){{$edit_data[0]->job_location}}
        @endif
        </textarea><br>
        
        <input type="text" class="form-control" name="country" placeholder="Country" required
        @if($cir_id > 0)
        value="{{$edit_data[0]->job_country}}"
        @endif
        ><br>
        <input type="text" class="form-control" name="deadline" placeholder="Deadline" required
        @if($cir_id > 0)
        value="{{$edit_data[0]->deadline}}"
        @endif
        ><br>
        
        <input type="submit" 
        @if($cir_id > 0)
        value="Update" 
        @else
        Value="Post"
        @endif 
        class="btn btn-success" style="width:100%"><br><br>
    </form>
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Menu 1</h3>
    <p>Some content in menu 1.</p>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Menu 2</h3>
    <p>Some content in menu 2.</p>
  </div>
</div>
</div>
<div style="float:right;padding-right:10%;"><h3>Circular Lists :</h3>
    <table class="table table-striped">
        <tr>
          <th>Job Title</th>
          <th>Deadline</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
@foreach($circulars as $dt)
        <tr>
          <td>{{$dt->job_title}}</td>
          <td>{{$dt->deadline}}</td>
          <td><a href="{{Session::get('host_name')}}/edit_circular/{{$dt->cir_id}}">Edit</a></td>
          <td><a href="{{Session::get('host_name')}}/delete_circular/3">Delete</a></td>
        </tr>
@endforeach
       

    </table>
</div>
</div>
</div>

@endsection