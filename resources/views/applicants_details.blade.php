@extends('layouts.app')


@section('content')
<div class="container">
<div style="text-align:center;"> <span class="company_txt">Company Name : {{$c_name}} </span>
<h3>Job Title : {{$job_title}}</h3><br>
<?php $i=0 ?>
<h3>Applicants List </h3>
      <table class="table table-striped">
        <tr>
          <th>Srl No</th>
          <th>Applicant Name</th>
          <th>CV</th>
        </tr>
@foreach($applicants_dtls as $dt)
        <tr >
          <td>{{ ++$i }}</td>
          <td>{{$dt->fullname}}</td>
          <td><a href="{{Session::get('host_name')}}/storage/my_cv_folder/{{$dt->filename}}" class="btn btn-primary">Download</a></td>
          <!-- <td>{{"Session::get('host_name')"."/"."storage"."/"."my_cv_folder"."/"."$dt->filename"}}</td> -->
        </tr>
@endforeach
       

    </table>


</div>
</div>
@endsection