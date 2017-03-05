<?php 
    $pagetitle="Visited Places";
    $subtitle ="Where I've been...";  
    include("incl/header.php"); 
?>

<!-- display locations and images if visited check box = true 
    allow to delete or update to favorite -->

    <div class="locations container"> 
      <div class="centering text-center">
          <h3>Places I've Visited</h3>
          <a href="past"><img class="main" src="img/dedos.png" alt="Punta Del Este, Uruguay"></a>
          <p><a class="btn btn-primary btn-sm" href="#" role="button">See More &raquo;</a></p>
        </div>
      </div>
      
<?php include("incl/footer.php"); ?>