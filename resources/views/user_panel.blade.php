@extends('layouts.app')


@section('content')
<div>
<div > <span class="company_txt">Name : {{$u_name}} </span>

<div style="float:left;padding-left:4%;padding-top:1%;padding-right:2%;border-right: 5px solid #9b2;">
<ul class="nav flex-column">
  <li class="active atag" ><a  id="cl" class="atag" data-toggle="pill" href="#home">Upload CV</a></li>
  <li><a class="atag"  data-toggle="pill" href="#">Edit Profile</a></li>
  <li><a  class="atag"  href="">Company Panel</a></li>
</ul>
</div><br>
<p onload="clickAtag">
</p>


</div>
<div style="float:left;padding-left:3%">
<div class="tab-content" >
  <div id="home" class="tab-pane fade in active">
    <h3>Create a job circular :</h3>
    
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
    
</div>
</div>
</div>

@endsection