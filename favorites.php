<?php

$pagetitle="Travelogue Favorites";
$subtitle ="Favorite Places";  
include("incl/header.php"); 

?>

<!-- display locations and images if favorite check box = true -->
    
 <div class="container"> 
    <div class="read_list">
        <ul class="fave_list">
        <?php
        foreach(get_fave_list() as $item){
            echo "<li> <a href='single.php?id=" . $item["key"] . "'>" 
            . '<img class="list" src="img/' . $item['image'] . '">' 
            . $item['city'] . ", " 
            . $item['country'] 
            . "</a></li>";
        } ?>
        </ul>
    </div>
</div>

<?php include("incl/footer.php"); ?>