<?php 
    $pagetitle="Vacation Selector";
    $subtitle ="You should go here next:";  
    include("incl/header.php"); 
?>
 
<!-- display one random location and image if favorite checkbox = true or visited = false-->

    <div class="locations container"> 
      <div class="centering">
        <div class="text-center">
          <h3>Random Location</h3>
    <!-- randomly choose from travel wish list and favorite places-->
          <p><a class="btn btn-primary btn-lg" href="random.html" role="button">Choose Again &raquo;</a></p>
        </div>
        
      </div>
      </div>
      
<?php include("incl/footer.php"); ?>