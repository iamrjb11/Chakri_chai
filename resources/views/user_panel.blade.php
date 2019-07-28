@extends('layouts.app')


@section('content')
<div style="text-align:center"> <span class="company_txt">Name : {{$u_name}} </span>
<div>


<div class="panel_side_menu">
<ul class="nav flex-column">
  <li class="active" ><a  id="cl" class="atag" data-toggle="pill" href="#home">Upload CV</a></li>
  <li><a class="atag"  data-toggle="pill" href="#edit">Edit Profile</a></li

  @if(Auth::user()->c_id)
  <li><a  class="atag"  href="{{Session::get('host_name')}}/panel">Company Panel</a></li>
  @else
  @endif
</ul>
</div><br>
<p onload="clickAtag">
</p>


</div>

<div class="tab-content" >
  <div id="home" class="tab-pane fade in active"><br><br>
    <div style="float:left;padding-left:10%">
      <h3>Upload your new CV :</h3>
      <form method="post" action="/upload_cv" enctype="multipart/form-data">
      @csrf
        <input type="file" class="form-control" name="my_cv">
        <input type="submit" class="btn btn-success" value="Upload" style="width:100%">
      </form>
    </div>


  <div style="float:right;padding-right:20%;">
    <h3>Download your current CV :</h3>
    @if( $file ) 
    <a href="{{Session::get('host_name')}}/storage/my_cv_folder/{{$file}}">{{Session::get('host_name')}}/storage/my_cv_folder/{{$file}}</a>
    @else
    <h3 style="color:red;">no cv here</h3>
    @endif
  </div>

</div>
<div id="edit" class="tab-pane fade">
  <h3>Edit Personal Infromation</h3>
  <p>Some content in edit.</p>
</div>
  



</div>

@endsection