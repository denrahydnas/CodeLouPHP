<?php
    $pagetitle="Travelogue Favorites";
    $subtitle ="Favorite Places";  
    include("incl/header.php"); 
?>

<!-- display locations and images if favorite check box = true 
    allow to delete or update? -->

    <div class="locations container"> 
      <div class="centering text-center">
          <h3>Favorite Places</h3>
          <a href="faves"><img class="main" src="img/giants.png" alt="Giant's Causeway, Northern Ireland"></a>
          <p><a class="btn btn-primary btn-sm" href="#" role="button">See More &raquo;</a></p>
        </div>
      </div>
      
<?php include("incl/footer.php"); ?>