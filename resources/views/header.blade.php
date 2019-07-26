<?php
    include "../resources/views/templates/resourcesFile.php";
    //echo Session::get('host_name');

?>
<?php if(Session::get('header_code') === '1') { ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo Session::get('host_name');?>" style="font-size:200%;padding:10%">Chakri Chai</a>
    </div>
    
    <ul class="nav navbar-nav navbar-right">
      <li><a href="<?php echo Session::get('host_name')."/signup"; ?>"><span class="glyphicon glyphicon-user"></span> Sign Up  </a></li>
    </ul>
  </div>
</nav>

<?php } elseif(Session::get('header_code') === '2') { ?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo Session::get('host_name'); ?>" style="font-size:200%">Chakri Chai</a>
    </div>
    
   
  </div>
</nav>
<?php } else { ?>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo Session::get('host_name'); ?>" style="font-size:200%">Chakri Chai</a>
    </div>
    
   
  </div>
 
  <ul class="nav navbar-nav navbar-right">

  </ul>
 
</nav>
<?php } ?>