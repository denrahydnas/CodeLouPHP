<?php 
    $pagetitle="Vacation Selector";
    $subtitle ="You should go here next:";  
    include("incl/header.php"); 
    include("incl/functions.php"); 
?>
 
<!-- display one random location and image if favorite checkbox = true or visited = false-->

    <div class="container read_list"> 
      <div class="centering text-center">
          <?php
            foreach(get_random() as $item) {
                echo "<h3>" . $item['city'] . ", " . $item['country'] . "<br />";
                echo '<img class="main" src="img/' . $item['image'] . '">';
            }
          ?>
    <!-- randomly choose from travel wish list and favorite places  use array_rand()? -->
          <p><a class="btn btn-primary btn-lg" href="random.php" role="button">Choose Again &raquo;</a></p>
        </div>  
      </div>
      
     

<?php include("incl/footer.php"); ?>