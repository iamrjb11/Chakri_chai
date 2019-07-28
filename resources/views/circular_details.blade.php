@extends('layouts.app')

@section('content')

<div class="container">
    <h2 style="color:#050aff;font-weight:bold">{{$details[0]->job_title}}</h2>
    <h4 style="color:green;font-weight:bold">{{$details[0]->name}}</h4><br>

    <h3>Job Description</h3>
    <?php $details[0]->job_description = nl2br($details[0]->job_description) ?> 
    <div class="pad"><?php echo $details[0]->job_description; ?></div><br><br>

    <h3>Job Location</h3>
    <?php $details[0]->job_location = nl2br($details[0]->job_location) ?>  
    <div class="pad"><?php echo $details[0]->job_location; ?></div><br><br>
    
    <h3>Job Country</h3>  
    <div class="pad">{{ $details[0]->job_country }}</div><br><br>
    
    <h3>Salary</h3> 
    <div class="pad">{{ $details[0]->job_salary }}</div><br><br>
    
    @if($apply_sts === "no")
    <a href="{{Session::get('host_name')}}/apply/{{$details[0]->cir_id}}"
     class="btn btn-primary">Apply Online</a>
     @else
     <h3 style="color:green;font-weight:bold;">Applied Successfully</h3>
     @endif
     <br><h4 style="color:red;"> Deadline : {{ $details[0]->deadline }}</h4><br>
</div>



@endsection