<?php 
    $pagetitle="Visited Places";
    $subtitle ="Where I've been...";  
    include("incl/header.php"); 


//var_dump get_random()

?>

<!-- display locations and images if visited check box = true 
    allow to delete or update to favorite -->

 <div class="container read_list"> 
    <div class="centering">
          <ul class="visited_list">
            <?php
                foreach(get_visited_list() as $item){
                    echo "<li> <a href='single.php?id=" . $item["key"] . "'>" . '<img class="list" src="img/' . $item['image'] . '">' . $item['city'] . ", " . $item['country'] . "</a></li>";
                }
            ?>
          </ul>
    </div>
</div>

      
<?php include("incl/footer.php"); ?>