<?php 

$pagetitle="Visited Places";
$subtitle ="Where I've been...";  
include("incl/header.php"); 

?>

<!-- display locations and images if visited check box = true -->

<div class="container"> 
    <div class="read_list">
        <ul class="visited_list">
        <?php
        foreach(get_visited_list() as $item){
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