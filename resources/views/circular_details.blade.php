@extends('layouts.app')

@section('content')

<div class="container">
<div style="border-bottom: 2px solid blue;"> 
    <h2 style="color:#050aff;font-weight:bold">{{$details[0]->job_title}}</h2>
    <h5 style="color:green;font-weight:bold">{{$details[0]->name}}</h5>
</div><br>

    <h3>Job Vacancy</h3>
    <div class="pad">{{ $details[0]->job_vacancy }}</div><br><br>

    <h3>Job Description</h3>
    <?php $details[0]->job_description = nl2br($details[0]->job_description) ?> 
    <div class="pad"><?php echo $details[0]->job_description; ?></div><br><br>
    
    <h3>Educational Requirements</h3>
    <?php $details[0]->educational_info = nl2br($details[0]->educational_info) ?> 
    <div class="pad"><?php echo $details[0]->educational_info; ?></div><br><br>

    <h3>Salary</h3> 
    <div class="pad">{{ $details[0]->job_salary }}</div><br><br>

    <h3>Job Location</h3>
    <div class="pad">{{$details[0]->job_location}}</div><br><br>
    
    
    
    
    <h3>Job Country</h3>  
    <div class="pad">{{ $details[0]->job_country }}</div><br>
    
    @if($apply_sts === "no")
    <a href="{{Session::get('host_name')}}/apply/{{$details[0]->c_id}}/{{$details[0]->cir_id}}"
     class="btn btn-primary" style="width:13%">Apply Online</a>
     @else
     <h3 style="color:green;font-weight:bold;">Applied Successfully</h3>
     @endif
     <br><h4 style="color:red;"> Deadline : {{ $details[0]->deadline }}</h4><br>
</div>



@endsection