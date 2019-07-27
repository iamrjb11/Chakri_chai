
<?php

include "../resources/views/templates/resourcesFile.php";
?>
<head>
<title>Sign up</title>
<style>
.reg_txt{
    font-size:200%;
    color:black;
    font-weight:bold;
}
.pad{
    padding-left:1%;
}
</style>
</head>
<body>
<?php include "../resources/views/header.blade.php"; ?>
<div class="container">
    <h2 style="color:green;font-weight:bold">{{$details[0]->job_title}}</h2>
    <h3>{{$details[0]->c_name}}</h3><br>

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
    
    <a href="{{Session::get('host_name')}}/apply/{{$details[0]->cir_id}}/{{$details[0]->cir_id}}"
     class="btn btn-primary">Apply Online</a><br>
    <h4 style="color:red;"> Deadline : {{ $details[0]->deadline }}</h4><br>
</div>






<?php include "../resources/views/footer.blade.php"; ?>

</body>