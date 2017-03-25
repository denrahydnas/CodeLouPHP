<?php 

$pagetitle="Travelogue";
$subtitle ="Where I've been and where I want to go next...";  
include("incl/header.php"); 

?>

<!-- display randomly selected locations and images for 3 categories
        Previously visited: if visited checkbox = true
        Wish list: if visited checkbox = false
        Favorite: if favorite check box = true -->

<div class="locations container"> 
<div class="row">
    <div class="col-sm-8 col-md-6 col-lg-4 text-center">
        <h3>Places I've Visited</h3>
            <a href="pasttrips.php">
            <?php
            echo '<img class="main" src="img/' . get_image_visited() . '"';
            echo 'alt="visited locations">';
            ?>
            </a>
        <p><a class="btn btn-primary btn-sm" href="pasttrips.php" role="button">See More &raquo;</a></p>
    </div>
    <div class="col-sm-8 col-md-6 col-lg-4 text-center">
        <h3>Travel Wish List</h3>
            <a href="future.php">
            <?php
            echo '<img class="main" src="img/' . get_image_future() . '"';
            echo 'alt="wishlist locations">';
            ?>
            </a>
        <p><a class="btn btn-primary btn-sm" href="future.php" role="button">See More &raquo;</a></p>
    </div>
    <div class="col-sm-8 col-md-6 col-lg-4 text-center">
        <h3>Favorite Places</h3>
            <a href="favorites.php">
            <?php
            echo '<img class="main" src="img/' . get_image_fave() . '"';
            echo 'alt=favorite locations">';
            ?>
            </a>
        <p><a class="btn btn-primary btn-sm" href="favorites.php" role="button">See More &raquo;</a></p>
    </div>
</div>
</div>
      
<?php include("incl/footer.php"); ?>

   