<?php
    $pagetitle="Travelogue Favorites";
    $subtitle ="Favorite Places";  
    include("incl/header.php"); 
    include("incl/functions.php");    
?>

<!-- display locations and images if favorite check box = true 
    allow to delete or update? -->

    
 <div class="container read_list"> 
    <div class="centering">
          <ul class="fave_list">
            <?php
                foreach(get_fave_list() as $item){
                    echo "<li>" . '<img class="list" src="img/' . $item['image'] . '">' . $item['city'] . ", " . $item['country'] . "</li>";
                }
            ?>
          </ul>
    </div>
</div>
      
<?php include("incl/footer.php"); ?>