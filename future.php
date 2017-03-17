<?php 
    $pagetitle="Travel Wish List";
    $subtitle ="Where I want to go next...";  
    include("incl/header.php"); 
   
?>

<!-- display locations and images if visited check box = false
    allow to delete or change checkbox to visited and/or favorite -->

 <div class="container"> 
    <div class="read_list">
          <ul class="wish_list">
            <?php
                foreach(get_wish_list() as $item){
                    echo '<li><a href="single.php?id=' . $item["key"] . '">' . '<img class="list" src="img/' . $item['image'] . '">' . $item['city'] . ", " . $item['country'] . "</a></li>";
                }
            ?>
          </ul>
    </div>
</div>

      
<?php include("incl/footer.php"); ?>