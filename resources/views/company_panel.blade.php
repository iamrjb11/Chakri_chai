@extends('layouts.app')


@section('content')

<div>
<div > <span class="company_txt">Company Name : {{$c_name=$c_name[0]->name}} </span>
<div class="panel_side_menu">
<ul class="nav flex-column">
  <li class="active" ><a  id="cl" class="atag" data-toggle="pill" href="#home">Post Circular</a></li>
  <li><a class="atag"  data-toggle="pill" href="#applicants">Applicants List</a></li>
  <li><a class="atag"   href="{{Session::get('host_name')}}/user_panel">User Panel</a></li>
  
</ul>
</div><br>
<p onload="clickAtag">
</p>


</div>

<div class="tab-content" >
<div id="home" class="tab-pane fade in active">
  <div style="float:left;padding-left:10%">
    <h3>Create a job circular </h3>
    <form  enctype="multipart/form-data" 
    @if($circular_id > 0)
      method="get"
      action="/update_circular/{{$circular_id}}" 
    @else
      method="post"
      action="/create_circular"
    @endif
     class="form-horizontal col-sm-14"  >
        <input type="text" class="form-control" name="job_title" placeholder="Job Title" required
        @if($circular_id > 0)
        value="{{$edit_data[0]->job_title}}"
        @endif
        
        ><br>
        <input type="text" class="form-control" name="job_vacancy" placeholder="Job Vacancy" required
        @if($circular_id > 0)
        value="{{$edit_data[0]->job_vacancy}}"
        @endif
        
        ><br>
        <input type="text" class="form-control" name="salary" placeholder="Salary" required
        @if($circular_id > 0)
        value="{{$edit_data[0]->job_salary}}"
        @endif
        ><br>
        <input type="text" class="form-control" name="experience" placeholder="Experience" required
        @if($circular_id > 0)
        value="{{$edit_data[0]->job_experience}}"
        @endif
        ><br>
        <textarea  rows="4" cols="50" class="form-control" name="job_description"
         placeholder="Job Description" required>@if($circular_id > 0){{$edit_data[0]->job_description}}
        @endif</textarea><br>

        <textarea  rows="4" cols="50" class="form-control" name="educational_info"
         placeholder="Educational Requirements" required>@if($circular_id > 0){{$edit_data[0]->educational_info}}
        @endif</textarea><br>

        <input type="text" class="form-control" name="location" placeholder="Location" required
        @if($circular_id > 0)
        value="{{$edit_data[0]->job_location}}"
        @endif
        ><br>

        <input type="text" class="form-control" name="country" placeholder="Country" required
        @if($circular_id > 0)
        value="{{$edit_data[0]->job_country}}"
        @endif
        ><br>
        <input type="text" class="form-control" name="deadline" placeholder="Deadline" required
        @if($circular_id > 0)
        value="{{$edit_data[0]->deadline}}"
        @endif
        ><br>
        
        <input type="submit" 
        @if($circular_id > 0)
        value="Update" 
        @else
        Value="Post"
        @endif 
        class="btn btn-success" style="width:100%"><br><br>
    </form>
  </div>

  <div style="float:right;padding-right:7%;"><h3>Circular Lists </h3>
    <table class="table table-striped">
        <tr>
          <th>Job Title</th>
          <th>Deadline</th>
          <th>Edit</th>
          <th>Visibility</th>
        </tr>
@foreach($circulars as $dt)
        <tr>
          <td>{{$dt->job_title}}</td>
          <td>{{$dt->deadline}}</td>
          <td><a href="{{Session::get('host_name')}}/edit_circular/{{$dt->id}}">Edit</a></td>
          <td><a href="{{Session::get('host_name')}}/visibility/{{$dt->id}}/{{$dt->visibility}}">
          @if($dt->visibility == 1)
          ON
          @else
          OFF
          @endif
          </a></td>
        </tr>
@endforeach
       

    </table>
  </div>
</div>

  <div id="applicants" class="tab-pane fade">
    <div style="float:left;padding-left:10%">
      <h3>Applicants List </h3>
      <table class="table table-striped">
        <tr>
          <th>Job Title</th>
          <th>Number of applicants</th>
          <th>Deadline</th>
        </tr>
@foreach($applications as $dt)
        <tr class='clickable-row'  data-href="{{Session::get('host_name')}}/applicants_details/{{$dt->cir_id}}/{{$c_name}}/{{$dt->job_title}}" style="cursor:pointer;font-size: 150%;height:90px;">
          <td>{{$dt->job_title}}</td>
          <td>{{$dt->numof}}</td>
          <td>{{$dt->deadline}}</td>
        </tr>
@endforeach
       

    </table>

    </div>

  </div>
 
</div>
</div>


@endsection