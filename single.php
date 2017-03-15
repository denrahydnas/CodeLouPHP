<?php 
    $pagetitle="Details";
    $subtitle =""; 
    include("incl/header.php"); 
   


if(isset($_GET['id'])) {
    /*$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); - moved into get_detail function*/
    list($id, $country, $city, $sights, $image, $visited, $fave) = get_detail(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
}

?>

 <!-- Add Details of single location selected, include sights)-->  

  <div class="container read_list"> 
      <div class="centering text-center">
          <?php
          if (!empty($id)) {
                echo "<h3>" . $city . ", " . $country . "</h3><br />";
                echo '<img class="main" src="img/' . $image . '">';
                echo "<h5> Sights & Activities: " . $sights . "</h5>";
                if ($visited != 0) {
                    echo "<h6> I've traveled to this location. </h6>";
                } else {
                    echo "<h6> I hope to go here someday. </h6>";
                }
               if ($fave != 0) {
                    echo "<h6> This is one of my favorite places to visit. </h6>";
                } 
              } 
                echo '<div class="text-center">' . '<a class="edit" href="single.php?id=' . $id . '"> Edit  </a>';
                echo " / ";
                echo '<a class="delete" href="delete.php?id=' . $id . '">  Delete</a>' . '</div>' . '</div>'; 
          
          ?>
  
        </div>  
      </div> 
 

      
<?php include("incl/footer.php"); ?>