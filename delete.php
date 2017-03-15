<?php 
    $pagetitle="Delete Location";
    $subtitle ="Delete Location from Travelogue";  
    include("incl/header.php"); 
  

if(isset($_GET['id'])) {
    /*$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT); - moved into get_detail function*/
    list($id, $country, $city, $sights, $image, $visited, $fave) = get_detail(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT));
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        if (!empty($id)) {
            $error_message = "Select a location to delete.";
            } else {
            if (delete_detail($id)){
                echo "<h3 class='text-center'> I'm sorry you didn't want to go there! It looked like a nice place. </h3>";
                exit;
            }else {
                $error_message = "Could not delete location. Please try again.";
            }
}
}
?>

 <!-- Add Details of single location selected, include sights)-->  

  <div class="container read_list"> 
      <div class="centering text-center">
          <h4>Are you sure you want to delete this location from the list?</h4>
          <br>
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
          
          ?>
          <div class="text-center">
          <button type="submit" class="btn btn-primary">Really, I want to delete this location.</button>
        </div>
  <!-- ADD button to DELETE entry from DB -->
        </div>  
      </div> 
 

      
<?php include("incl/footer.php"); ?>