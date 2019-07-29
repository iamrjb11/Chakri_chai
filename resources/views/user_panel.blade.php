@extends('layouts.app')


@section('content')

<div>

<div style="text-align:"> <span class="company_txt">Name : {{$u_name}} </span>
<div class="panel_side_menu">
<ul class="nav flex-column">
  <li class="active" ><a  id="cl" class="atag" data-toggle="pill" href="#home">Upload CV</a></li>
  

  @if(Auth::user()->c_id)
  <li><a  class="atag"  href="{{Session::get('host_name')}}/company_panel">Company Panel</a></li>
  @else
  <li><a class="atag"  data-toggle="pill" href="#create_company">Create Company</a></li>
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
      <form method="post" action="{{ route('upload') }}" enctype="multipart/form-data">
      @csrf
        <input type="file" class="form-control" name="my_cv" required>
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
<div id="create_company" class="tab-pane fade">
<div style="float:left;padding-left:23%">
  <h3>Create your own Company</h3>
  <form action="/create_company" method="post">
    <input type="text" class="form-control" placeholder="Company Name">
    <input type="submit" class="btn btn-success" value="Create" style="width:100%">
  </form>
  </div>
  
</div>
  



</div>

@endsection